<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $contact = Contact::first();
        return view('admin.contact.index', compact('contact'));
    }

    public function update(ContactUpdateRequest $request): RedirectResponse
    {
        // Retrieve validated data from the request
        $data = $request->only([
            'phone_one', 'phone_two', 'mail_one', 'mail_two', 'address',
            'map_link', 'title_one', 'Description_one', 'title_two',
            'Description_two', 'title_three', 'Description_three'
        ]);

        // Handle file uploads for phone_image
        if ($request->hasFile('phone_image')) {
            $data['phone_image'] = $request->file('phone_image')->store('uploads', 'public');
        }

        // Handle file uploads for email_image
        if ($request->hasFile('email_image')) {
            $data['email_image'] = $request->file('email_image')->store('uploads', 'public');
        }
        // Update or create a Contact record with id = 1
        Contact::updateOrCreate(['id' => 1], $data);

        // Display success message using toastr
        toastr()->success('Updated Successfully');

        // Redirect back to the previous page
        return redirect()->back();
    }
}
