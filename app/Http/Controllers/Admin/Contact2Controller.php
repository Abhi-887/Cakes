<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Contact2;
use Illuminate\Support\Facades\Storage;

class Contact2Controller extends Controller
{
    public function index(): View
    {
        $contact = Contact2::first();
        return view('admin.contact2.index', compact('contact'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone_one' => 'required|string',
            'phone_two' => 'nullable|string',
            'phone_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mail_one' => 'required|email',
            'mail_two' => 'nullable|email',
            'email_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required|string',
            'map_link' => 'nullable|url',
            'title_one' => 'nullable|string',
            'Description_one' => 'nullable|string',
            'title_two' => 'nullable|string',
            'Description_two' => 'nullable|string',
            'title_three' => 'nullable|string',
            'Description_three' => 'nullable|string',
            'Description' => 'nullable|string',
        ]);

        $contact = Contact2::first(); // Corrected model name

        $contact->phone_one = $request->phone_one;
        $contact->phone_two = $request->phone_two;

        if ($request->hasFile('phone_image')) {
            $phoneImagePath = $request->file('phone_image')->store('uploads', 'public');
            $contact->phone_image = $phoneImagePath;
        }

        $contact->mail_one = $request->mail_one;
        $contact->mail_two = $request->mail_two;

        if ($request->hasFile('email_image')) {
            $emailImagePath = $request->file('email_image')->store('uploads', 'public');
            $contact->email_image = $emailImagePath;
        }

        $contact->address = $request->address;
        $contact->map_link = $request->map_link;
        $contact->title_one = $request->title_one;
        $contact->Description_one = $request->Description_one;
        $contact->title_two = $request->title_two;
        $contact->Description_two = $request->Description_two;
        $contact->title_three = $request->title_three;
        $contact->Description_three = $request->Description_three;
        $contact->Description = $request->Description;

        $contact->save();

        return redirect()->route('admin.contact2.index')->with('success', 'Contact updated successfully');
    }
}
