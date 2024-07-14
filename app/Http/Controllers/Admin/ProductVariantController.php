<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ProductVariantDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
        return $dataTable->render('admin.product.product-variant.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.product-variant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product' => ['integer', 'required'],
            'name' => ['required', 'max:200'],
            'attribute_type' => 'required|string',
            'status' => ['required'],
            'isrequired' => ['required'],
            'shotorder' => ['required'],
            'price' => ['nullable', 'numeric'], // validate price if provided
        ]);

        $variant = new ProductVariant();
        $variant->product_id = $request->product;
        $variant->name = $request->name;
        $variant->attribute_type = $request->attribute_type;
        $variant->status = $request->status;
        $variant->isrequired = $request->isrequired;
        $variant->shotorder = $request->shotorder;

        // Save price only if attribute_type is 'area'
        if ($request->attribute_type == 'area') {
            $variant->price = $request->price;
        }

        $variant->save();

        toastr('Created Successfully!', 'success', 'success');

        return redirect()->route('admin.products-variant.index', ['product' => $request->product]);
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
    public function edit(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        return view('admin.product.product-variant.edit', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'status' => ['required'],
            'attribute_type' => 'required|string',
            'isrequired' => ['required'],
            'shotorder' => ['required'],
            'price' => ['nullable', 'numeric'], // validate price if provided
        ]);

        $variant = ProductVariant::findOrFail($id);
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->attribute_type = $request->attribute_type;
        $variant->isrequired = $request->isrequired;
        $variant->shotorder = $request->shotorder;

        // Save price only if attribute_type is 'area'
        if ($request->attribute_type == 'area') {
            $variant->price = $request->price;
        } else {
            $variant->price = null; // Clear price if attribute_type is not 'area'
        }

        $variant->save();

        toastr('Updated Successfully!', 'success', 'success');

        return redirect()->route('admin.products-variant.index', ['product' => $variant->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        $variantItemCheck = ProductVariantItem::where('product_variant_id', $variant->id)->count();
        if ($variantItemCheck > 0) {
            return response(['status' => 'error', 'message' => 'This variant contains variant items in it. Delete the variant items first to delete this variant!']);
        }
        $variant->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $variant = ProductVariant::findOrFail($request->id);
        $variant->status = $request->status == 'true' ? 1 : 0;
        $variant->save();

        return response(['message' => 'Status has been updated!']);
    }
}
