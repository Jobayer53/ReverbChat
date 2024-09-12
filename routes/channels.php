<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
broadcast::routes();

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


// Broadcast::channel('chat-channel.{userId}', function (User $user, $userId) {
//     return (int) $user->id === (int) $userId;
// });
Broadcast::channel('chat-channel.{userId}', function (User $user, $userId) {
    // Allow both the sender and receiver to listen to the channel
    return (int) $user->id === (int) $userId;
});

