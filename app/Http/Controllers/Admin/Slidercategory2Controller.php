<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SliderCategory2DataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slidercategory2CreateRequest;
use App\Http\Requests\Admin\Slidercategory2UpdateRequest;
use App\Models\SliderCategory2;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Slidercategory2Controller extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderCategory2DataTable $dataTable)
    {
        return $dataTable->render('admin.slider-category2.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.slider-category2.create');
    }

    /**
     * Store a newly created resource in storage.
     */

	public function store(Slidercategory2CreateRequest $request)
{
    /** Handle image upload 
    $imagePath = $this->uploadImage($request, 'image');

   Handle background image upload
    $backimagePath = $this->uploadImage($request, 'background_image');
*/
    $slider = new SliderCategory2();
	  /* 
	$slider->image = $imagePath;
    $slider->background_image = $backimagePath; // Fix the variable name here
    $slider->offer = $request->offer;
    $slider->title = $request->title;
	 $slider->button_link = $request->button_link;
	 $slider->short_description = $request->short_description;
	*/
    $slider->category = $request->category;
    
   
    $slider->status = $request->status;
    $slider->save();

    toastr()->success('Created Successfully');

    return redirect()->route('admin.slider-category2.index'); // Fix the redirect function here
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $slider = SliderCategory2::findOrFail($id);
        return view('admin.slider-category2.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Slidercategory2UpdateRequest $request, string $id): RedirectResponse
    {
        $slider = SliderCategory2::findOrFail($id);

        /** Handle Image Upload */
		/* 
		
        $imagePath = $this->uploadImage($request, 'image', $slider->image);
        $slider->image = !empty($imagePath) ? $imagePath : $slider->image;
		
		
		
		$backimagePath = $this->uploadImage($request, 'background_image', $slider->background_image);
        $slider->background_image = !empty($backimagePath) ? $backimagePath : $slider->background_image;
		
        $slider->offer = $request->offer;
        $slider->title = $request->title; 
		      $slider->short_description = $request->short_description;
        $slider->button_link = $request->button_link;
		*/
        $slider->category = $request->category;
        $slider->status = $request->status;
        $slider->save();

        toastr()->success('Updated Successfully');

        return to_route('admin.slider-category2.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $slider = SliderCategory2::findOrFail($id);
            $this->removeImage($slider->image);
            $slider->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong!']);
        }
    }
}
