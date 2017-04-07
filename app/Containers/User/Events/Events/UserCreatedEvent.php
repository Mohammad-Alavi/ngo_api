<?php

namespace App\Containers\User\Events\Events;

use App\Ship\Parents\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserCreatedEvent
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class UserCreatedEvent extends Event
{

    use SerializesModels;

    /**
     * @var \App\Containers\User\Models\User
     */
    public $user;

    /**
     * UserCreatedEvent constructor.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
