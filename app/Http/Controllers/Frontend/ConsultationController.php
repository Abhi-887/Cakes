<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\ConsultationDataTable;
use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;


class ConsultationController extends Controller
{

	
	 public function create(): View
    {
        return view('frontend.pages.consultation');
    }
	  public function store(Request $request)
		{
			// Validate the request data
			$request->validate([
				'first_name' => 'required|string|max:255',
				'surname' => 'required|string|max:255',
				'email' => 'required|email|max:255',
				'phone' => 'required|string|max:15',
				'event_date' => 'required|date',
				'venue' => 'nullable|string|max:255',
				'number_of_guests' => 'nullable|string|max:255',
				'other_information' => 'nullable|string|max:255',
				'cake_budget' => 'required|string|max:255',
				'consultation_store' => 'required|string|max:255',
				'consultation_type' => 'required|string|max:255',
				'existing_order' => 'required|string|max:255',
				'cake_type' => 'required|array',
				'cake_type.*' => 'string|max:255',
				'booking_status' => 'nullable|string|max:255',
				'consultation_date' => 'required|date',
				'consultation_time' => 'required|string|max:255',
			]);

			// Create a new consultation instance and fill it with validated data
			$consultation = new Consultation();
			$consultation->first_name = $request->first_name;
			$consultation->surname = $request->surname;
			$consultation->email = $request->email;
			$consultation->phone = $request->phone;
			$consultation->event_date = $request->event_date;
			$consultation->venue = $request->venue;
			$consultation->number_of_guests = $request->number_of_guests;
			$consultation->other_information = $request->other_information;
			$consultation->cake_budget = $request->cake_budget;
			$consultation->consultation_store = $request->consultation_store;
			$consultation->consultation_type = $request->consultation_type;
			$consultation->existing_order = $request->existing_order;
			$consultation->cake_type = implode(', ', $request->cake_type);
			$consultation->booking_status = $request->booking_status;
			$consultation->consultation_date = $request->consultation_date;
			$consultation->consultation_time = $request->consultation_time;

			// Save the consultation to the database
			$consultation->save();

			// Redirect or return a response
			  return redirect()->back()->with('success', 'Your consultation has been booked successfully!');
		}	
}
