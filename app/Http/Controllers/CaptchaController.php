<?php
namespace App\Http\Controllers;

use App\Models\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CaptchaController extends Controller
{
  public function store(Request $request)
  {
    // Validate the incoming request data
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'telephone' => 'required|string|max:20',
      'driving_license' => 'required|string',
      'why_ideal' => 'required|string',
      'relevant_experience' => 'required|string',
      'current_position_duration'=>'required|string',
      'g-recaptcha-response' => 'required', // Validate reCAPTCHA response
    ]);

    // Verify reCAPTCHA response
    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
      'secret' => config('services.recaptcha.secret'),
      'response' => $request->input('g-recaptcha-response')
    ]);

    if (!$response->json()['success']) {
      return redirect()->back()->withErrors(['captcha' => 'reCAPTCHA verification failed.']);
    }

    // Create a new Quote instance and save to the database
    $quote = new Captcha();
    $quote->name = $validated['name'];
    $quote->email = $validated['email'];
    $quote->telephone = $validated['telephone'];
    $quote->driving_license = $validated['driving_license'];
    $quote->why_ideal = $validated['why_ideal'];
    $quote->relevant_experience = $validated['relevant_experience'];
    $quote->current_position_duration = $validated['current_position_duration'];
    $quote->save();

    // Redirect or return a response
    return redirect()->back()->with('success', 'Your quote has been submitted successfully!');
  }
}
