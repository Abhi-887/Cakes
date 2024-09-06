@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>Coupon Usage Logs</h1>
        {!! $dataTable->table(['class' => 'table table-bordered table-striped'], true) !!}
    </div>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
