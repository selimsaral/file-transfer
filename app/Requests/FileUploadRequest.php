<?php

namespace App\Requests;

use Anik\Form\FormRequest;

class FileUploadRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "file" => "required|mimes:zip,rar,png,jpg,mp3,waw,flac",
            "from" => "required|email",
            "to"   => "required|email"
        ];
    }

    public function messages()
    {
        return [
            "file.required" => "Dosya Alanı Zorunludur",
            "file.mimes"    => "Hatalı Dosya Formatı",
            "from.required" => "Email Adresi Alanı Zorunludur",
            "to.required"   => "Gönderilecek Email Alanı Zorunludur",
            "from.email"    => "Geçersiz Email Adresi",
            "to.email"      => "Geçersiz Gönderilecek Email Adresi"
        ];
    }
}
