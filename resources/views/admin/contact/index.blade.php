@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Contact</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Updated Contact</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Phone One</label>
                        <textarea name="phone_one"   class="form-control summernote">{{@$contact->phone_one}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Phone Two</label>

                        <textarea name="phone_two"   class="form-control summernote">{{@$contact->phone_two}}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="phone_image">Phone Image</label>
                        <input type="file" name="phone_image" id="phone_image">
                        @if ($contact->phone_image)
                            <img src="{{ asset('storage/' . $contact->phone_image) }}" alt="Phone Image" width="100">
                        @endif
                    </div>



                    <div class="form-group">
                        <label for="">Email One</label>
                        <input type="text" class="form-control" name="mail_one" value="{{ @$contact->mail_one }}">
                    </div>


                    <div class="form-group">
                        <label for="">Email Two</label>
                        <input type="text" class="form-control" name="mail_two" value="{{ @$contact->mail_two }}">
                    </div>


                    <div class="form-group">
                        <label for="email_image">Email Image</label>
                        <input type="file" name="email_image" id="email_image">
                        @if ($contact->email_image)
                            <img src="{{ asset('storage/' . $contact->email_image) }}" alt="Email Image" width="100">
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="">Address</label>

						<textarea name="address" class="form-control summernote">{{ @$contact->address }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Google Map Link</label>
                        <input type="text" class="form-control" name="map_link" value="{{ @$contact->map_link }}">
                    </div>



                    <div class="form-group">
                        <label for="">Title One</label>
                        <input type="text" class="form-control" name="title_one" value="{{ @$contact->title_one }}">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="Description_one"   class="form-control summernote">{{@$contact->Description_one}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Title Two</label>
                        <input type="text" class="form-control" name="title_two" value="{{ @$contact->title_two }}">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="Description_two"   class="form-control summernote">{{@$contact->Description_two}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Title Three</label>
                        <input type="text" class="form-control" name="title_three" value="{{ @$contact->title_three}}">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="Description_three"   class="form-control summernote">{{@$contact->Description_three}}</textarea>
                    </div>



                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
