<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Exception;

trait FileUploadTrait
{
    /**
     * Upload and resize an image
     *
     * @param Request $request
     * @param string $inputName
     * @param string|null $oldPath
     * @param string $path
     * @return string|null
     * @throws Exception
     */
    public function uploadImage(Request $request, string $inputName, string $oldPath = null, string $path = "/uploads"): ?string
    {
        if ($request->hasFile($inputName) && $request->file($inputName)->isValid()) {
            // Create an instance of ImageManager with default configuration
            $manager = new ImageManager(['driver' => 'gd']);

            // Get the uploaded image
            $image = $request->file($inputName);
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            // Resize the image to 300px width while maintaining aspect ratio
            $resizedImage = $manager->make($image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Create the directory if it doesn't exist
            $directoryPath = public_path($path);
            if (!File::exists($directoryPath)) {
                if (!File::makeDirectory($directoryPath, 0755, true)) {
                    throw new Exception("Failed to create directory: " . $directoryPath);
                }
            }

            // Save the resized image
            $resizedImage->save($directoryPath . '/' . $imageName);

            // Delete previous file if it exists
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            return $path . '/' . $imageName;
        }

        return null;
    }

    /**
     * Remove a file
     *
     * @param string $path
     * @return void
     * @throws Exception
     */
    public function removeImage(string $path): void
    {
        $fullPath = public_path($path);
        if (File::exists($fullPath)) {
            if (!File::delete($fullPath)) {
                throw new Exception("Failed to delete file: " . $fullPath);
            }
        }
    }
}
