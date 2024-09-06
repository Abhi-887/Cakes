@extends('admin.layouts.master')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Coupon Usage Logs</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Coupon Usage Logs</h4>
            </div>
            <div class="card-body">
                {{-- DataTable with Export Buttons --}}
                {!! $dataTable->table(['class' => 'table table-bordered table-striped'], true) !!}
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    {{-- DataTable scripts to handle buttons --}}
    {!! $dataTable->scripts() !!}
@endpush
