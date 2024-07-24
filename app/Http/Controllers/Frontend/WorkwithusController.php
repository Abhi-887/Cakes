<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Workwithus;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkwithusController extends Controller
{
    public function create(): View
    {
        return view('frontend.pages.work-with-us');
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
            'portfolio' => 'nullable|file|mimes:pdf|max:10240', // Updated validation rule
            'cv' => 'required|file|mimes:pdf|max:10240', // Updated validation rule
        ]);

        // Handle file uploads
        $portfolioPath = $request->file('portfolio') ? $request->file('portfolio')->store('portfolios') : null;
        $cvPath = $request->file('cv') ? $request->file('cv')->store('cvs') : null;

        // Create a new Workwithus instance and fill it with validated data
        $workwithus = new Workwithus();
        $workwithus->job_reference = implode(',', $request->job_reference);
        $workwithus->name = $request->name;
        $workwithus->email = $request->email;
        $workwithus->telephone = $request->telephone;
        $workwithus->driving_license = $request->driving_license;
        $workwithus->why_ideal = $request->why_ideal;
        $workwithus->relevant_experience = $request->relevant_experience;
        $workwithus->current_position_duration = $request->current_position_duration;
        $workwithus->portfolio = $portfolioPath;
        $workwithus->cv = $cvPath;

        // Save the Workwithus instance to the database
        $workwithus->save();

        // Return a JSON response
        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }

}
