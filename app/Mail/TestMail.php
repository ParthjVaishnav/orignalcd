<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $from_email;
    public $to_email;
    public $created_at;
    public $updated_at;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from_email, $to_email, $created_at, $updated_at)
    {
        $this->from_email = $from_email;
        $this->to_email = $to_email;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
    
    public function build()
    {
        return $this->view('emails.testmail')  // The email view
            ->subject('Test Mail')
            ->with([
                'from_email' => $this->from_email,
                'to_email' => $this->to_email,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]);
    }
    
}
