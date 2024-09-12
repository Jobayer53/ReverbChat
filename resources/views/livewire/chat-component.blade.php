<div>
name: {{ $user->name }}
<div>
    @foreach ($messages as $message )
        @if($message['sender'] != auth()->user()->name)
        <p>{{ $message['sender'] }}: {{ $message['message'] }}</p>
        @else
        <p>{{ $message['sender'] }}: {{ $message['message'] }}</p>
        @endif
    @endforeach
</div>
<form wire:submit="sendMessage()">
    <input type="text" wire:model="message">
    <button type="submit">send</button>
</form>
</div>
