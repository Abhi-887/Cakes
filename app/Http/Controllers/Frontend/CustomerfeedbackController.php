<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customerfeedback;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerfeedbackController extends Controller
{
    public function create(): View
    {
        return view('frontend.pages.customer-feedback');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'email' => 'required|email',
            'services' => 'required|array',
            'store' => 'required|string',
            'feedback' => 'required|string|max:1000',
            'privacyPolicy' => 'accepted',
        ]);

        // Create a new Customerfeedback instance and fill it with validated data
        $customerfeedback = new Customerfeedback();
        $customerfeedback->name = $request->name;
        $customerfeedback->rating = $request->rating;
        $customerfeedback->email = $request->email;
        $customerfeedback->services = implode(',', $request->services);
        $customerfeedback->store = $request->store;
        $customerfeedback->feedback = $request->feedback;

        // Save the Customerfeedback instance to the database
        $customerfeedback->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your feedback has been submitted successfully!');
    }
}
