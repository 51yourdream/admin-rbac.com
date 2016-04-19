<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Goods;


class ServerCreated extends Event implements ShouldBroadcast
{
    use SerializesModels;
    public $goods;

    /**
     * ServerCreated constructor.
     * @param User $user
     */
    public function __construct(Goods $goods)
    {
        $this->goods = $goods;
    }

    /**
     * Get the channels the event should be broadcast on.
     * 频道名称
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['user2'];
    }
    /**
     * 获取广播事件名称
     *
     * @return string
     */
//    public function broadcastAs()
//    {
//
//        return 'app.server-created';
//    }

    /**
     * 获取广播数据
     *
     * @return array
     */
    public function broadcastWith(){
        error_log(23435);
        return [
            'user' => [
                'username'=>'lipeng',
                'age'=>'12'
            ]
        ];
    }
}
