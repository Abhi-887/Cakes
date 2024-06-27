@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cakes Stand</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Cakes Stand</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.cakes-stand.create') }}" class="btn btn-primary">
                        Create new
                    </a>
                </div>
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
