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
        $phoneImagePath = $this->uploadImage($request, 'phone_image', $request->old_phone_image);
        $emailImagePath = $this->uploadImage($request, 'email_image', $request->old_email_image);

        $data = $request->only([
            'phone_one',
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

        $data['phone_image'] = $phoneImagePath;
        $data['email_image'] = $emailImagePath;

        Contact::updateOrCreate(['id' => 1], $data);

        toastr()->success('Updated Successfully');

        return redirect()->back();
    }

    private function uploadImage($request, $fieldName, $defaultImage)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $path = $file->store('public/uploads');

            return $path;
        }

        return $defaultImage;
    }
}
