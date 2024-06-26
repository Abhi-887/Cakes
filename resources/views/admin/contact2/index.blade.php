@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Second Contact</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Updated Second Contact</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact2.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="phone_one">Phone One</label>
                        <textarea name="phone_one" class="form-control summernote">{{ old('phone_one', $contact->phone_one) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="phone_two">Phone Two</label>
                        <textarea name="phone_two" class="form-control summernote">{{ old('phone_two', $contact->phone_two) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="phone_image">Phone Image</label>
                        <div>
                            <label for="phone_image_upload" id="phone_image_label">Choose File</label>
                            <input type="file" name="phone_image" id="phone_image_upload"/>
                        </div>
                        @if($contact && $contact->phone_image)
                            <img src="{{ Storage::url($contact->phone_image) }}" alt="Phone Image" style="max-width: 200px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="mail_one">Email One</label>
                        <input type="text" class="form-control" name="mail_one" value="{{ old('mail_one', $contact->mail_one) }}">
                    </div>

                    <div class="form-group">
                        <label for="mail_two">Email Two</label>
                        <input type="text" class="form-control" name="mail_two" value="{{ old('mail_two', $contact->mail_two) }}">
                    </div>

                    <div class="form-group">
                        <label for="email_image">Email Image</label>
                        <div>
                            <label for="email_image_upload" id="email_image_label">Choose File</label>
                            <input type="file" name="email_image" id="email_image_upload"/>
                        </div>
                        @if($contact && $contact->email_image)
                            <img src="{{ Storage::url($contact->email_image) }}" alt="Email Image" style="max-width: 200px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control summernote">{{ old('address', $contact->address) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="map_link">Google Map Link</label>
                        <input type="text" class="form-control" name="map_link" value="{{ old('map_link', $contact->map_link) }}">
                    </div>

                    <div class="form-group">
                        <label for="title_one">Title One</label>
                        <input type="text" class="form-control" name="title_one" value="{{ old('title_one', $contact->title_one) }}">
                    </div>

                    <div class="form-group">
                        <label for="description_one">Description One</label>
                        <textarea name="description_one" class="form-control summernote">{{ old('description_one', $contact->description_one) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="title_two">Title Two</label>
                        <input type="text" class="form-control" name="title_two" value="{{ old('title_two', $contact->title_two) }}">
                    </div>

                    <div class="form-group">
                        <label for="description_two">Description Two</label>
                        <textarea name="description_two" class="form-control summernote">{{ old('description_two', $contact->description_two) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="title_three">Title Three</label>
                        <input type="text" class="form-control" name="title_three" value="{{ old('title_three', $contact->title_three) }}">
                    </div>

                    <div class="form-group">
                        <label for="description_three">Description Three</label>
                        <textarea name="description_three" class="form-control summernote">{{ old('description_three', $contact->description_three) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="main_description">Main Description</label>
                        <textarea name="main_description" class="form-control summernote">{{ old('main_description', $contact->main_description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
