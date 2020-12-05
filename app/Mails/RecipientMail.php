<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecipientMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public $file;

    /**
     * @var string
     */
    public $sender;


    public function __construct(string $file, string $sender)
    {
        $this->file   = $file;
        $this->sender = $sender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email')->subject($this->sender . ' Size Bir Dosya Gönderdi');
    }

}
