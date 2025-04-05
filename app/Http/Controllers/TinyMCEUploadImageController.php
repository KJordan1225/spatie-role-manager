<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Traits\HandlesTinyMCEUploads;

class TinyMCEUploadImageController extends Controller
{
    use HandlesTinyMCEUploads;
    
    public function store(Request $request)
    {
        return $this->uploadTinyMCEImage($request);
    }
}
