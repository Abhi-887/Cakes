<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MenusDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenusCreateRequest;
use App\Http\Requests\Admin\MenusUpdateRequest;
use App\Models\Menus;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Str;
use Illuminate\Support\Facades\Log;


class MenusController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(MenusDataTable $dataTable): View|JsonResponse
    {
        return $dataTable->render('admin.menus.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenusCreateRequest $request): RedirectResponse
    {
        /** Handle image file */

        $menus = new Menus();
        $menus->name = $request->name;
        $menus->link = $request->link;
        $product->parentmenu = $request->parentmenu;
        $menus->status = $request->status;
        $menus->save();

        toastr()->success('Create Successfully');

        return to_route('admin.menus.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $menus = Menus::findOrFail($id);
        return view('admin.menus.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenusUpdateRequest $request, string $id): RedirectResponse
    {
        $menus = Menus::findOrFail($id);

        $menus->name = $request->name;
        $menus->link = $request->link;
        $product->parentmenu = $request->parentmenu;
        $menus->status = $request->status;
        $product->save();

        toastr()->success('Update Successfully');

        return to_route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            $menus = Menus::findOrFail($id);
            $menus->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong!']);
        }
    }
}
