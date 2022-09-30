<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TrialLessonHandleInteractive implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $element;
    public $roomName;
    public $questionId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($roomName, $questionId, $element)
    {
        $this->roomName = $roomName;
        $this->questionId = $questionId;
        $this->element = $element;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("trial.lesson.handle.interactive.$this->roomName.$this->questionId");
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'trial.lesson.handle.interactive';
    }
}
