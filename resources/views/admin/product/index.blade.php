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


        <div class="flex items-center justify-between gap10 flex-wrap">

            <a class="tf-button style-1 w208" href="{{ route('admin.product.create') }}">
                <i class="icon-plus"></i> Add new
            </a>

        </div>

        <!-- DataTable -->
        <div class="wg-table table-product-list">

            {!! $dataTable->table(['id' => 'products-table']) !!}
        </div>
    </div>
</div>


@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
