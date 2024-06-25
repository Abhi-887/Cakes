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
                        <textarea name="phone_one" id="phone_one" class="form-control summernote">{{ old('phone_one', @$contact->phone_one) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="phone_two">Phone Two</label>
                        <textarea name="phone_two" id="phone_two" class="form-control summernote">{{ old('phone_two', @$contact->phone_two) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="phone_image">Phone Image</label>
                        <div id="phone-image-preview" class="image-preview">
                            <label for="phone-image-upload" id="phone-image-label">Choose File</label>
                            <input type="file" name="phone_image" id="phone-image-upload" value="{{ old('phone_image', @$contact->phone_image) }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mail_one">Email One</label>
                        <input type="email" class="form-control" name="mail_one" id="mail_one" value="{{ old('mail_one', @$contact->mail_one) }}">
                    </div>

                    <div class="form-group">
                        <label for="mail_two">Email Two</label>
                        <input type="email" class="form-control" name="mail_two" id="mail_two" value="{{ old('mail_two', @$contact->mail_two) }}">
                    </div>

                    <div class="form-group">
                        <label for="email_image">Email Image</label>
                        <div id="email-image-preview" class="image-preview">
                            <label for="email-image-upload" id="email-image-label">Choose File</label>
                            <input type="file" name="email_image" id="email-image-upload" value="{{ old('email_image', @$contact->email_image) }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control summernote">{{ old('address', @$contact->address) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="map_link">Google Map Link</label>
                        <input type="text" class="form-control" name="map_link" id="map_link" value="{{ old('map_link', @$contact->map_link) }}">
                    </div>

                    <div class="form-group">
                        <label for="title_one">Title One</label>
                        <input type="text" class="form-control" name="title_one" id="title_one" value="{{ old('title_one', @$contact->title_one) }}">
                    </div>

                    <div class="form-group">
                        <label for="description_one">Description</label>
                        <textarea name="description_one" id="description_one" class="form-control summernote">{{ old('description_one', @$contact->description_one) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="title_two">Title Two</label>
                        <input type="text" class="form-control" name="title_two" id="title_two" value="{{ old('title_two', @$contact->title_two) }}">
                    </div>

                    <div class="form-group">
                        <label for="description_two">Description</label>
                        <textarea name="description_two" id="description_two" class="form-control summernote">{{ old('description_two', @$contact->description_two) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="title_three">Title Three</label>
                        <input type="text" class="form-control" name="title_three" id="title_three" value="{{ old('title_three', @$contact->title_three) }}">
                    </div>

                    <div class="form-group">
                        <label for="description_three">Description</label>
                        <textarea name="description_three" id="description_three" class="form-control summernote">{{ old('description_three', @$contact->description_three) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="main_description">Main Description</label>
                        <textarea name="main_description" id="main_description" class="form-control summernote">{{ old('main_description', @$contact->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            // Function to update image preview
            function updateImagePreview(input, previewSelector, labelSelector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $(previewSelector).css({
                            'background-image': 'url(' + e.target.result + ')',
                            'background-size': 'cover',
                            'background-position': 'center center'
                        });
                        $(labelSelector).text('Change File');
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Update image preview on file input change for phone image
            $('#phone-image-upload').on('change', function(){
                updateImagePreview(this, '#phone-image-preview', '#phone-image-label');
            });

            // Update image preview on file input change for email image
            $('#email-image-upload').on('change', function(){
                updateImagePreview(this, '#email-image-preview', '#email-image-label');
            });
        });
    </script>
@endpush
