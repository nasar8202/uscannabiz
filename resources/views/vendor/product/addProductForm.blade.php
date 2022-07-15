@extends('front.layout.app')
@section('title', 'Add Product Form')
@section('content')
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
<style id="et-builder-module-design-179-cached-inline-styles">.et-db #et-boc .et-l .et_pb_section_0_tb_footer.et_pb_section{padding-bottom:20px;background-color:#0D4400!important}.et-db #et-boc .et-l .et_pb_row_0_tb_footer.et_pb_row{padding-top:0px!important;padding-bottom:0px!important;padding-top:0px;padding-bottom:0px}.et-db #et-boc .et-l .et_pb_image_0_tb_footer{margin-bottom:20px!important;text-align:left;margin-left:0}.et-db #et-boc .et-l .et_pb_text_0_tb_footer.et_pb_text,.et-db #et-boc .et-l .et_pb_text_5_tb_footer.et_pb_text,.et-db #et-boc .et-l .et_pb_text_7_tb_footer.et_pb_text{color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_0_tb_footer{font-size:18px;margin-bottom:30px!important}.et-db #et-boc .et-l .et_pb_text_1_tb_footer h5{font-family:'Montserrat',Helvetica,Arial,Lucida,sans-serif;font-weight:600;font-size:25px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_1_tb_footer{margin-bottom:15px!important}.et-db #et-boc .et-l .et_pb_social_media_follow_0_tb_footer li a.icon:before{font-size:20px;line-height:40px;height:40px;width:40px}.et-db #et-boc .et-l .et_pb_social_media_follow_0_tb_footer li a.icon{height:40px;width:40px}.et-db #et-boc .et-l .et_pb_text_4_tb_footer h4,.et-db #et-boc .et-l .et_pb_text_2_tb_footer h4,.et-db #et-boc .et-l .et_pb_text_3_tb_footer h4{font-weight:600;font-size:25px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_3_tb_footer,.et-db #et-boc .et-l .et_pb_text_2_tb_footer,.et-db #et-boc .et-l .et_pb_text_4_tb_footer{margin-bottom:20px!important}.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area li,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area li:before,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area a,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area li,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area li:before,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area a{font-size:18px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_text_5_tb_footer{line-height:1.4em;font-size:18px;line-height:1.4em;margin-bottom:30px!important}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:0px!important;padding-top:0px}.et-db #et-boc .et-l .et_pb_text_7_tb_footer{font-size:18px}@media only screen and (max-width:980px){.et-db #et-boc .et-l .et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}@media only screen and (max-width:767px){.et-db #et-boc .et-l .et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}</style>
<div class="archive tax-product_cat theme-Divi et-tb-has-template et-tb-has-footer woocommerce woocommerce-page woocommerce-js et_button_no_icon et_pb_button_helper_class et_fixed_nav et_show_nav et_secondary_nav_enabled et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_left et_cover_background et_pb_gutter windows et_pb_gutters3 et_left_sidebar et_divi_theme et-db dokan-theme-Divi customize-support chrome">
<div class="page-template-default page theme-Divi et-tb-has-template et-tb-has-footer woocommerce-js et_button_no_icon et_pb_button_helper_class et_fixed_nav et_show_nav et_secondary_nav_enabled et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_left et_cover_background et_pb_gutter windows et_pb_gutters3 et_right_sidebar et_divi_theme et-db et_full_width_page et_no_sidebar dokan-dashboard dokan-theme-Divi customize-support chrome">
	<div id="main-content">
	   <div class="container">
	      <div id="content-area" class="clearfix">
	         <div id="left-area">
	            <article id="post-7" class="post-7 page type-page status-publish hentry">
	               <h1 class="entry-title main_title">Dashboard</h1>
				   @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
										@endif
	               <div class="entry-content">
	                  <div class="dokan-dashboard-wrap">
	                     <div class="dokan-dash-sidebar">
	                        <div id="dokan-navigation" aria-label="Menu">
	                           <label id="mobile-menu-icon" for="toggle-mobile-menu" aria-label="Menu">☰</label><input id="toggle-mobile-menu" type="checkbox">
	                           <ul class="dokan-dashboard-menu">
	                              <li class="active dashboard"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
	                              <li class="products"><a href="{{route('product')}}"><i class="fas fa-briefcase"></i> Products</a></li>
	                              <li class="orders"><a href="{{route('vendor_order')}}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
	                              <li class="withdraw"><a href="withdraw/"><i class="fas fa-upload"></i> Withdraw</a></li>
	                              <li class="settings"><a href="settings/store/"><i class="fas fa-cog"></i> Settings <i class="fas fa-angle-right pull-right"></i></a></li>
	                              <li class="dokan-common-links dokan-clearfix">
	                                 <a title="" class="tips" data-placement="top" href="Us-Cannazon/user_uscannabiz/" target="_blank" data-original-title="Visit Store"><i class="fas fa-external-link-alt"></i></a>
	                                 <a title="" class="tips" data-placement="top" href="edit-account/" data-original-title="Edit Account"><i class="fas fa-user"></i></a>
	                                 <a title="" class="tips" data-placement="top" href="wp-login.php?action=logout&amp;redirect_to=https%3A%2F%2Fwebprojectmockup.com%2Fwp%2Fuscannabiz&amp;_wpnonce=776bce81ba" data-original-title="Log out"><i class="fas fa-power-off"></i></a>
	                              </li>
	                           </ul>
	                        </div>
	                     </div>
	                     <div class="dokan-dashboard-content dokan-product-listing">
                         <div id="content-area" class="clearfix">
        <div id="left-area">
         <div class="u-column2 col-2">
            <h2>Add Product</h2>
            @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                        @endif
            <form method="post" action="{{ route('add_product') }}" class="woocommerce-form woocommerce-form-register register" enctype="multipart/form-data">
             {{ csrf_field() }}


                <p class="form-row form-group">
                  <label for="exampleInputEmail1">Main Category</label>
                  <select class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('main_category') ? 'has-error' : ''}}" name="main_category" id="main-category" required>
                      <option value="" disabled selected>Select Category</option>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                  </select>
                </p>

             <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_email">Product Name<span class="required">*</span></label>
                  <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                  name="product_name" id="reg_email" autocomplete="email" value="">
               </p>

               <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_password">Current Price<span class="required">*</span></label>
                  <input type="number" class="woocommerce-Input woocommerce-Input--text input-text" name="current_price" id="reg_password" autocomplete="new-password">
               </p>

                  <div class="split-row form-row-wide">
                     <p class="form-row form-group">
                        <label for="first-name">Product Sku <span class="required">*</span></label>
                        <input type="text" class="input-text form-control {{ $errors->has('product_sku') ? 'has-error' : ''}}" name="product_sku" id="product_sku" value="{{old('product_sku')}}" required="required">
                        <span id="sku_span"></span>
                        {!! $errors->first('product_sku', '<p class="help-block">:message</p>') !!}
                     </p>
                     <p class="form-row form-group">
                        <label for="last-name">Product Slug <span class="required">*</span></label>
                        <input type="text" class="input-text form-control" name="product_slug" id="last-name" value="" required="required">
                     </p>
                     <p class="form-row form-group form-row-wide">
                        <label for="exampleInputEmail1">Product Sale</label>
                        <input type="checkbox" name="product_sale" class="form-control" id="product_sale" style="height: 20px;width: 20px;" value="yes" @if(old('product_sale') == 'yes') {{ 'checked' }} @endif >

                     </p>
                     <p class="form-row form-group">
                        <label for="exampleInputEmail1">Sale(%)</label>
                        <input type="text" class="input-text form-control" readonly name="product_sale_percentage" id="product_sale_percentage" value="{{old('product_sale_percentage')}}" required="required">

                        </p>
                  </div>

                  <p class="form-row form-group form-row-wide">
                     <label for="exampleInputEmail1">Product Stock</label>

