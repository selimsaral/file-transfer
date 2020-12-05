<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadJob extends Job
{
    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;


    public function __construct(string $file, string $mimeType, string $from, string $to)
    {
        $this->file     = $file;
        $this->mimeType = $mimeType;
        $this->from     = $from;
        $this->to       = $to;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fileName = $this->getFileName();

        $upload = Storage::disk('local')->put($fileName, base64_decode($this->file));

        if ($upload) {
            dispatch(new SendEmailJob($fileName, $this->from, $this->to));
        }
    }

    private function getFileName()
    {
        $datePath = date("Y") . "/" . date("m") . "/" . date("d");

        return $datePath . "/" . sha1(md5(time() . $this->from . $this->to . Str::random(10))) . "." .
            $this->mimeType;
    }
}
