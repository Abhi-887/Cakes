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
    function index(): View
    {
        $contact = Contact::first();
        return view('admin.contact.index', compact('contact'));
    }

    function update(ContactUpdateRequest $request): RedirectResponse
    {
        $data = $request->only([
            'phone_one' => $request->phone_one,
            'phone_two',
            'mail_one',
            'mail_two',
            'address',
            'map_link',
            'title_one',
            'Description_one',
            'title_two',
            'Description_two',
            'title_three',
            'Description_three'
        ]);

        // Handle file uploads
        if ($request->hasFile('phone_image')) {
            $data['phone_image'] = $request->file('phone_image')->store('images/contacts', 'public');
        }

        if ($request->hasFile('email_image')) {
            $data['email_image'] = $request->file('email_image')->store('images/contacts', 'public');
        }

        Contact::updateOrCreate(['id' => 1], $data);

        toastr()->success('Updated Successfully');

        return redirect()->back();
    }
}
