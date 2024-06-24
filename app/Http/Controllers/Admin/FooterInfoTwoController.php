<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterInfoTwo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FooterInfoTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footerInfo = FooterInfoTwo::first();
        return view('admin.footer.footer-info-two.index', compact('footerInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['max:100'],
			'phone' => ['max:100'],
            'email' => ['max:100'],
            'address' => ['max:3000'],
            'copyright' => ['max:200']
        ]);

        $footerInfo = FooterInfoTwo::find($id);

        FooterInfoTwo::updateOrCreate(
            ['id' => $id],
            [
			    'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'copyright' => $request->copyright
            ]
        );

        Cache::forget('footer_info');

        toastr('Updated successfully!', 'success', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implementation for destroy method
    }
}
