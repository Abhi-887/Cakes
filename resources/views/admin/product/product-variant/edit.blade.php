@extends('admin.layouts.master')

@section('content')
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Product Attributes</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Attribute</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.products-variant.update', $variant->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{$variant->name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status">
                                    <option {{$variant->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$variant->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputState">Is Required</label>
                                <select id="inputState" class="form-control" name="isrequired">
                                    <option {{$variant->isrequired == 1 ? 'selected' : ''}} value="1">Yes</option>
                                    <option {{$variant->isrequired == 0 ? 'selected' : ''}} value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Sort Order</label>
                                <input type="number" class="form-control" name="shotorder"
                                    value="{{$variant->shotorder}}">
                            </div>



                            <!-- Attribute Type Dropdown -->
                            <div class="form-group">
                                <label for="attributeType">Attribute Type</label>
                                <select id="attributeType" class="form-control" name="attribute_type">

                                    <optgroup label="Text">
                                        <option value="field" {{$variant->attribute_type == 'field' ? 'selected' :
                                            ''}}>Field</option>
                                        <option value="area" {{$variant->attribute_type == 'area' ? 'selected' :
                                            ''}}>Area</option>
                                    </optgroup>
                                    <optgroup label="Select">
                                        <option value="dropdown" {{$variant->attribute_type == 'dropdown' ? 'selected' :
                                            ''}}>Drop-Down</option>
                                        <option value="radio" {{$variant->attribute_type == 'radio' ? 'selected' :
                                            ''}}>Radio Button</option>
                                        <option value="checkbox" {{$variant->attribute_type == 'checkbox' ? 'selected' :
                                            ''}}>Checkbox</option>
                                        <option value="multipleselect" {{$variant->attribute_type == 'multipleselect' ?
                                            'selected' : ''}} >Multiple Select</option>
                                    </optgroup>
                                    <optgroup label="Date">
                                        <option value="date" {{$variant->attribute_type == 'date' ? 'selected' : ''}}
                                            >Date</option>
                                        <option value="datetime" {{$variant->attribute_type == 'datetime' ? 'selected' :
                                            ''}}>Date & Time</option>
                                        <option value="time" {{$variant->attribute_type == 'time' ? 'selected' :
                                            ''}}>Time</option>
                                </select>

                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

@endsection
