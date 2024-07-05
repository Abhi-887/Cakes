<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\WeddingcakesdepositDataTable;
use App\Http\Controllers\Controller;
use App\Models\Weddingcakesdeposit;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;


class WeddingcakesdepositController extends Controller
{


    public function create(): View
    {
        return view('frontend.pages.wedding-cake-deposit');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'consultationPreference' => 'required|string|max:255',
            'existingDesign' => 'nullable|string|max:255',
            'weddingDate' => 'required|date',
        ]);

        // Create a new consultation instance and fill it with validated data
        $weddingcakesdeposit = new Weddingcakesdeposit();
        $weddingcakesdeposit->consultation_preference = $request->consultationPreference;
        $weddingcakesdeposit->existing_design = $request->existingDesign;
        $weddingcakesdeposit->wedding_date = $request->weddingDate;

        // Save the consultation to the database
        $weddingcakesdeposit->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Your Wedding Cakes has deposited  successfully!');
    }
}
