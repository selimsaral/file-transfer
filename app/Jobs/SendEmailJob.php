<?php

namespace App\Jobs;

use App\Mails\RecipientMail;
use App\Mails\SenderMail;
use Illuminate\Support\Facades\Mail;

class SendEmailJob extends Job
{
    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;


    public function __construct(string $file, string $from, string $to)
    {
        $this->file = $file;
        $this->from = $from;
        $this->to   = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->to)->send(new RecipientMail($this->file, $this->from));
        Mail::to($this->to)->send(new SenderMail($this->file));
    }
}
