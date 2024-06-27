@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Second Contact</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Second Contact</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact2.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="phone_one">Phone One</label>
                        <textarea name="phone_one" class="form-control summernote">{{ old('phone_one', $contact->phone_one) }}</textarea>
                        @error('phone_one')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone_two">Phone Two</label>
                        <textarea name="phone_two" class="form-control summernote">{{ old('phone_two', $contact->phone_two) }}</textarea>
                        @error('phone_two')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone_image">Phone Image</label>
                        <div>
                            <label for="image-upload-phone" id="image-label-phone">Choose File</label>
                            <input type="file" name="phone_image" id="image-upload-phone" accept="image/*">
                        </div>
                        @if($contact && $contact->phone_image)
                            <img src="{{ Storage::url($contact->phone_image) }}" alt="Phone Image" class="img-thumbnail mt-2" style="max-width: 150px;">
                        @endif
                        @error('phone_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mail_one">Email One</label>
                        <input type="text" class="form-control" name="mail_one" value="{{ old('mail_one', $contact->mail_one) }}">
                        @error('mail_one')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mail_two">Email Two</label>
                        <input type="text" class="form-control" name="mail_two" value="{{ old('mail_two', $contact->mail_two) }}">
                        @error('mail_two')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email_image">Email Image</label>
                        <div>
                            <label for="image-upload-email" id="image-label-email">Choose File</label>
                            <input type="file" name="email_image" id="image-upload-email" accept="image/*">
                        </div>
                        @if($contact && $contact->email_image)
                            <img src="{{ Storage::url($contact->email_image) }}" alt="Email Image" class="img-thumbnail mt-2" style="max-width: 150px;">
                        @endif
                        @error('email_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control summernote">{{ old('address', $contact->address) }}</textarea>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="map_link">Google Map Link</label>
                        <input type="text" class="form-control" name="map_link" value="{{ old('map_link', $contact->map_link) }}">
                        @error('map_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title_one">Title One</label>
                        <input type="text" class="form-control" name="title_one" value="{{ old('title_one', $contact->title_one) }}">
                        @error('title_one')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description_one">Description One</label>
                        <textarea name="description_one" class="form-control summernote">{{ old('description_one', $contact->description_one) }}</textarea>
                        @error('description_one')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title_two">Title Two</label>
                        <input type="text" class="form-control" name="title_two" value="{{ old('title_two', $contact->title_two) }}">
                        @error('title_two')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description_two">Description Two</label>
                        <textarea name="description_two" class="form-control summernote">{{ old('description_two', $contact->description_two) }}</textarea>
                        @error('description_two')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title_three">Title Three</label>
                        <input type="text" class="form-control" name="title_three" value="{{ old('title_three', $contact->title_three) }}">
                        @error('title_three')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description_three">Description Three</label>
                        <textarea name="description_three" class="form-control summernote">{{ old('description_three', $contact->description_three) }}</textarea>
                        @error('description_three')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="main_description">Main Description</label>
                        <textarea name="main_description" class="form-control summernote">{{ old('main_description', $contact->main_description) }}</textarea>
                        @error('main_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
