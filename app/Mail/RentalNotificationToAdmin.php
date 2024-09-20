<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RentalNotificationToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $carDetails;

    public function __construct($customerName, $carDetails)
    {
        $this->customerName = $customerName;
        $this->carDetails = $carDetails;
    }

    public function build()
    {
        return $this->subject('New Car Rental Notification')
                    ->view('emails.rental_notification')
                    ->with([
                        'customerName' => $this->customerName,
                        'carDetails' => $this->carDetails,
                    ]);
    }
}


