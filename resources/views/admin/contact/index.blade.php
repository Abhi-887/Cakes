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
                        <textarea name="text"   class="form-control summernote">{{@$contact->phone_one}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Phone Two</label>

                        <textarea name="text"   class="form-control summernote">{{@$contact->phone_two}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Phone Image</label>
                        <input type="file" class="form-control" name="image" value="{{ @$contact->image }}">
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
                        <label for="">Email Image</label>
                        <input type="file" class="form-control" name="image" value="{{ @$contact->image }}">
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
                        <input type="text" class="form-control" name="title" value="{{ @$contact->title_one }}">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="text"   class="form-control summernote">{{@$contact->Description_one}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Title Two</label>
                        <input type="text" class="form-control" name="title" value="{{ @$contact->title_two }}">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="text"   class="form-control summernote">{{@$contact->Description_two}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Title Three</label>
                        <input type="text" class="form-control" name="title" value="{{ @$contact->title_three}}">
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="text"   class="form-control summernote">{{@$contact->Description_three}}</textarea>
                    </div>



                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
