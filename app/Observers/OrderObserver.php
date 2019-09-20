<?php

namespace App\Observers;

use App\Models\Order;

/**
 *  Class OrderObserver
 *
 *  @package    App\Observers
 *  @author     Arslan Ali
 *  @email      marslan.ali@gmail.com
 */
class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order $order
     * @return void
     */
    public function created(Order $order)
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

}
