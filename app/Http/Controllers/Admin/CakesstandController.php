<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CakesstandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Cakesstand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class CakesstandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CakesstandDataTable $dataTable)
    {
        return $dataTable->render('admin.product.cakes-stand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.product.cakes-stand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $cakesstands = new Cakesstand();
        $cakesstands->name = $request->name;
        $cakesstands->status = $request->status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/cakesstands'), $imageName);
            $cakesstands->image = $imageName;
        }

        $cakesstands->save();

        toastr()->success('Created Successfully');

        return to_route('admin.cakes-stand.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $cakesstands = Cakesstand::findOrFail($id);

        return view('admin.product.cakes-stand.edit', compact('cakesstands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $cakesstands = Cakesstand::findOrFail($id);
        $cakesstands->name = $request->name;
        $cakesstands->status = $request->status;

        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($cakesstands->image) {
                $oldImagePath = public_path('images/cakesstands/' . $cakesstands->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/cakesstands'), $imageName);
            $cakesstands->image = $imageName;
        }

        $cakesstands->save();

        toastr()->success('Updated Successfully');

        return to_route('admin.cakes-stand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cakesstands = Cakesstand::findOrFail($id);
            // Delete the image if exists
            if ($cakesstands->image) {
                $imagePath = public_path('images/cakesstands/' . $cakesstands->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $cakesstands->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }
}

