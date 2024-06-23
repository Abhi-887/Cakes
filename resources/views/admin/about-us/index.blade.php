@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>About Us</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update About Us</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.aboutus.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                   

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ @$about->title }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="summernote" class="form-control">{!! @$about->description !!}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
