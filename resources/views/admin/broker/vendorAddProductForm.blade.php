@extends('admin.layouts.app')
@section('title', 'Add Product')
@section('section')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
    <link rel="stylesheet" href="{{ asset('admin/dropzone/dist/basic.css') }}">
    <style>
        .switch {
            position: relative;
            display: block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .help-block{
            color:red;
        }
        .has-error{
            border-block-color: red;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <form class="category-form" method="post" action="{{route('add_product_from_broker')}}" enctype="multipart/form-data">
                            <div class="tab-content ">
                                <div class="tab-pane active" role="tabpanel" class="tab-pane fade in active" id="product">

                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="exampleInputEmail1">Main Category*</label>
                                                    <select class="form-control {{ $errors->has('main_category') ? 'has-error' : ''}}" name="main_category" id="main-category" required>
                                                        <option value="">Select Category</option>
                                                            @foreach ($categories as $category )
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                    </select>
                                                    {!! $errors->first('main_category', '<p class="help-block">:message</p>') !!}
                                                </div>
{{--
                                                <div class="col">
                                                    <label for="exampleInputEmail1">Product Featured/New</label>
                                                    <select name="product_featured" id="" class="form-control">
                                                        <option value="Feature" @if(old('product_featured') == "Feature") {{ 'selected' }} @endif>Featured</option>
                                                        <option value="New"  @if(old('product_featured') == "New") {{ 'selected' }} @endif>New</option>
                                                    </select>
                                                </div> --}}
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="exampleInputEmail1">Product Name*</label>
                                                    <input type="text" name="product_name" placeholder="Product Name" class="form-control {{ $errors->has('product_name') ? 'has-error' : ''}}" value="{{old('product_name')}}" >
                                                    {!! $errors->first('product_name', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="exampleInputEmail1">Current Price*</label>
                                                    <input type="number" name="current_price" placeholder="Current Price" class="form-control {{ $errors->has('current_price') ? 'has-error' : ''}}" value="{{old('current_price')}}"  required>
                                                    {!! $errors->first('current_price', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                {{-- <div class="col">
                                                    <label for="exampleInputEmail1">Product SKU*</label>
                                                    <input type="text" name="product_sku" placeholder="Product SKU" class="form-control {{ $errors->has('product_sku') ? 'has-error' : ''}}" id="product_sku" value="{{old('product_sku')}}"  required>
                                                    <span id="sku_span"></span>
                                                    {!! $errors->first('product_sku', '<p class="help-block">:message</p>') !!}
                                                </div> --}}
                                                <div class="col">
                                                    <label for="exampleInputEmail1">Product Slug*</label>
                                                    <input type="text" name="product_slug" class="form-control {{ $errors->has('product_slug') ? 'has-error' : ''}}" placeholder="Product Slug" id="product_slug" value="{{old('product_slug')}}"  required>
                                                    <span id="slug_span"></span>
                                                    {!! $errors->first('product_slug', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="exampleInputEmail1">Product Sale</label>
                                                    <input type="checkbox" name="product_sale" class="form-control" id="product_sale" style="height: 20px;width: 20px;" value="yes" @if(old('product_sale') == 'yes') {{ 'checked' }} @endif>
                                                </div>
                                                <div class="col">
                                                    <label for="exampleInputEmail1">Sale(%)</label>
                                                    <input type="number" name="product_sale_percentage" placeholder="10" class="form-control" readonly id="product_sale_percentage" value="{{old('product_sale_percentage')}}" required>
                                                </div>
                                                <div class="col">
                                                    <label for="exampleInputEmail1">Product Stock</label>
                                                    <input type="checkbox" name="product_stock" class="form-control" id="product_stock" style="height: 20px;width: 20px;" value="yes" @if(old('product_stock') == 'yes') {{ 'checked' }} @endif>
                                                </div>
                                                <div class="col">
                                                    <label for="exampleInputEmail1">Product Stock Qty</label>
                                                    <input type="number" name="product_stock_qty" class="form-control" placeholder="10" readonly id="product_stock_qty" value="{{old('product_stock_qty')}}" required>
                                                </div>
                                                <div class="col">
                                                    <label for="switch">Status</label>
                                                    <label class="switch"><input type="checkbox" @if(old('status') == '1') {{ 'checked' }} @endif data-id="" id="status-switch" name="status" value="1">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="exampleInputEmail1">Weight</label>
                                                    <input type="number" name="weight" placeholder="weight" class="form-control" id="weight"  value="{{old('weight')}}">
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="category">Description</label>
                                                    <textarea class="form-control {{ $errors->has('main_category') ? 'has-error' : ''}}" name="description" id="description" placeholder="Description" required>{{old('description')}}</textarea>
                                                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="category">Meta Title</label>
                                                    <input type="text" class="form-control {{ $errors->has('meta-title') ? 'has-error' : ''}}" name="meta-title" id="meta-title"  value="{{old('meta-title')}}" placeholder="Meta Title" required >
                                                    {!! $errors->first('meta-title', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col">
                                                    <label for="category">Meta Description</label>
                                                    <textarea class="form-control {{ $errors->has('meta-description') ? 'has-error' : ''}}" name="meta-description" id="meta-description" placeholder="Meta Description" required>{{old('meta-description')}}</textarea>
                                                    {!! $errors->first('meta-description', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col">
                                                    <label for="category">Meta Keywords</label>
                                                    <textarea class="form-control {{ $errors->has('meta-keywords') ? 'has-error' : ''}}" name="meta-keywords" id="meta-keywords"  placeholder="Meta Keywords" required>{{old('meta-keywords')}}</textarea>
                                                    {!! $errors->first('meta-keywords', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <table class="table">
                                                    <tr>
                                                        <th>Product Image</th>
                                                        <th>Select Image</th>
                                                    </tr>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <img src="{{asset('admin/images/placeholder.png')}}" alt="" id="img_0" style="height: 150px;width: 150px;">
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"  name="product_image_first" id="gallery_0" onchange="PreviewImage('0')" accept="image/*" required>
                                                                        <label class="custom-file-label" for="category-image">Choose file</label>
                                                                    </div>
                                                                    {!! $errors->first('product_image_first', '<p class="help-block">:message</p>') !!}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
{{--                                            <div class="row justify-content-center" >--}}
{{--                                                <h4>Additional Images</h4>--}}
{{--                                            </div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-4" >--}}
{{--                                                    <img src="{{asset('admin/images/placeholder.png')}}" alt="" id="img_1" style="height: 150px;width: 150px;">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-8">--}}
{{--                                                    <label for="exampleInputFile"></label>--}}
{{--                                                    <div class="input-group">--}}
{{--                                                        <div class="custom-file">--}}
{{--                                                            <input type="file" class="custom-file-input" name="product_image[]" id="gallery_1" onchange="PreviewImage('1')" accept="image/*">--}}
{{--                                                            <label class="custom-file-label" for="category-image">Choose file</label>--}}
{{--                                                        </div>--}}
{{--                                                        <input type="button" class="btn btn-primary" id="addMoreBtn" value="+" onclick="addMorePictures(1)"/>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <br>--}}
{{--                                            <div id=""></div>--}}
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="gallery"></div>
                                        </div>

                                        <!-- /.card-body -->
                                </div>
                                <div class="tab-pane" role="tabpanel" class="tab-pane fade in active" id="additionalImages">
                                    <div class="col-md-12 text-right">
                                    </div>
                                    {{-- <table class="table">
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Select Image</th>
                                        </tr>
                                        <tbody id="add_more">
                                        <tr >
                                            <td class="col-md-2">
                                                <img src="{{asset('admin/images/placeholder.png')}}" alt="" id="img_1" style="height: 150px;width: 150px;">
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="product_image[]" id="gallery_1" onchange="PreviewImage('1')" accept="image/*">
                                                        <label class="custom-file-label" for="category-image">Choose file</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-md-1">
                                                <input type="button" class="btn btn-md btn-primary" id="addMoreBtn" value="+" onclick="addMorePictures(1)"/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table> --}}
                                </div>
                                <div class="tab-pane" role="tabpanel" class="tab-pane fade in active" id="attributes">
                                    <div class="col-md-12 text-right">
                                        <input type="button" class="btn btn-primary btn-sm" value="Add Attribute" onclick="addMoreAttributes()" style="margin-top: 10px;margin-bottom: 10px;">
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Attribute</th>
                                                <th>Value</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="add_more_attr">
                                            <tr>
{{--                                                <td>--}}
{{--                                                    <select id="dino-select" class="form-control" name="attribute[]" required>--}}
{{--                                                        <option value="">Select Attribute</option>--}}
{{--                                                        @foreach($attributeGroups as $attributeGroup)--}}
{{--                                                            <optgroup label="{{$attributeGroup->attribute_group}}">--}}
{{--                                                                @foreach($attributeGroup->attributes as $attributes)--}}
{{--                                                                    <option value="{{$attributes->id}}">{{$attributes->attribute_name}}</option>--}}
{{--                                                                @endforeach--}}
{{--                                                            </optgroup>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </td>--}}
{{--                                                <td><input type="text" class="form-control" value="" name="attribute_value[]" required></td>--}}
{{--                                                <td></td>--}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" role="tabpanel" class="tab-pane fade in active" id="options">
                                    <div class="col-md-12 text-right">
                                        <input type="button" class="btn btn-primary btn-sm" value="Add Options" onclick="addMoreOptions()" style="margin-top: 10px;margin-bottom: 10px;">
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Option</th>
                                            <th>Option Value</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="add_more_option">
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <select id="option_id" class="form-control" name="option_id[]" onchange="getOptionValues(1,this.value)">--}}
{{--                                                        <option value="">Select Option</option>--}}
{{--                                                        @foreach($options as $option)--}}
{{--                                                            <option value="{{$option->id}}">{{$option->option_name}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <select id="option_value_id_1" class="form-control" name="option_value_id[]"></select>--}}
{{--                                                </td>--}}
{{--                                                <td><input type="number" class="form-control" value="" name="option_value_price[]"></td>--}}
{{--                                                <td><input type="number" class="form-control" value="" name="option_value_qty[]"></td>--}}
{{--                                                <td></td>--}}
{{--                                            </tr>--}}
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="tab-pane" role="tabpanel" class="tab-pane fade in active" id="related_products">
                                    <div class="col-md-12 text-right">
                                        <input type="button" class="btn btn-primary btn-sm" value="Add Related Product" onclick="addMoreRelatedProducts()" style="margin-top: 10px;margin-bottom: 10px;">
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                                                                       {{-- <th>Product ID</th> --}}
                                            {{-- <th>Product Name</th> --}}
                                                                                       {{-- <th>Price</th> --}}
                                                                                       {{-- <th>Qty</th> --}}
                                            {{-- <th>Action</th> --}}
                                        {{-- </tr> --}}
                                        {{-- </thead> --}}
                                        {{-- <tbody id="add_more_related"> --}}
                                        {{-- </tbody> --}}
                                    {{-- </table> --}}
                                {{-- </div> --}}
                            </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary" id="submit_btn" style="">Submit</button>
                                    <a href="{{route('product.index')}}" class="btn btn-warning" id="" style="">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        </section>
        </div>
    </div>
@endsection

@section('script')

    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/dropzone/dist/dropzone.js') }}"></script>
    <script type="text/javascript">
  $('#product_sale').on('click',function (e){
                if($('#product_sale').prop('checked') == true){
                    $('#product_sale_percentage').prop('readonly', false);
                }else{
                    $('#product_sale_percentage').prop('readonly', true);
                }
            });
        $('#product_stock').on('click',function (e){
            if($('#product_stock').prop('checked') == true){
                $('#product_stock_qty').prop('readonly', false);
            }else{
                $('#product_stock_qty').prop('readonly', true);
            }
        });
    //Check Product SKU
    $('#product_sku').on('blur',function(e) {
                var sku = e.target.value;
                $.ajax({
                    url:"{{ route('checkProductSkuVendor') }}",
                    type:"Get",
                    data: {
                        sku: sku
                    },
                    success:function (data) {
                        if(data.product_sku > 0){
                            $('#sku_span').html(`<p style="color:red">SKU Already exist!</p>`);
                            $(':input[type="submit"]').prop('disabled', true);
                        }else{
                            $('#sku_span').empty();
                            $(':input[type="submit"]').prop('disabled', false);
                        }

                    }
                })
            });
            function PreviewImage(counter) {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById('gallery_'+counter).files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById('img_'+counter).src = oFREvent.target.result;
            };
        }
        document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("gallery_0").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
</script>
@endsection
