<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});

Broadcast::channel('trial.lesson.handle.interactive.{roomName}.{questionId}', function ($user, $roomName, $questionId) {
    return true;
});

Broadcast::channel('task.answers.handle.change.{roomName}.{taskId}', function ($user, $roomName, $taskId) {
    return true;
});

Broadcast::channel('trial.lesson.tabs.change.{roomName}', function ($user, $roomName) {
    return true;
});

Broadcast::channel('one-drag.{questionId}', function ($user, $questionId) {
    return true;
});

Broadcast::channel('two-drag.{questionId}', function ($user, $questionId) {
    return true;
});

Broadcast::channel('three-drag.{questionId}', function ($user, $questionId) {
    return true;
});

Broadcast::channel('four-drag.{questionId}', function ($user, $questionId) {
    return true;
});

Broadcast::channel('four-answers-drag.{questionId}', function ($user, $questionId) {
    return true;
});

Broadcast::channel('five-drag.{questionId}', function ($user, $questionId) {
    return true;
});

Broadcast::channel('topic-key.{questionId}', function ($user, $questionId) {
    return true;
});

Broadcast::channel('show-topic-block.{questionId}', function ($user, $questionId) {
    return true;
});

//Metodist
Broadcast::channel('metodist-application.{questionId}', function ($user, $questionId) {
    return true;
});

Broadcast::channel('mode-notice.{questionId}', function ($user, $questionId) {
    return true;
});
