@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Consultation Info</h1>
        </div>


    </section>
    <section class="section">
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Consultation Info</h4>
            </div>
            <div class="card-body">
                {!! $dataTable->table(['class' => 'table table-bordered table-hover table-striped']) !!}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
