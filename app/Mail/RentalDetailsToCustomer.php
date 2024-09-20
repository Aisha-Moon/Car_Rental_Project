<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RentalDetailsToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $rental;

    public function __construct($rental)
    {
        $this->rental = $rental;
    }

    public function build()
    {
        return $this->subject('Your Rental Details')
                    ->view('emails.rental_details')
                    ->with('rental', $this->rental);
    }
}
