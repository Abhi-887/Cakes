@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Slider Category</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Slider Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.slider-category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
				<!-- 
                <div class="form-group">
                    <label>Image</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                </div>
                <div class="form-group">
                    <label>Background Image</label>
                    <div id="background-image-preview" class="image-preview">
                        <label for="background-image-upload" id="background-image-label">Choose File</label>
                        <input type="file" name="background_image" id="background-image-upload" />
                    </div>
                </div>
                <div class="form-group">
                    <label>Offer</label>
                    <input type="text" name="offer" class="form-control" id="remove">
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" id="remove">
                </div>
				-->
                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control" id="remove">
                </div>
               <!--  <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control" id="remove"></textarea>
                </div> 
                <div class="form-group">
                    <label>Button Link</label>
                    <input type="text" name="button_link" class="form-control" id="remove">
                </div>
				-->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="">
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            // Update image preview on file input change for main image
            $('#image-upload').on('change', function(){
                let input = this;

                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image-preview').css({
                            'background-image': 'url(' + e.target.result + ')',
                            'background-size': 'cover',
                            'background-position': 'center center'
                        });
                        $('#image-label').text('Change File');
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            });

            // Update image preview on file input change for background image
            $('#background-image-upload').on('change', function(){
                let input = this;

                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $('#background-image-preview').css({
                            'background-image': 'url(' + e.target.result + ')',
                            'background-size': 'cover',
                            'background-position': 'center center'
                        });
                        $('#background-image-label').text('Change File');
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>
@endpush
