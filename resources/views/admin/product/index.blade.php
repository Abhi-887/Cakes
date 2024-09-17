@extends('admin.layouts.master')

@section('content')
<style>

    /* Custom image styles for the product table */
#product-table img {
    border-radius: 8px;
    width: 80px;
    height: auto;
}

/* Custom action button styles */
.btn-group .btn {
    padding: 6px 12px;
    font-size: 14px;
    margin-right: 5px;
}

.btn-group .btn i {
    margin-right: 3px;
}

.dropdown-menu a {
    font-size: 14px;
    padding: 6px 15px;
}

/* Modernize table styles */
#product-table th {
    background-color: #f9f9f9;
    font-weight: bold;
    font-size: 14px;
    color: #333;
    text-transform: uppercase;
}

#product-table td {
    font-size: 14px;
    vertical-align: middle;
}

#product-table {
    border-collapse: separate;
    border-spacing: 0 15px;
}

.dataTables_paginate {
    margin-top: 20px;
}

/* Search bar customization */
.dataTables_filter {
    margin-bottom: 20px;
}

.dataTables_filter input {
    border-radius: 20px;
    padding: 8px 15px;
    border: 1px solid #ccc;
}

    </style>
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 mb-27">
        <h3>Product List</h3>
    </div>

    <div class="wg-box">
        <div class="title-box">
            <i class="icon-coffee"></i>
            <div class="body-text">
                Tip: Search by Product ID: Each product is provided with a unique ID, which you can rely on to find the exact product you need.
            </div>
        </div>

        <div class="flex items-center justify-between gap10 flex-wrap">
            <div class="wg-filter flex-grow">
                <div class="show">
                    <div class="text-tiny">Showing</div>
                    <div class="select">
                        <select id="product-length-change" class="form-control">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <div class="text-tiny">entries</div>
                </div>
                <form class="form-search">
                    <fieldset class="name">
                        <input type="text" placeholder="Search here..." id="product-search" class="form-control" name="name">
                    </fieldset>
                    <div class="button-submit">
                        <button type="button" id="search-btn" class="btn btn-primary"><i class="icon-search"></i></button>
                    </div>
                </form>
            </div>
            <a class="tf-button style-1 w208" href="{{ route('admin.product.create') }}">
                <i class="icon-plus"></i> Add new
            </a>
        </div>

        <!-- DataTable -->
        <div class="wg-table table-product-list">
            {!! $dataTable->table(['id' => 'products-table', 'class' => 'table table-bordered table-hover table-striped']) !!}
        </div>
    </div>
</div>


@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
