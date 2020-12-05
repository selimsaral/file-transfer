<?php

namespace App\Http\Controllers;

use App\Jobs\FileUploadJob;
use App\Requests\FileUploadRequest;
use Illuminate\Support\Facades\Queue;

class HomeController extends Controller
{
    public function upload(FileUploadRequest $request)
    {
        $file = $request->file('file');

        $fileContent = base64_encode($file->getContent());
        $type        = $file->getClientOriginalExtension();
        $from        = $request->from;
        $to          = $request->to;

        Queue::push(new FileUploadJob($fileContent, $type, $from, $to));

        return response()->json([
            "result" => "Başarılı"
        ]);
    }
}
