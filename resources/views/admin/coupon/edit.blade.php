@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Coupon</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Update Coupon</h4>
        </div>


        <div class="card-body">
            <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $coupon->name) }}">
                </div>

                <div class="form-group">
                    <label>Coupon Code</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code', $coupon->code) }}">
                </div>

                <div class="form-group">
                    <label>Max Uses of Coupon</label>
                    <input type="text" name="quantity" class="form-control" value="{{ old('quantity', $coupon->quantity) }}">
                </div>

                <div class="form-group">
                    <label>Minimum Purchase Price</label>
                    <input type="text" name="min_purchase_amount" class="form-control" value="{{ old('min_purchase_amount', $coupon->min_purchase_amount) }}">
                </div>

                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $coupon->start_date) }}">
                </div>

                <div class="form-group">
                    <label>Expire Date</label>
                    <input type="date" name="expire_date" class="form-control" value="{{ old('expire_date', $coupon->expire_date) }}">
                </div>

                <div class="form-group">
                    <label>Discount Type</label>
                    <select name="discount_type" class="form-control">
                        <option value="percent" @selected(old('discount_type', $coupon->discount_type) === 'percent')>Percent</option>
                        <option value="amount" @selected(old('discount_type', $coupon->discount_type) === 'amount')>Amount ({{ config('settings.site_currency_icon') }})</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Discount Amount</label>
                    <input type="text" name="discount" class="form-control" value="{{ old('discount', $coupon->discount) }}">
                </div>

                <!-- Apply Coupon By Dropdown -->
                <div class="form-group">
                    <label>Apply Coupon By</label>
                    <select name="apply_by" class="form-control" id="applyByDropdown">
                        <option value="">Select Option</option>
                        <option value="category" @selected(old('apply_by', $coupon->apply_by) === 'category')>Category</option>
                        <option value="product" @selected(old('apply_by', $coupon->apply_by) === 'product')>Product</option>
                    </select>
                </div>

                <!-- Category Selection -->
                <div id="categorySelection" class="{{ old('apply_by', $coupon->apply_by) === 'category' ? '' : 'd-none' }}">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control" id="categoryDropdown">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $coupon->category_id) == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group d-none">
                        <label>Sub Category</label>
                        <select name="sub_category_id" class="form-control" id="subcategoryDropdown">
                            <option value="">Select Subcategory</option>
                        </select>
                    </div>
                </div>

                <!-- Product Selection -->


                <div id="productSelection" class="{{ old('apply_by', $coupon->apply_by) === 'product' ? '' : 'd-none' }}">
                    <div class="form-group">
                        <label>Products</label>
                        <select name="product_ids[]" class="form-control select2" multiple="multiple">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    @if(in_array($product->id, old('product_ids', $coupon->products->pluck('id')->toArray())))
                                        selected
                                    @endif>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Per Coupon Limits -->
                <div class="form-group">
                    <label>Max Uses Per User</label>
                    <input type="number" name="max_uses_per_user" class="form-control" value="{{ old('max_uses_per_user', $coupon->max_uses_per_user) }}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" @selected(old('status', $coupon->status) == 1)>Active</option>
                        <option value="0" @selected(old('status', $coupon->status) == 0)>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</section>

@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        function loadSubcategories(categoryId) {
            var $subcategoryDropdown = $('#subcategoryDropdown');
            $subcategoryDropdown.empty().append('<option value="">Select Subcategory</option>');

            if (categoryId) {
                $.ajax({
                    url: "{{ route('admin.subcategories', ':categoryId') }}".replace(':categoryId', categoryId),
                    type: 'GET',
                    success: function(response){
                        $.each(response, function(index, subcategory){
                            $subcategoryDropdown.append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                        });

                        // Set the selected subcategory if it exists
                        $subcategoryDropdown.val('{{ old('sub_category_id', $coupon->sub_category_id) }}');
                        $subcategoryDropdown.closest('.form-group').removeClass('d-none');
                    }
                });
            } else {
                $subcategoryDropdown.closest('.form-group').addClass('d-none');
            }
        }

        // Load subcategories based on the selected category
        $('#categoryDropdown').on('change', function(){
            var categoryId = $(this).val();
            loadSubcategories(categoryId);
        });

        // Load subcategories for the initially selected category
        var initialCategoryId = $('#categoryDropdown').val();
        if (initialCategoryId) {
            loadSubcategories(initialCategoryId);
        }

        // Toggle visibility of category and product selections
        $('#applyByDropdown').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'category') {
                $('#categorySelection').removeClass('d-none');
                $('#productSelection').addClass('d-none');
            } else if (selectedValue === 'product') {
                $('#categorySelection').addClass('d-none');
                $('#productSelection').removeClass('d-none');
            } else {
                $('#categorySelection').addClass('d-none');
                $('#productSelection').addClass('d-none');
            }
        });

        // Initialize Select2 for product selection
        $('.select2').select2();
    });
</script>
@endpush
@endsection
