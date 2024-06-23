<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderCreateRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;
use App\Models\Slider;
use App\Models\SliderCategory;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
  public function index(SliderDataTable $dataTable)
{
    return $dataTable->with(['category'])->render('admin.slider.index');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = SliderCategory::all();
        return view('admin.slider.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderCreateRequest $request): RedirectResponse
    {
        $imagePath = $this->uploadImage($request, 'image');
        $backImagePath = $this->uploadImage($request, 'background_image');

        $slider = new Slider();
        $slider->image = $imagePath;
        $slider->background_image = $backImagePath;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->category_id = $request->category_id;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
		$slider->show_at_home = $request->show_at_home;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();

        toastr()->success('Created Successfully');

        return redirect()->route('admin.slider.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id): View
{
    $slider = Slider::findOrFail($id);
    $categories = SliderCategory::pluck('category', 'id'); // Assuming 'Category' is your model name
    return view('admin.slider.edit', compact('slider', 'categories'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id): RedirectResponse
    {
        $slider = Slider::findOrFail($id);

        $imagePath = $this->uploadImage($request, 'image', $slider->image);
        $backImagePath = $this->uploadImage($request, 'background_image', $slider->background_image);

        $slider->image = $imagePath ?: $slider->image;
        $slider->background_image = $backImagePath ?: $slider->background_image;
        $slider->category_id = $request->category_id;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
		$slider->show_at_home = $request->show_at_home;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();

        toastr()->success('Updated Successfully');

        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $slider = Slider::findOrFail($id);
            $this->removeImage($slider->image);
            $slider->delete();
            toastr()->success('Deleted Successfully');
        } catch (\Exception $e) {
            toastr()->error('Something went wrong!');
        }
        return redirect()->route('admin.slider.index');
    }
}
