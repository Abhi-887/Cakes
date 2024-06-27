@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cakes Stand</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Cakes Stand</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.cakes-stand.update', $cakesstands->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $cakesstands->name }}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option @selected($cakesstands->status === 1) value="1">Active</option>
                            <option @selected($cakesstands->status === 0) value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset('images/cakesstands/' . $cakesstands->image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        });
    </script>
@endpush
;
