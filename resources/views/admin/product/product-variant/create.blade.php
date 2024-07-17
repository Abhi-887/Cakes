@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Product Variant</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Variant</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products-variant.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="product"
                                        value="{{ request()->product }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <!-- Attribute Type Dropdown -->
                                <div class="form-group">
                                    <label for="attributeType">Attribute Type</label>
                                    <select id="attributeType" class="form-control" name="attribute_type"
                                        onchange="togglePriceField()">
                                        <optgroup label="Text">
                                            <option value="field">Field</option>
                                            <option value="area">Area</option>
                                        </optgroup>
                                        <optgroup label="Select">
                                            <option value="dropdown">Drop-Down</option>
                                            <option value="radio">Radio Button</option>
                                            <option value="checkbox">Checkbox</option>

                                        </optgroup>
                                        <optgroup label="Date">
                                            <option value="date">Date</option>
                                            <option value="datetime">Date & Time</option>
                                            <option value="time">Time</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputState">Is Required</label>
                                    <select id="inputState" class="form-control" name="isrequired">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Short Order</label>
                                    <input type="number" class="form-control" name="shotorder" value="">
                                </div>

                                <!-- Price Field -->
                                <div class="form-group" id="priceField" style="display: none;">
                                    <label>Price</label>
                                    <input type="number" class="form-control" name="price" value="">
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
        function togglePriceField() {
            var attributeType = document.getElementById('attributeType').value;
            var priceField = document.getElementById('priceField');

            if (attributeType === 'area') {
                priceField.style.display = 'block';
            } else {
                priceField.style.display = 'none';
            }
        }
    </script>
@endsection
