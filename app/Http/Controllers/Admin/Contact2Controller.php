<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact2UpdateRequest;
use App\Models\Contact2;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Contact2Controller extends Controller
{
    function index(): View
    {
        $contact = Contact2::first();
        return view('admin.contact2.index', compact('contact'));
    }

    function update(Contact2UpdateRequest $request): RedirectResponse
    {
        Contact2::updateOrCreate(
            ['id' => 1],
            [
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'phone_image' => $request->phone_image,
                'mail_one' => $request->mail_one,
                'mail_two' => $request->mail_two,
                'email_image' => $request->email_image,
                'address' => $request->address,
                'map_link' => $request->map_link,
                'title_one' => $request->title_one,
                'Description_one' => $request->Description_one,
                'title_two' => $request->title_two,
                'Description_two' => $request->Description_two,
                'title_three' => $request->title_three,
                'Description_three' => $request->Description_three,
                'Description' => $request->Description

            ]
        );

        toastr()->success('Created Successfully');

        return redirect()->back();
    }
}
