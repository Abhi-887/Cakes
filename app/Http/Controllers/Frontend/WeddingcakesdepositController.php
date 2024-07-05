<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Weddingcakesdeposit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeddingcakesdepositController extends Controller
{
    public function create(): View
    {
        return view('frontend.pages.wedding-cake-deposit');
    }

    public function store(Request $request): JsonResponse
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
        $weddingcakesdeposit->save();

        // Log the addition for debugging purposes
        Log::info('Wedding Cake Deposit added successfully', ['id' => $weddingcakesdeposit->id]);

        // Return a JSON response
        return response()->json(['message' => 'Your Wedding Cakes has deposited successfully!']);
    }
}
