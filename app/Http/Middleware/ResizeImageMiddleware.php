<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class ResizeImageMiddleware
{
    protected $imageManager;

    public function __construct()
    {
        // Create image manager instance with 'gd' driver
        $this->imageManager = new ImageManager(new GdDriver());
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::info('Request path: ' . $request->path());

        $response = $next($request);

        // Check if the requested file is an image and exists
        if ($this->isImageRequest($request) && File::exists(public_path($request->path()))) {
            Log::info('Image request detected and file exists: ' . $request->path());

            $imagePath = public_path($request->path());

            try {
                $image = $this->imageManager->make($imagePath);

                // Resize image
                $image->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                // Compress the image (quality 75 out of 100)
                $image->encode('jpg', 75);

                // Save the compressed image
                $image->save($imagePath);

                Log::info('Image resized and saved: ' . $imagePath);

                // Stream the response
                return new StreamedResponse(function () use ($image) {
                    echo $image->encode();
                }, 200, ['Content-Type' => $image->mime()]);
            } catch (\Exception $e) {
                Log::error('Error processing image: ' . $e->getMessage());
                return response()->file($imagePath);
            }
        }

        return $response;
    }

    /**
     * Determine if the request is for an image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function isImageRequest(Request $request)
    {
        $path = $request->path();
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'];

        return in_array(strtolower($extension), $imageExtensions);
    }
}
