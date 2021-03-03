<?php

namespace App\Mail;

use App\Models\Warranty;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WarrantyApplication extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $warranty;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Warranty $warranty)
    {
        $this->warranty = $warranty;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Warranty $warranty)
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('You Have Received A New Warranty Application')
            ->markdown('emails.warrantyApplication')
            ->with('warranty', $this->warranty);
    }
}
