@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Footer</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Footer Info</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.footer-info.update', 1)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Footer Info Title</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{@$footerInfo->name}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>phone</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{@$footerInfo->phone}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>email</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{@$footerInfo->email}}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>address</label>

                                <textarea name="address"
                                    class="form-control summernote">{{@$footerInfo->address}}</textarea>
                            </div>

                            {{-- <div class="form-group">
                                <label>copyright</label>
                                <input type="text" class="form-control" name="copyright"
                                    value="{{@$footerInfo->copyright}}">
                            </div> --}}

                            <button type="submmit" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

@endsection
