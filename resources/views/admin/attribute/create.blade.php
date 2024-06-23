@extends('admin.layouts.master')

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

    /* .s {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .s .card {
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        margin: 5px;
        padding: 10px;
        cursor: move;
    } */

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
        <h1>Attributes of {{$product->name}}</h1>
    </div>
    <!-- Add this hidden template for cloning new attributes -->
    <div class="card mb-3 d-none" id="Attribute-0">
        <input type="hidden" name="m[0][id]">
        <div class="text-right mt-2 pe-3">
            <button class="btn btn-danger btn-delete-attribute">Delete</button>
        </div>
        <div class="card-body p-3">
            <div class="row">
                <div class="col-md-3"><label for="">Title<span class="text-danger">*</span></label>
                    <div class="mt-3"><input class="form-control mpass" type="text" name="m[0][title]"></div>
                </div>
                <div class="col-md-3"><label for="">Input Type<span class="text-danger">*</span></label>
                    <div class="mt-3">
                        <select class="form-control sub-category mpass" name="m[0][input_type]">
                            <option value="0">--Please Select--</option>
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
                    <div class="mt-3"><select name="m[0][is_required]" class="mpass form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select></div>
                </div>
                <div class="col-md-3"><label for="">Sort Order</label>
                    <div class="mt-3"><input class="form-control mpass" type="number" name="m[0][short_order]"></div>
                </div>
                <div class="col-md-12"><label for="">Option Description</label>
                    <div class="mt-3">
                        <textarea class="form-control mpass" name="m[0][option_description]" cols="30"
                            rows="3"></textarea>
                    </div>
                </div>
            </div>
            <!-- Option rows -->
            <div class="subrow px-5 py-3 d-none" id="s-containers-0">
                <div class="row card-header" style="padding: 0; border-bottom-color: #80808091; min-height: 0px;">
                    <div class="col-md-1">
                        <label for="id">Id</label>
                    </div>
                    <div class="col-md-2"><label for="">Title<span class="text-danger">*</span></label></div>
                    <div class="col-md-1"><label for="">Price</label></div>
                    <div class="col-md-2"><label for="">Price Type</label></div>
                    <div class="col-md-2"><label for="">SKU</label></div>
                    <div class="col-md-1 text-center"><label for="">Default</label></div>
                    <div class="col-md-2"><label for="">Sort Order</label></div>
                    <div class="col-md-1"><label for=""></label></div>
                </div>
                <div class="align-items-center" id="cards-0"></div>
            </div>
            <div class="text-right mt-3">
                <div class="btn btn-primary addrow mpass" name="[0]">Add New Row</div>
            </div>
        </div>
    </div>

    <div class=" ">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 text-right">
                    <button class="btn btn-primary btn-add-attribute">Add Attribute</button>
                </div>
                <form method="POST" action="{{route('admin.attributes.storeOrUpdate')}}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $id }}">
                    <div class="s" id="s-container">
                        @foreach($attributes as $index => $attribute)
                        <div class="card mb-3" id="Attribute-{{$attribute->id}}">
                            <input type="hidden" name="m[{{$index}}][id]" value="{{$attribute->id}}">
                            <div class="text-right mt-2 pe-3">
                                <button class="btn btn-danger btn-delete-attribute">Delete</button>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Title<span class="text-danger">*</span></label>
                                        <div class="mt-3"><input class="form-control mpass" type="text"
                                                name="m[{{$index}}][title]" value="{{$attribute->title}}"></div>
                                    </div>
                                    <div class="col-md-3"><label for="">Input Type<span
                                                class="text-danger">*</span></label>
                                        <div class="mt-3">
                                            <select class="form-control sub-category mpass"
                                                name="m[{{$index}}][input_type]">
                                                <option value="0" {{$attribute->input_type == 0 ? 'selected' :
                                                    ''}}>--Please Select--</option>
                                                <optgroup label="Text">
                                                    <option value="1" {{$attribute->input_type == 1 ? 'selected' :
                                                        ''}}>Field</option>
                                                    <option value="2" {{$attribute->input_type == 2 ? 'selected' :
                                                        ''}}>Area</option>
                                                </optgroup>
                                                <optgroup label="Select">
                                                    <option value="3" {{$attribute->input_type == 3 ? 'selected' :
                                                        ''}}>Drop-Down</option>
                                                    <option value="4" {{$attribute->input_type == 4 ? 'selected' :
                                                        ''}}>Radio Button</option>
                                                    <option value="5" {{$attribute->input_type == 5 ? 'selected' :
                                                        ''}}>Checkbox</option>
                                                    <option value="6" {{$attribute->input_type == 6 ? 'selected' :
                                                        ''}}>Multiple Select</option>
                                                </optgroup>
                                                <optgroup label="Date">
                                                    <option value="7" {{$attribute->input_type == 7 ? 'selected' :
                                                        ''}}>Date</option>
                                                    <option value="8" {{$attribute->input_type == 8 ? 'selected' :
                                                        ''}}>Date & Time</option>
                                                    <option value="9" {{$attribute->input_type == 9 ? 'selected' :
                                                        ''}}>Time</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3"><label for="">Is Required</label>
                                        <div class="mt-3"><select name="m[{{$index}}][is_required]"
                                                class="mpass form-control">
                                                <option value="1" {{$attribute->is_required == 1 ? 'selected' : ''}}>Yes
                                                </option>
                                                <option value="0" {{$attribute->is_required == 0 ? 'selected' : ''}}>No
                                                </option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-3"><label for="">Sort Order</label>
                                        <div class="mt-3"><input class="form-control mpass" type="number"
                                                name="m[{{$index}}][short_order]" value="{{$attribute->short_order}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12"><label for="">Option Description</label>
                                        <div class="mt-3">
                                            <textarea class="form-control mpass"
                                                name="m[{{$index}}][option_description]" cols="30"
                                                rows="3">{{$attribute->option_description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Option rows -->
                                <div class="subrow px-5 py-3">
                                    <div class="card" id="-containers-{{$index}}">
                                        <div class="row card-header"
                                            style="padding: 0; border-bottom-color: #80808091; min-height: 0px;">
                                            <div class="col-md-1">
                                                <label for="id">Id</label>
                                            </div>
                                            <div class="col-md-2"><label for="">Title<span
                                                        class="text-danger">*</span></label></div>
                                            <div class="col-md-1"><label for="">Price</label></div>
                                            <div class="col-md-2"><label for="">Price Type</label></div>
                                            <div class="col-md-2"><label for="">SKU</label></div>
                                            <div class="col-md-1 text-center"><label for="">Default</label></div>
                                            <div class="col-md-2"><label for="">Sort Order</label></div>
                                            <div class="col-md-1"><label for=""></label></div>
                                        </div>
                                        <div class="align-items-center" id="cards-{{$index}}">
                                            @foreach($options->where('attribute_id', $attribute->id) as $optionIndex =>
                                            $option)
                                            <div class="row clone align-items-center mt-3 draggable">
                                                <input type="hidden" name="m[{{$index}}][list][{{$optionIndex}}][id]"
                                                    value="{{$option->id}}">
                                                <div class="col-md-1 text-center">{{$option->id}}</div>
                                                <div class="col-md-2"><input class="form-control" type="text"
                                                        name="m[{{$index}}][list][{{$optionIndex}}][title]"
                                                        value="{{$option->title}}"></div>
                                                <div class="col-md-1"><input class="form-control" type="number"
                                                        name="m[{{$index}}][list][{{$optionIndex}}][price]"
                                                        value="{{$option->price}}"></div>
                                                <div class="col-md-2"><select
                                                        name="m[{{$index}}][list][{{$optionIndex}}][price_type]"
                                                        class="form-control">
                                                        <option value="1" {{$option->price_type == 1 ? 'selected' :
                                                            ''}}>Fixed</option>
                                                        <option value="0" {{$option->price_type == 0 ? 'selected' :
                                                            ''}}>Percent</option>
                                                    </select></div>
                                                <div class="col-md-2"><input class="form-control" type="text"
                                                        name="m[{{$index}}][list][{{$optionIndex}}][sku]"
                                                        value="{{$option->sku}}"></div>
                                                <div class="col-md-1 text-center"><input class="size" type="checkbox"
                                                        name="m[{{$index}}][list][{{$optionIndex}}][default_se]"
                                                        value="1" {{$option->default_se ? 'checked' : ''}}></div>
                                                <div class="col-md-2"><input class="form-control" type="number"
                                                        name="m[{{$index}}][list][{{$optionIndex}}][short_order]"
                                                        value="{{$option->short_order}}"></div>
                                                <div class="col-md-1"><button type="button"
                                                        class="btn btn-danger px-3 btn-delete-row"><i
                                                            class="fa-regular fa-circle-xmark"></i></button></div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-right mt-3">
                                        <div class="btn btn-primary addrow mpass" name="[{{$index}}]">Add New Row</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="ml-2"><button type="submit" class="btn btn-primary px-4 py-2 btn-save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var mwid = {{$index}};
    $(document).ready(function () {
        $(document).on('click', '.btn-delete-attribute', function () {
            $(this).closest('.card').remove();
        });

        $(document).on('click', '.btn-add-attribute', function () {
            mwid++;
            var clonedContent = $('#Attribute').clone();
            clonedContent.removeClass('delete').removeClass('d-none');
            clonedContent.find('.btn-delete-attribute').removeClass('d-none');
            clonedContent.find('.subrow').addClass('d-none');
            clonedContent.find('.card-body .mpass').each(function(){
                var n = $(this).attr('name');
                n = n.replace('[mid]',"["+mwid+"]");
                $(this).attr('name',n);
            });
            // $('#s-container').append(clonedContent);
            // $('#s-container').s('refresh');
        });

        $(document).on('change', '.sub-category', function () {
            var subrow = $(this).closest('.card').find('.subrow');
            if ($(this).val() !== '--Please Select--') {
                subrow.removeClass('d-none');
            } else {
                subrow.addClass('d-none');
            }
        });

        $(document).on('click', '.btn-delete-row', function () {
            $(this).closest('.row').remove();
            updateCountingNumbers($(this).closest('.card'));
        });

        function updateCountingNumbers(container) {
            container.find('.clickDiv').each(function (index) {
                $(this).text(index + 1);
            });
        }

        var rid = 0;
        $(document).on('click', '.addrow', function () {
            rid++;
            var mgid = $(this).attr('name');
            var newRow = '<div class="row clone align-items-center mt-3">' +
                '<div class="col-md-1 clickDiv text-center"></div>' +
                '<div class="col-md-2"><input class="form-control" type="text" name="m'+mgid+'[list]['+rid+'][title]"></div>' +
                '<div class="col-md-1"><input class="form-control" type="number" name="m'+mgid+'[list]['+rid+'][price]"></div>' +
                '<div class="col-md-2"><select name="m'+mgid+'[list]['+rid+'][price_type]" class="form-control"><option value="1">Fixed</option><option value="0">Percent</option></select></div>' +
                '<div class="col-md-2"><input class="form-control" type="text" name="m'+mgid+'[list]['+rid+'][sku]"></div>' +
                '<div class="col-md-1 text-center"><input class="size" type="checkbox" name="m'+mgid+'[list]['+rid+'][default_se]" value="1"></div>' +
                '<div class="col-md-2"><input class="form-control" type="number" name="m'+mgid+'[list]['+rid+'][short_order]"></div>' +
                '<div class="col-md-1"><button type="button" class="btn btn-danger px-3 btn-delete-row"><i class="fa-regular fa-circle-xmark"></i></button></div>' +
                '</div>';
            $(this).closest('.card-body').find('#cards'+mgid).append(newRow);
            updateCountingNumbers($(this).closest('.card'));
        });

        // $(function () {
        //     $("#s-container").s();
        //     $("#s-container").disableSelection();
        // });
        
        $('.mpass[type="number"]').on('input', function () {
            var value = $(this).val();
            if (!$.isNumeric(value)) {
                $(this).val(value.replace(/\D/g, ''));
            }
        });
    });
</script>


@endsection