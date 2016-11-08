<?php
/**
 * Created by PhpStorm.
 * User: Pedro Lazari
 * Date: 08/11/2016
 * Time: 17:23
 */

namespace App\Events;


use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendMessage implements ShouldBroadcast
{

    use SerializesModels;

    public $message;
    public $user;

    public function __construct(Message $message)
    {
        $this->user = Auth::user();
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel("room.{$this->message->room_id}");
    }

}