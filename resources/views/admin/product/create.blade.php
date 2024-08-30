@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Product</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Image</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control" id="categoryDropdown">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            @if($category->parent === 0)
                                <option value="{{ $category->id }}" data-parent="{{ $category->parent }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group d-none">
                    <label>Sub Category</label>
                    <select name="sub" class="form-control" id="subcategoryDropdown">
                    </select>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label>Offer Price</label>
                    <input type="text" name="offer_price" class="form-control" value="{{ old('offer_price') }}">
                </div>

                <div class="form-group">
                    <label for="stock_settings">Stock Settings</label>
                    <div id="stock_settings" class="p-3 border rounded">
                        <!-- Available Quantity Field -->
                        <div class="form-group">
                            <label>Available Qty</label>
                            <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}">
                        </div>

                        <!-- Track Stock Field -->
                        <div class="form-group">
                            <label>Track Stock</label><br>
                            <input type="radio" name="track_stock" id="track_stock_yes" value="1">
                            <label for="track_stock_yes">Yes</label>
                            <input type="radio" name="track_stock" id="track_stock_no" value="0" checked>
                            <label for="track_stock_no">No</label>
                        </div>

                        <!-- Out of Stock Field -->
                        <div class="form-group">
                            <label>Keep product in list view even after out of stock</label><br>
                            <input type="checkbox" name="out_of_stock" id="out_of_stock" value="1">
                            <label for="out_of_stock">Show as out of stock</label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control" id="">{{ old('short_description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Long Description</label>
                    <textarea name="long_description" class="form-control summernote" id="">{{ old('long_description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Sku</label>
                    <input type="text" name="sku" class="form-control" value="{{ old('sku') }}">
                </div>

                <div class="form-group">
                    <label>Seo Title</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                </div>

                <div class="form-group">
                    <label>Seo Description</label>
                    <textarea name="seo_description" class="form-control" id="">{{ old('seo_description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Show at Home</label>
                    <select name="show_at_home" class="form-control" id="">
                        <option value="1">Yes</option>
                        <option selected value="0">No</option>
                    </select>
                </div>






                <div class="form-group">
                    <label for="inputState">Status</label>
                    <select id="inputState" class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                </div>



                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#categoryDropdown').on('change', function(){
            var categoryId = $(this).val();
            $('#subcategoryDropdown').empty().append('<option value="">Select Sub Category</option>');
            if (categoryId !== '') {
                $.ajax({
                    url: "{{ route('admin.subcategories', ':categoryId') }}".replace(':categoryId', categoryId),
                    type: 'GET',
                    success: function(response){
                        $.each(response, function(index, subcategory){
                            $('#subcategoryDropdown').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                        });
                        $('.form-group.d-none').removeClass('d-none');
                    }
                });
            }
            else {
                $('.form-group.d-none').addClass('d-none');
            }
        });
    });
</script>

@endsection
