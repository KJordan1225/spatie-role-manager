<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;


trait HandlesTinyMCEUploads
{
    public function uploadTinyMCEImage(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // Max 5MB
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid image file.'], 400);
        }

        $image = $request->file('file');
        $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();

        $resizedImage = Image::make($image)
            ->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode($image->getClientOriginalExtension(), 80); // 80% quality

        $path = "public/uploads/{$filename}";
        Storage::put($path, (string) $resizedImage);

        return response()->json([
            'location' => Storage::url($path) // e.g., /storage/uploads/uuid.jpg
        ]);
    }
    
}
