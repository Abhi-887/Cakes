<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Slider2DataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider2CreateRequest;
use App\Http\Requests\Admin\Slider2UpdateRequest;
use App\Models\Slider2;
use App\Models\SliderCategory2;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Slider2Controller extends Controller
{
    use FileUploadTrait;

    public function index(Slider2DataTable $dataTable)
    {
        return $dataTable->with(['category'])->render('admin.slider2.index');
    }

    public function create(): View
    {
        $categories = SliderCategory2::all();
        return view('admin.slider2.create', compact('categories'));
    }

    public function store(Slider2CreateRequest $request): RedirectResponse
    {
        $imagePath = $this->uploadImage($request, 'image');
      

        $slider = new Slider2();
        $slider->image = $imagePath;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->category_id = $request->category_id;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
       
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();

        toastr()->success('Created Successfully');

        return redirect()->route('admin.slider2.index');
    }

    public function edit(string $id): View
    {
        $slider = Slider2::findOrFail($id);
        $categories = SliderCategory2::pluck('category', 'id');
        return view('admin.slider2.edit', compact('slider', 'categories'));
    }

    public function update(Slider2UpdateRequest $request, string $id): RedirectResponse
    {
        $slider = Slider2::findOrFail($id);

        $imagePath = $this->uploadImage($request, 'image', $slider->image);
       

        $slider->image = $imagePath ?: $slider->image;
        
        $slider->category_id = $request->category_id;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
       
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();

        toastr()->success('Updated Successfully');

        return redirect()->route('admin.slider2.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        try {
            $slider = Slider2::findOrFail($id);
            $this->removeImage($slider->image);
            $slider->delete();
            toastr()->success('Deleted Successfully');
        } catch (\Exception $e) {
            toastr()->error('Something went wrong!');
        }

        return redirect()->route('admin.slider2.index');
    }
}


