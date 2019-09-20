<?php

namespace App\Jobs;

use App\Events\OrderShipped;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 *  Class DispatchOrders
 *  =====================================
 *  @package App\Jobs
 *  @author  Arslan Ali
 *  @email   marslan.ali@gmail.com
 *  =====================================
 */
class DispatchOrders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $orders = Order::where('status', 'pending')->get();

        // Order shipment logic...
        foreach ($orders as $order)
            event(new OrderShipped($order));
    }
}
