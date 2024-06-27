<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact2UpdateRequest;
use App\Models\Contact2;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class Contact2Controller extends Controller
{
    public function index(): View
    {
        $contact = Contact2::first();
        return view('admin.contact2.index', compact('contact'));
    }

    public function update(Contact2UpdateRequest $request): RedirectResponse
    {
        // Retrieve validated data from the request
        $data = $request->only([
            'phone_one', 'phone_two', 'mail_one', 'mail_two', 'address',
            'map_link', 'title_one', 'Description_one', 'title_two',
            'Description_two', 'title_three', 'Description_three'
        ]);

        $contact = Contact2::first();

        // Handle file uploads for phone_image
        if ($request->hasFile('phone_image')) {
            // Delete old phone_image if exists
            if ($contact && $contact->phone_image) {
                Storage::disk('public')->delete($contact->phone_image);
            }
            $data['phone_image'] = $request->file('phone_image')->store('uploads', 'public');
        }

        // Handle file uploads for email_image
        if ($request->hasFile('email_image')) {
            // Delete old email_image if exists
            if ($contact && $contact->email_image) {
                Storage::disk('public')->delete($contact->email_image);
            }
            $data['email_image'] = $request->file('email_image')->store('uploads', 'public');
        }

        // Update or create a Contact record with id = 1
        Contact2::updateOrCreate(['id' => 1], $data);

        // Display success message using toastr
        toastr()->success('Updated Successfully');

        // Redirect back to the previous page
        return redirect()->back();
    }
}
