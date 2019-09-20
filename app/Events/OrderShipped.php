<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Queue\SerializesModels;

/**
 *  Class OrderShipped
 *
 *  @package App\Events
 *  @author  Arslan Ali
 *  @email   marslan.ali@gmail.com
 */
class OrderShipped
{
    use SerializesModels;

    public $order;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
