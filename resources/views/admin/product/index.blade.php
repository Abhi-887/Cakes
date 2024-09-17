@extends('admin.layouts.master')

@section('content')
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
