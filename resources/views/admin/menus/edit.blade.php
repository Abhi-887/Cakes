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
                <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $menu->name }}">
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control" value="{{ $menu->link }}">
                    </div>

                    <div class="form-group">
                        <label for="parent">Parent</label>
                        <select name="parent" class="form-control" id="parent">
                            <option value="" selected>Select Parent Category</option>
                            {{-- Iterate through $categories and populate options --}}
                            @foreach ($menus as $m)
                                <option value="{{ $m->id }}" @if ($m->id === $menu->parent_id) selected @endif>
                                    {{ $m->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="1" @if ($menu->status === 1) selected @endif>Active</option>
                            <option value="0" @if ($menu->status === 0) selected @endif>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
