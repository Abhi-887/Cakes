@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Product</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Update Product</h4>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                </div>

                <div class="form-group">
					<label>Category</label>
					<select name="category" class="form-control" id="categoryDropdown">
						<option value="">Select</option>
						@foreach ($categories as $category)
							@if ($category->parent === 0)
								<option value="{{ $category->id }}" data-parent="{{ $category->parent }}"
									{{ $product->category_id == $category->id ? 'selected' : '' }}>
									{{ $category->name }}
								</option>
							@endif
						@endforeach
					</select>
				</div>

                <div class="form-group">
                    <label>Sub Category</label>
                    <select name="sub" class="form-control" id="subcategoryDropdown">
						@foreach ($categories as $category)
							@if ($category->parent == $product->category_id)
								<option value="{{ $category->id }}"
									{{ $product->sub_category == $category->id ? 'selected' : '' }}>
									{{ $category->name }}
								</option>
							@endif
						@endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                </div>

                <div class="form-group">
                    <label>Offer Price</label>
                    <input type="text" name="offer_price" class="form-control" value="{{ $product->offer_price }}">
                </div>

                <div class="form-group">
                    <label for="stock_settings">Stock Settings</label>
                    <div id="stock_settings" class="p-3 border rounded">
                        <!-- Available Quantity Field -->
                        <div class="form-group">
                            <label>Available Qty</label>
                            <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
                        </div>

                        <!-- Track Stock Field -->
                        <div class="form-group">
                            <label>Track Stock</label><br>
                            <input type="radio" name="track_stock" id="track_stock_yes" value="1" {{ $product->track_stock == 1 ? 'checked' : '' }}>
                            <label for="track_stock_yes">Yes</label>

                            <input type="radio" name="track_stock" id="track_stock_no" value="0" {{ $product->track_stock == 0 ? 'checked' : '' }}>
                            <label for="track_stock_no">No</label>
                        </div>


                        <!-- Out of Stock Field -->
                        <div class="form-group">
                            <label>Keep product in list view even after out of stock</label><br>
                            <input type="checkbox" name="out_of_stock" id="out_of_stock" value="1" {{ $product->out_of_stock ? 'checked' : '' }}>
                            <label for="out_of_stock">Show as out of stock</label>
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control" id="">{!! $product->short_description !!}</textarea>
                </div>

                <div class="form-group">
                    <label>Long Description</label>
                    <textarea name="long_description" class="form-control summernote" id="">{!! $product->long_description !!}</textarea>
                </div>

                <div class="form-group">
                    <label>Sku</label>
                    <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
                </div>

                <div class="form-group">
                    <label>Seo Title</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ $product->seo_title }}">
                </div>

                <div class="form-group">
                    <label>Seo Description</label>
                    <textarea name="seo_description" class="form-control" id="">{!! $product->seo_description !!}</textarea>
                </div>

                <div class="form-group">
                    <label>Show at Home</label>
                    <select name="show_at_home" class="form-control" id="">
                        <option @selected($product->show_at_home === 1) value="1">Yes</option>
                        <option @selected($product->show_at_home === 0) value="0">No</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="inputState">Status</label>
                    <select id="inputState" class="form-control" name="status">
                      <option {{$product->status == 1 ? 'selected' : ''}} value="1">Active</option>
                      <option {{$product->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
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
	$(document).ready(function(){
		$('.image-preview').css({
			'background-image': 'url({{ asset($product->thumb_image) }})',
			'background-size': 'cover',
			'background-position': 'center center'
		})

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
});
</script>

@endpush
