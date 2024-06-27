<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CakesstandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Cakesstand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

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
    public function store(Request $request) : RedirectResponse
    {
        $cakesstands = new Cakesstand();
        $cakesstands->name = $request->name;
        $cakesstands->status = $request->status;
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
    public function update(Request $request, string $id)
    {
        $cakesstands = Cakesstand::findOrFail($id);
        $cakesstands->name = $request->name;
        $cakesstands->status = $request->status;
        $cakesstands->save();

        toastr()->success('Updated Successfully');

        return to_route('admin.cakes-stand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Cakesstand::findOrFail($id)->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        }catch(\Exception $e){
            return response(['status' => 'error', 'message' => 'something went wrong!']);
        }
    }
}
