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
        // Validate the request data
        $request->validate([
            'job_reference' => 'required|array',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:15',
            'driving_license' => 'required|string|in:yes,no',
            'why_ideal' => 'required|string',
            'relevant_experience' => 'required|string',
            'current_position_duration' => 'required|string|max:255',
            'portfolio' => 'nullable', // Updated validation rule
            'cv' => 'nullable', // Updated validation rule
        ]);

        // Handle file uploads
        $portfolioPath = $request->file('portfolio') ? $request->file('portfolio')->store('portfolios') : null;
        $cvPath = $request->file('cv') ? $request->file('cv')->store('cvs') : null;

        // Create a new Workwithus instance and fill it with validated data
        $customerfeedback = new Customerfeedback();
        $customerfeedback->job_reference = implode(',', $request->job_reference);
        $customerfeedback->name = $request->name;
        $customerfeedback->email = $request->email;
        $customerfeedback->telephone = $request->telephone;
        $customerfeedback->driving_license = $request->driving_license;
        $customerfeedback->why_ideal = $request->why_ideal;
        $customerfeedback->relevant_experience = $request->relevant_experience;
        $customerfeedback->current_position_duration = $request->current_position_duration;
        $customerfeedback->portfolio = $portfolioPath;
        $customerfeedback->cv = $cvPath;

        // Save the Workwithus instance to the database
        $customerfeedback->save();

        // Return a JSON response
        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }

}
