<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;
use phpDocumentor\Reflection\Types\Void_;

trait FileUploadTrait
{

    function uploadImage(Request $request, $inputName, $oldPath = NULL, $path = "/uploads")
    {

        if ($request->hasFile($inputName)) {

            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            // delete previous file if exist
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

// composer require intervention/image



// <?php

// namespace App\Traits;

// use Illuminate\Http\Request;
// use File;
// use Intervention\Image\Facades\Image;

// trait FileUploadTrait
// {
//     /**
//      * Upload and resize an image
//      *
//      * @param Request $request
//      * @param string $inputName
//      * @param string|null $oldPath
//      * @param string $path
//      * @return string|null
//      */
//     function uploadImage(Request $request, string $inputName, string $oldPath = null, string $path = "/uploads"): ?string
//     {
//         if ($request->hasFile($inputName)) {

//             $image = $request->file($inputName);
//             $ext = $image->getClientOriginalExtension();
//             $imageName = 'media_' . uniqid() . '.' . $ext;

//             // Resize the image to 300x300
//             $resizedImage = Image::make($image)->resize(300, 300, function ($constraint) {
//                 $constraint->aspectRatio();
//             });

//             // Create the directory if it doesn't exist
//             if (!File::exists(public_path($path))) {
//                 File::makeDirectory(public_path($path), 0755, true);
//             }

//             // Save the resized image
//             $resizedImage->save(public_path($path . '/' . $imageName));

//             // Delete previous file if it exists
//             if ($oldPath && File::exists(public_path($oldPath))) {
//                 File::delete(public_path($oldPath));
//             }

//             return $path . '/' . $imageName;
//         }

//         return null;
//     }

//     /**
//      * Remove a file
//      *
//      * @param string $path
//      * @return void
//      */
//     function removeImage(string $path): void
//     {
//         if (File::exists(public_path($path))) {
//             File::delete(public_path($path));
//         }
//     }
// }
