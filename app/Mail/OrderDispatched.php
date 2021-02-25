<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class OrderDispatched extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels, IsMonitored;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Order $order)
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Your Order Has Been Dispatched')
            ->markdown('emails.orderDispatched');
    }
}
