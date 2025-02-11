@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Coupon</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Coupon</h4>
        </div>
        <div class="card-body">
            <form id="couponForm" action="{{ route('admin.coupon.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Basic Coupon Details -->

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label>Coupon Code</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                </div>

                <div class="form-group">
                    <label>Max Uses of Coupon</label>
                    <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}">
                </div>

                <div class="form-group">
                    <label>Minimum Purchase Price</label>
                    <input type="text" name="min_purchase_amount" class="form-control" value="{{ old('min_purchase_amount') }}">
                </div>

                <!-- Start and Expire Date Fields -->

                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                </div>

                <div class="form-group">
                    <label>Expire Date</label>
                    <input type="date" name="expire_date" class="form-control" value="{{ old('expire_date') }}">
                </div>

                <!-- Discount Type and Amount -->

                <div class="form-group">
                    <label>Discount Type</label>
                    <select name="discount_type" class="form-control">
                        <option value="percent">Percent</option>
                        <option value="amount">Amount ({{ config('settings.site_currency_icon') }})</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Discount Amount</label>
                    <input type="text" name="discount" class="form-control" value="{{ old('discount') }}">
                </div>

                <!-- Max Uses Per User -->

                <div class="form-group">
                    <label>Max Uses Per User</label>
                    <input type="number" name="max_uses_per_user" class="form-control" value="{{ old('max_uses_per_user') }}">
                </div>

                <!-- Apply Coupon By Dropdown -->

                <div class="form-group">
                    <label>Apply Coupon By</label>
                    <select name="apply_by" class="form-control" id="applyByDropdown">
                        <option value="">Select Option</option>
                        <option value="category">Category</option>
                        <option value="product">Product</option>
                    </select>
                </div>

                <!-- Category Selection -->
                <div id="categorySelection" class="d-none">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control" id="categoryDropdown">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Subcategory Selection -->
                    <div class="form-group d-none">
                        <label>Sub Category</label>
                        <select name="sub_category_id" class="form-control" id="subcategoryDropdown">
                            <option value="">Select Subcategory</option>
                        </select>
                    </div>
                </div>

                <!-- Product Selection -->
                <div id="productSelection" class="d-none">
                    <div class="form-group">
                        <label>Products</label>
                        <select name="product_ids[]" class="form-control select2" multiple="multiple">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
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
    $(document).ready(function() {
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

        // Handle category and subcategory dropdowns
        $('#categoryDropdown').on('change', function() {
            var categoryId = $(this).val();
            $('#subcategoryDropdown').empty().append('<option value="">Select Sub Category</option>');
            if (categoryId !== '') {
                $.ajax({
                    url: "{{ route('admin.subcategories', ':categoryId') }}".replace(':categoryId', categoryId),
                    type: 'GET',
                    success: function(response) {
                        $.each(response, function(index, subcategory) {
                            $('#subcategoryDropdown').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                        });
                        $('.form-group.d-none').removeClass('d-none');
                    }
                });
            } else {
                $('.form-group.d-none').addClass('d-none');
            }
        });

        // Initialize Select2 for product selection
        $('.select2').select2();
    });
</script>

@endsection
