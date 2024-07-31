<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class ResizeImageMiddleware
{
    protected $imageManager;

    public function __construct()
    {
        // Create image manager instance directly with 'gd' driver
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
        $response = $next($request);

        // Check if the requested file is an image and exists
        if ($this->isImageRequest($request) && File::exists(public_path($request->path()))) {
            $imagePath = public_path($request->path());
            $image = $this->imageManager->make($imagePath);

            // Resize image
            $image->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Stream the response
            return new StreamedResponse(function () use ($image) {
                echo $image->encode();
            }, 200, ['Content-Type' => $image->mime()]);
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