{{--
                     <input type="checkbox" name="product_stock" class="form-control" id="product_stock" style="height: 20px;width: 20px;" value="yes" > --}}
                     <input type="checkbox" name="product_stock" class="form-control" id="product_stock" style="height: 20px;width: 20px;" value="yes" @if(old('product_stock') == 'yes') {{ 'checked' }} @endif>
                  </p>

                  <p class="form-row form-group form-row-wide">
                     <label for="exampleInputEmail1">Product Stock Qty</label>
                     <input type="text" class="input-text form-control" name="product_stock_qty" id="product_stock_qty" readonly id="product_stock_qty" value="{{old('product_stock_qty')}}" required="required">


                  </p>

                  <p class="form-row form-group form-row-wide">
                     <label for="switch">Status</label>
                     <label class="switch"><input type="checkbox"  data-id="" id="status-switch" name="status" value="1">
                     <span class="slider round"></span>
                  </label>

                  </p>
                  <p class="form-row form-group form-row-wide">
                     <label for="category">Description</label>
                  <textarea class="form-control {{ $errors->has('main_category') ? 'has-error' : ''}}" name="description" id="description" placeholder="Description" required>{{old('description')}}</textarea>
                  {!! $errors->first('description', '<p class="help-block">:message</p>') !!}

                  </p>
                  {{-- <p class="form-row form-group form-row-wide">
                     <label for="category">Meta Title</label>
                     <input type="text" class="form-control {{ $errors->has('meta-title') ? 'has-error' : ''}}" name="meta-title" id="meta-title"  value="{{old('meta-title')}}" placeholder="Meta Title" required >
                     {!! $errors->first('meta-title', '<p class="help-block">:message</p>') !!}

                  </p> --}}

                  <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_email">Meta Title</label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('meta-title') ? 'has-error' : ''}}"
                    name="meta-title" id="meta-title" value="{{old('meta-title')}}" placeholder="Meta Title">
                    {!! $errors->first('meta-title', '<p class="help-block">:message</p>') !!}
                 </p>
                  <p class="form-row form-group form-row-wide">
                     <label for="category">Meta Description</label>
                   <textarea class="form-control {{ $errors->has('meta-description') ? 'has-error' : ''}}" name="meta-description" id="meta-description" placeholder="Meta Description" required>{{old('meta-description')}}</textarea>
                     {!! $errors->first('meta-description', '<p class="help-block">:message</p>') !!}

                  </p>
                  <p class="form-row form-group form-row-wide">
                     <label for="category">Meta Keywords</label>
                     <textarea class="form-control {{ $errors->has('meta-keywords') ? 'has-error' : ''}}" name="meta-keywords" id="meta-keywords"  placeholder="Meta Keywords" required>{{old('meta-keywords')}}</textarea>
                    {!! $errors->first('meta-keywords', '<p class="help-block">:message</p>') !!}

                  </p>
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
                                             <input type="file" class="custom-file-input"  name="product_image_first" id="gallery_0" accept="image/*" >
                                             <label class="custom-file-label" for="category-image">Choose file</label>
                                         </div>
                                         {!! $errors->first('product_image_first', '<p class="help-block">:message</p>') !!}
                                     </div>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
