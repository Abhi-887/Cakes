@extends('admin.layouts.master')

@section('content')
<h1>Edit Attribute</h1>

<form action="{{ route('attributes.update',  ['id' => $id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title:</label>
    <input type="text" name="title" value="{{ $productAttr->title }}" required>


    <button type="submit">Update Attribute</button>
</form>

<h2>Edit Options</h2>

<ul>
    @foreach ($attrOptions as $option)
    <li>
        {{ $option->title }} - {{ $option->price }}
        <!-- Display other option fields as needed -->
        <form action="{{ route('attributes.deleteOption', $option->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Option</button>
        </form>
    </li>
    @endforeach
</ul>

@endsection

{{-- @extends('admin.layouts.master')

@section('content')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .draggable {
        cursor: move;
    }

    .navbar {
        position: absolute;
    }

    .sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .sortable .card {
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        margin: 5px;
        padding: 10px;
        cursor: move;
    }

    .size {
        width: 25px;
        height: 25px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    .toast-success {
        background-color: #4CAF50;
        color: white;
    }

    .toast-error {
        background-color: red;
        color: white;
    }
</style>

<section class="section">
    <div class="section-header">
        <h1>Attributes of {{$attributes->first()->product->name ?? 'Product'}}</h1>
    </div>
    <div class=" ">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 text-right"><button class="btn btn-primary btn-add-attribute">Add Attribute</button>
                </div>
                <form method="POST" action="{{route('admin.attributes.update', $product_id)}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="product_id" value="{{ $product_id }}">
                    <div class="sortable" id="sortable-container">
                        @foreach ($attributes as $attribute)
                        <div class="card mb-3">
                            <div class="text-right mt-2 pe-3">
                                <button class="btn btn-danger btn-delete-attribute">Delete</button>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Title<span class="text-danger">*</span></label>
                                        <div class="mt-3"><input class="form-control" type="text"
                                                name="m[{{$attribute->id}}][title]" value="{{$attribute->title}}"></div>
                                    </div>
                                    <div class="col-md-3"><label for="">Input Type<span
                                                class="text-danger">*</span></label>
                                        <div class="mt-3">
                                            <select class="form-control sub-category"
                                                name="m[{{$attribute->id}}][input_type]">
                                                <option>--Please Select--</option>
                                                <optgroup label="Text">
                                                    <option value="1" @if($attribute->input_type == 1) selected
                                                        @endif>Field</option>
                                                    <option value="2" @if($attribute->input_type == 2) selected
                                                        @endif>Area</option>
                                                </optgroup>
                                                <optgroup label="Select">
                                                    <option value="3" @if($attribute->input_type == 3) selected
                                                        @endif>Drop-Down</option>
                                                    <option value="4" @if($attribute->input_type == 4) selected
                                                        @endif>Radio Button</option>
                                                    <option value="5" @if($attribute->input_type == 5) selected
                                                        @endif>Checkbox</option>
                                                    <option value="6" @if($attribute->input_type == 6) selected
                                                        @endif>Multiple Select</option>
                                                </optgroup>
                                                <optgroup label="Date">
                                                    <option value="7" @if($attribute->input_type == 7) selected
                                                        @endif>Date</option>
                                                    <option value="8" @if($attribute->input_type == 8) selected
                                                        @endif>Date & Time</option>
                                                    <option value="9" @if($attribute->input_type == 9) selected
                                                        @endif>Time</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3"><label for="">Is Required</label>
                                        <div class="mt-3"><select name="m[{{$attribute->id}}][is_required]"
                                                class="form-control">
                                                <option value="1" @if($attribute->is_required) selected @endif>Yes
                                                </option>
                                                <option value="0" @if(!$attribute->is_required) selected @endif>No
                                                </option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-3"><label for="">Sort Order</label>
                                        <div class="mt-3"><input class="form-control" type="number"
                                                name="m[{{$attribute->id}}][short_order]"
                                                value="{{$attribute->short_order}}"></div>
                                    </div>
                                    <div class="col-md-12"><label for="">Option Description</label>
                                        <div class="mt-3">
                                            <textarea class="form-control"
                                                name="m[{{$attribute->id}}][option_description]" cols="30"
                                                rows="3">{{$attribute->option_description}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Option Section -->
                                <div
                                    class="subrow px-5 py-3 @if($attribute->input_type == '--Please Select--') d-none @endif">
                                    <div class="card" id="sortable-containers">
                                        <div class="row card-header"
                                            style="padding: 0; border-bottom-color: #80808091; min-height: 0px;">
                                            <div class="col-md-1">
                                                <label for="id">Id</label>
                                            </div>
                                            <div class="col-md-2"><label for="">Title<span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-1"><label for="">Price</label>
                                            </div>
                                            <div class="col-md-2"><label for="">Price Type</label>
                                            </div>
                                            <div class="col-md-2"><label for="">SKU</label>
                                            </div>
                                            <div class="col-md-1 text-center"><label for="">Default</label>
                                            </div>
                                            <div class="col-md-2"><label for="">Sort Order</label>
                                            </div>
                                            <div class="col-md-1"><label for=""></label>
                                            </div>
                                        </div>

                                        <div class="align-items-center" id="cards">
                                            @foreach ($option->where('attribute_id', $attribute->id) as $option)
                                            <div class="row clone align-items-center mt-3 draggable">
                                                <div class="col-md-1 text-center">{{$option->id}}</div>
                                                <div class="col-md-2">
                                                    <div class=""><input class="form-control" type="text"
                                                            name="m[{{$attribute->id}}][list][{{$option->id}}][title]"
                                                            value="{{$option->title}}"></div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class=""><input class="form-control" type="number"
                                                            name="m[{{$attribute->id}}][list][{{$option->id}}][price]"
                                                            value="{{$option->price}}"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class=""><select
                                                            name="m[{{$attribute->id}}][list][{{$option->id}}][price_type]"
                                                            class="form-control">
                                                            <option value="1" @if($option->price_type == 1) selected
                                                                @endif>Fixed</option>
                                                            <option value="0" @if($option->price_type == 0) selected
                                                                @endif>Percent</option>
                                                        </select></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class=""><input class="form-control" type="text"
                                                            name="m[{{$attribute->id}}][list][{{$option->id}}][sku]"
                                                            value="{{$option->sku}}"></div>
                                                </div>
                                                <div class="col-md-1 text-center">
                                                    <div class=""><input class="size" type="checkbox"
                                                            name="m[{{$attribute->id}}][list][{{$option->id}}][default_se]"
                                                            value="1" @if($option->default_se) checked @endif></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class=""><input class="form-control" type="number"
                                                            name="m[{{$attribute->id}}][list][{{$option->id}}][short_order]"
                                                            value="{{$option->short_order}}"></div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class=""><button type="button"
                                                            class="btn btn-danger px-3 btn-delete-row"><i
                                                                class="fa-regular fa-circle-xmark"></i></button></div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-right mt-3">
                                        <div class="btn btn-primary addrow" name="[{{$attribute->id}}]">Add New Row
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
        $('#sortable-container').sortable({
            handle: '.draggable'
        });

        $(document).on('change', '.sub-category', function() {
            var $row = $(this).closest('.row');
            var $subrow = $row.find('.subrow');
            var value = $(this).val();
            if (value == 3 || value == 4 || value == 5 || value == 6) {
                $subrow.removeClass('d-none');
            } else {
                $subrow.addClass('d-none');
            }
        });

        $(document).on('click', '.btn-add-attribute', function() {
            var newCard = `
                <div class="card mb-3">  
                    <div class="text-right mt-2 pe-3">
                        <button class="btn btn-danger btn-delete-attribute">Delete</button>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-3"><label for="">Title<span class="text-danger">*</span></label>
                                <div class="mt-3"><input class="form-control" type="text" name="m[${Date.now()}][title]"></div>
                            </div>
                            <div class="col-md-3"><label for="">Input Type<span class="text-danger">*</span></label>
                                <div class="mt-3">
                                    <select class="form-control sub-category" name="m[${Date.now()}][input_type]">
                                        <option>--Please Select--</option>
                                        <optgroup label="Text">
                                            <option value="1">Field</option>
                                            <option value="2">Area</option>
                                        </optgroup>
                                        <optgroup label="Select">
                                            <option value="3">Drop-Down</option>
                                            <option value="4">Radio Button</option>
                                            <option value="5">Checkbox</option>
                                            <option value="6">Multiple Select</option>
                                        </optgroup>
                                        <optgroup label="Date">
                                            <option value="7">Date</option>
                                            <option value="8">Date & Time</option>
                                            <option value="9">Time</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3"><label for="">Is Required</label>
                                <div class="mt-3"><select name="m[${Date.now()}][is_required]" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select></div>
                            </div>
                            <div class="col-md-3"><label for="">Sort Order</label>
                                <div class="mt-3"><input class="form-control" type="number" name="m[${Date.now()}][short_order]"></div>
                            </div>
                            <div class="col-md-12"><label for="">Option Description</label>
                                <div class="mt-3">
                                    <textarea class="form-control" name="m[${Date.now()}][option_description]" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Option Section -->
                        <div class="subrow px-5 py-3 d-none">
                            <div class="card" id="sortable-containers">
                                <div class="row card-header" style="padding: 0; border-bottom-color: #80808091; min-height: 0px;">
                                    <div class="col-md-1">
                                        <label for="id">Id</label>
                                    </div>
                                    <div class="col-md-2"><label for="">Title<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-1"><label for="">Price</label>
                                    </div>
                                    <div class="col-md-2"><label for="">Price Type</label>
                                    </div>
                                    <div class="col-md-2"><label for="">SKU</label>
                                    </div>
                                    <div class="col-md-1 text-center"><label for="">Default</label>
                                    </div>
                                    <div class="col-md-2"><label for="">Sort Order</label>
                                    </div>
                                    <div class="col-md-1"><label for=""></label>
                                    </div>
                                </div>

                                <div class="align-items-center" id="cards">
                                    <div class="row clone align-items-center mt-3 draggable">
                                        <div class="col-md-1 text-center">New</div>
                                        <div class="col-md-2"><div class=""><input class="form-control" type="text" name="m[${Date.now()}][list][${Date.now()}][title]"></div></div>
                                        <div class="col-md-1"><div class=""><input class="form-control" type="number" name="m[${Date.now()}][list][${Date.now()}][price]"></div></div>
                                        <div class="col-md-2"><div class=""><select name="m[${Date.now()}][list][${Date.now()}][price_type]" class="form-control">
                                            <option value="1">Fixed</option>
                                            <option value="0">Percent</option>
                                        </select></div></div>
                                        <div class="col-md-2"><div class=""><input class="form-control" type="text" name="m[${Date.now()}][list][${Date.now()}][sku]"></div></div>
                                        <div class="col-md-1 text-center"><div class=""><input class="size" type="checkbox" name="m[${Date.now()}][list][${Date.now()}][default_se]" value="1"></div></div>
                                        <div class="col-md-2"><div class=""><input class="form-control" type="number" name="m[${Date.now()}][list][${Date.now()}][short_order]"></div></div>
                                        <div class="col-md-1"><div class=""><button type="button" class="btn btn-danger px-3 btn-delete-row"><i class="fa-regular fa-circle-xmark"></i></button></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <div class="btn btn-primary addrow" name="[${Date.now()}]">Add New Row</div>
                            </div>
                        </div>
                    </div>
                </div>`;
            $('#sortable-container').append(newCard);
        });

        $(document).on('click', '.btn-delete-attribute', function() {
            $(this).closest('.card').remove();
        });

        $(document).on('click', '.addrow', function() {
            var name = $(this).attr('name');
            var newRow = `
                <div class="row clone align-items-center mt-3 draggable">
                    <div class="col-md-1 text-center">New</div>
                    <div class="col-md-2"><div class=""><input class="form-control" type="text" name="m${name}[list][${Date.now()}][title]"></div></div>
                    <div class="col-md-1"><div class=""><input class="form-control" type="number" name="m${name}[list][${Date.now()}][price]"></div></div>
                    <div class="col-md-2"><div class=""><select name="m${name}[list][${Date.now()}][price_type]" class="form-control">
                        <option value="1">Fixed</option>
                        <option value="0">Percent</option>
                    </select></div></div>
                    <div class="col-md-2"><div class=""><input class="form-control" type="text" name="m${name}[list][${Date.now()}][sku]"></div></div>
                    <div class="col-md-1 text-center"><div class=""><input class="size" type="checkbox" name="m${name}[list][${Date.now()}][default_se]" value="1"></div></div>
                    <div class="col-md-2"><div class=""><input class="form-control" type="number" name="m${name}[list][${Date.now()}][short_order]"></div></div>
                    <div class="col-md-1"><div class=""><button type="button" class="btn btn-danger px-3 btn-delete-row"><i class="fa-regular fa-circle-xmark"></i></button></div></div>
                </div>`;
            $(this).closest('.subrow').find('#cards').append(newRow);
        });

        $(document).on('click', '.btn-delete-row', function() {
            $(this).closest('.row').remove();
        });
    });
</script>

@endsection --}}