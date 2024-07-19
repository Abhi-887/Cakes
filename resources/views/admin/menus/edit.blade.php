@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Menu</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Edit Menu</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.menus.update', $menus->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $menus->name }}">
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control" value="{{ $menus->link }}">
                    </div>

                    <div class="form-group">
                        <label for="parentmenus">Parent Menu</label>
                        <select name="parentmenus" class="form-control" id="parentmenus">
                            <option value="">Select Parent Menu</option>
                            @foreach ($allmenu as $parent)
                                <option value="{{ $parent->id }}" @if ($parent->id == $parent->parentmenus) selected @endif>
                                    {{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="1" @if ($menus->status === 1) selected @endif>Active</option>
                            <option value="0" @if ($menus->status === 0) selected @endif>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
