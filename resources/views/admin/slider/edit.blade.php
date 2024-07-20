@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Slider</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select</option>
                            @foreach ($categories as $categoryId => $categoryName)
                                <option value="{{ $categoryId }}" @if ($categoryId == $slider->category_id) selected @endif>
                                    {{ $categoryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

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
                        <input type="text" name="offer" class="form-control" value="{{ $slider->offer }}">
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                    </div>

                    <div class="form-group">
                        <label>Sub Title</label>
                        <input type="text" name="sub_title" class="form-control" value="{{ $slider->sub_title }}">
                    </div>

                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" class="form-control">{{ $slider->short_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Button Link</label>
                        <input type="text" name="button_link" class="form-control" value="{{ $slider->button_link }}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option @if ($slider->status === 1) selected @endif value="1">Active</option>
                            <option @if ($slider->status === 0) selected @endif value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Show at Home</label>
                        <select name="show_at_home" class="form-control" id="">
                            <option @selected($slider->show_at_home === 0) value="0">Home</option>
                            <option @selected($slider->show_at_home === 1) value="1">Wedding Cakes</option>
                            <option @selected($slider->show_at_home === 2) value="2">Birthday & Party Cakes</option>
                            <option @selected($slider->show_at_home === 3) value="3">Voucher Redemption</option>
                            <option @selected($slider->show_at_home === 4) value="4">About Us</option>
                            <option @selected($slider->show_at_home === 5) value="5">Contact Us</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Assuming $slider->image contains the path to the main image
            let imagePath = '{{ asset($slider->image) }}';

            // Check if the main image path is not empty
            if (imagePath.trim() !== '') {
                $('#image-preview').css({
                    'background-image': 'url(' + imagePath + ')',
                    'background-size': 'cover',
                    'background-position': 'center center'
                });
                $('#image-label').text('Change File');
            }

            // Assuming $slider->background_image contains the path to the background image
            let backgroundImagePath = '{{ asset($slider->background_image) }}';

            // Check if the background image path is not empty
            if (backgroundImagePath.trim() !== '') {
                $('#background-image-preview').css({
                    'background-image': 'url(' + backgroundImagePath + ')',
                    'background-size': 'cover',
                    'background-position': 'center center'
                });
                $('#background-image-label').text('Change File');
            }

            // Update main image preview on file input change
            $('#image-upload').on('change', function() {
                let input = this;

                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
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

            // Update background image preview on file input change
            $('#background-image-upload').on('change', function() {
                let input = this;

                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
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
