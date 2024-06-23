<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterGridFourDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterGridFour;
use App\Models\FooterTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FooterGridFourController extends Controller
{
    protected function rules()
    {
        return [
            'name' => ['required', 'max:200'],
            'url' => ['required'],
            'status' => ['required'],
        ];
    }

    public function index(FooterGridFourDataTable $dataTable)
    {
        $footerTitle = FooterTitle::first();
        return $dataTable->render('admin.footer.footer-grid-four.index', compact('footerTitle'));
    }

    public function create()
    {
        return view('admin.footer.footer-grid-four.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        FooterGridFour::create($request->all());

        Cache::forget('footer_grid_four');

        toastr('Created Successfully!', 'success', 'success');

        return redirect()->route('admin.footer-grid-four.index');
    }

    public function edit(FooterGridFour $footerGridFour)
    {
        return view('admin.footer.footer-grid-four.edit', compact('footerGridFour'));
    }

    public function update(Request $request, FooterGridFour $footerGridFour)
    {
        $request->validate($this->rules());

        $footerGridFour->update($request->all());

        Cache::forget('footer_grid_four');

        toastr('Update Successfully!', 'success', 'success');

        return redirect()->route('admin.footer-grid-four.index');
    }

    public function destroy(FooterGridFour $footerGridFour)
    {
        $footerGridFour->delete();

        Cache::forget('footer_grid_four');

        return response(['status' => 'success', 'message' => 'Deleted successfully!']);
    }

    public function changeStatus(Request $request)
    {
        $footerGridFour = FooterGridFour::findOrFail($request->id);
        $footerGridFour->update(['status' => $request->status == 'true' ? 1 : 0]);

        Cache::forget('footer_grid_four');

        return response(['message' => 'Status has been updated!']);
    }

    public function changeTitle(Request $request)
    {
        $request->validate(['title' => ['required', 'max:200']]);

        FooterTitle::updateOrCreate(['id' => 1], ['footer_grid_four_title' => $request->title]);

        toastr('Updated Successfully', 'success', 'success');

        return redirect()->back();
    }
}
