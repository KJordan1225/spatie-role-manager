<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TinyMCEUploadImageController extends Controller
{
    
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // Create your custom filename
            // $filename = $file->getClientOriginalName().'-'.Str::uuid() . '.' . $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            // Store the file with the new name in the 'public/uploads' directory
            $path = $file->storeAs('uploads', $filename, 'public');

            $url = Storage::url($path); // Gets public path

            return response()->json(['location' => $path]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

}
