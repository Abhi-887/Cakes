<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutUsUpdateRequest;
use App\Models\AboutUs;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    use FileUploadTrait;

    function index(): View
    {
        $about = AboutUs::first();
        return view('admin.about-us.index', compact('about'));
    }

    function update(AboutUsUpdateRequest $request): RedirectResponse
    {
       

        AboutUs::updateOrCreate(
            ['id' => 1],
            [
                
                'title' => $request->title,
                'description' => $request->description,
               
            ]
        );

        toastr()->success('Created Successfully');

        return redirect()->back();
    }
}

