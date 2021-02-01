<?php

namespace App\Mail;

use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Enquiry;

class EnquirySent extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The order instance.
     *
     * @var \App\Models\Enquiry
     */
    public $enquiry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Enquiry $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Enquiry $enquiry)
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('New Enquiry Mail')
            ->markdown('emails.enquiry');
    }
}
