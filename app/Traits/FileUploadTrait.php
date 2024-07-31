<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait FileUploadTrait
{
    function uploadImage(Request $request, $inputName, $oldPath = NULL, $path = "/uploads")
    {
        if ($request->hasFile($inputName)) {
            $imageFile = $request->file($inputName);
            $ext = $imageFile->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            // Create image manager with GD driver
            $manager = new ImageManager(new Driver());

            // Read image from uploaded file
            $image = $manager->read($imageFile->getPathname());

            // Resize image proportionally to 800px width
            $image->scale(width: 800);

            // Save modified image to public path
            $image->save(public_path($path . '/' . $imageName));

            // Delete previous file if exists
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            return $path . '/' . $imageName;
        }

        return NULL;
    }

    /**
     * Remove file
     */
    function removeImage(string $path): void
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
