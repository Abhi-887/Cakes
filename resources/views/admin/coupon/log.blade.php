@extends('admin.layouts.master')

@section('content')
    {{-- <div class="container">
        <h1>Coupon Usage Logs</h1>
        {!! $dataTable->table(['class' => 'table table-bordered table-striped'], true) !!}
    </div> --}}
    <section class="section">
        <div class="section-header">
            <h1>Coupon Usage Logs</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Coupon Usage log</h4>

            </div>
            <div class="card-body">


                {{ $dataTable->table() }}
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
