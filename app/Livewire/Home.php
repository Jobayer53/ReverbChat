<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\MessageSendEvent;

class Home extends Component
{
    public $name;
    public $age;
    public $gender;
    public $country;
    public $hide = false;
    public $user;
    public $sender_id;
    public $receiver_id;
    public $message = '';
    public $messages = [];

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'country' => 'required|string',
        ]);

        // This will render the Home view after form submission
        return $this->render();
    }

    public function render()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('livewire.home', [
            'users' => $users
        ]);
    }

    public function chatUser($id)
    {
        $this->hide = true;
        $this->mount($id);
    }

    // Make the $id parameter optional
    public function mount($id = null)
    {
        $this->sender_id = auth()->user()->id;

        if ($id) {
            $this->receiver_id = $id;

            // Fetch chat messages between sender and receiver
            $messages = Message::where(function ($query) {
                $query->where('sender_id', $this->sender_id)
                      ->where('receiver_id', $this->receiver_id);
            })->orWhere(function ($query) {
                $query->where('sender_id', $this->receiver_id)
                      ->where('receiver_id', $this->sender_id);
            })->with('sender:id,name', 'receiver:id,name')->get();

            // Load the messages into the component
            foreach ($messages as $message) {
                $this->chatMessage($message);
            }

            // Find the user with whom you're chatting
            $this->user = User::find($id);
        }
    }

    public function sendMessage()
    {
        $message = new Message();
        $message->sender_id = $this->sender_id;
        $message->receiver_id = $this->receiver_id;
        $message->message = $this->message;
        $message->save();

        // Display the message in the chat
        $this->chatMessage($message);

        // Broadcast the message event
        broadcast(new MessageSendEvent($message))->toOthers();

        // Clear the message input
        $this->message = '';
    }

    #[On('echo-private:chat-channel.{sender_id},MessageSendEvent')]
    public function listenForMessage($event)
    {
        $chatMessage = Message::whereId($event['message']['id'])
            ->with('sender:id,name', 'receiver:id,name')
            ->first();

        $this->chatMessage($chatMessage);
    }

    public function chatMessage($message)
    {
        $this->messages[] = [
            'id' => $message->id,
            'message' => $message->message,
            'sender' => $message->sender->name,
            'receiver' => $message->receiver->name,
        ];
    }
}
