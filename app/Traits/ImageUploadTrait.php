<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait ImageUploadTrait
{
    public function uploadImage(Request $request, $inputName, $path)
    {
        if ($request->hasFile($inputName)) {
            $imageFile = $request->file($inputName);
            $ext = $imageFile->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            // Create image manager with GD driver
            $manager = new ImageManager(new Driver());

            // Read image from uploaded file
            $image = $manager->read($imageFile->getPathname());

            // Resize image proportionally to 300px width
            $image->scale(width: 800);

            // Save modified image to public path
            $image->save(public_path($path . '/' . $imageName));

            return $path . '/' . $imageName;
        }

        return NULL;
    }

    public function uploadMultiImage(Request $request, $inputName, $path)
    {
        $imagePaths = [];

        if ($request->hasFile($inputName)) {
            $images = $request->file($inputName);

            foreach ($images as $imageFile) {
                $ext = $imageFile->getClientOriginalExtension();
                $imageName = 'media_' . uniqid() . '.' . $ext;

                // Create image manager with GD driver
                $manager = new ImageManager(new Driver());

                // Read image from uploaded file
                $image = $manager->read($imageFile->getPathname());

                // Resize image proportionally to 300px width
                $image->scale(width: 300);

                // Save modified image to public path
                $image->save(public_path($path . '/' . $imageName));

                $imagePaths[] = $path . '/' . $imageName;
            }

            return $imagePaths;
        }

        return [];
    }

    public function updateImage(Request $request, $inputName, $path, $oldPath = null)
    {
        if ($request->hasFile($inputName)) {
            if (File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            $imageFile = $request->file($inputName);
            $ext = $imageFile->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            // Create image manager with GD driver
            $manager = new ImageManager(new Driver());

            // Read image from uploaded file
            $image = $manager->read($imageFile->getPathname());

            // Resize image proportionally to 300px width
            $image->scale(width: 300);

            // Save modified image to public path
            $image->save(public_path($path . '/' . $imageName));

            return $path . '/' . $imageName;
        }

        return NULL;
    }

    /** Handle Delete File */
    public function deleteImage(string $path)
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