<hr>
                 <div class="row" id="related_products">
                    <div class="col">
                        <div class="col-md-6 text-right">
                            <button type="button" class="woocommerce-Button woocommerce-button button woocommerce" value="Add Related Product" onclick="addMoreRelatedProducts()" style="margin-top: 10px;margin-bottom: 10px;">Add Related Product</button>
                        </div>
                    </div>
                </div>
                <p class="form-row form-group form-row-wide">
                    <table class="table border-danger" style="width: 80%;">
                        <tr>
                            <th >Product Name</th>
                            <th >Action</th>
                        </tr>
                        <tbody id="add_more_related">
                        </tbody>
                    </table>

                </p>
               <p class="woocommerce-form-row form-row">
                  <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">Add Product</button>

               </p>
            </form>
         </div>

           </div>

        </div>

						 </div>
	                     <!-- .dokan-dashboard-content -->
	                  </div>
	                  <!-- .dokan-dashboard-wrap -->
	               </div>
	            </article>
	         </div>
	         <div id="sidebar">
	         </div>
	      </div>
	   </div>
	</div>
</div>
</div>

<script>

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
         /* Related product functions start */
         var counter2 = 1;
        function addMoreRelatedProducts(){

            $("#add_more_related").append(`<tr id="row_related_${counter2}" class="row_related_prod"><td>
                <select id="related_prod_id_${counter2}" class="woocommerce-Input woocommerce-Input--text input-text form-control related_prod" name="related_prod_id[]" required>
                   <option value="">Select Product</option>
                   @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->product_name}}</option>
                   @endforeach
                </select>
                </td>
                <td><input type="button" class="btn btn-danger btn-md" value="-" onclick="removeRelatedProdRow(${counter2})"></td>
                </tr>`);
            makeRelatedProdArray();
            removeRelatedProdOption(counter2);
            counter2++;
        }

        var relatedProdOptions = [];
        function makeRelatedProdArray() {
            $('.row_related_prod').each(function (i, o) {
                var closestParent = $(this).closest('tr');
                var value = closestParent.find('.related_prod').val();
                if (value != null && value !== '' && relatedProdOptions.includes(value) === false) {
                    relatedProdOptions.push(value);
                }
            });
        }
        makeRelatedProdArray();
        function removeRelatedProdOption(id){
            relatedProdOptions.forEach(function (i, v) {
                $("#related_prod_id_"+id+" option[value='"+i+"']").remove();
            })
        }
        function removeRelatedProdRow(counter){
            var value = $('#row_related_'+counter).find('.related_prod').val();
            if (value != null && value !== '' && relatedProdOptions.includes(value) === true) {
                const index = relatedProdOptions.indexOf(value);
                if (index > -1) {
                    relatedProdOptions.splice(index, 1);
                }
            }
            $('#row_related_'+counter).remove();
        }
        /* Related product functions end */
$(document).ready(function () {
            $('#gallery_0').on('change',function(e) {
               var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById('gallery_0').files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById('img_0').src = oFREvent.target.result;
            };
            });
         });

   </script>
@endsection

