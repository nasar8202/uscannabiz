@extends('front.layout.app')
@section('title', 'Add Product Form')
@section('content')
<style id="et-builder-module-design-179-cached-inline-styles">.et-db #et-boc .et-l .et_pb_section_0_tb_footer.et_pb_section{padding-bottom:20px;background-color:#0D4400!important}.et-db #et-boc .et-l .et_pb_row_0_tb_footer.et_pb_row{padding-top:0px!important;padding-bottom:0px!important;padding-top:0px;padding-bottom:0px}.et-db #et-boc .et-l .et_pb_image_0_tb_footer{margin-bottom:20px!important;text-align:left;margin-left:0}.et-db #et-boc .et-l .et_pb_text_0_tb_footer.et_pb_text,.et-db #et-boc .et-l .et_pb_text_5_tb_footer.et_pb_text,.et-db #et-boc .et-l .et_pb_text_7_tb_footer.et_pb_text{color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_0_tb_footer{font-size:18px;margin-bottom:30px!important}.et-db #et-boc .et-l .et_pb_text_1_tb_footer h5{font-family:'Montserrat',Helvetica,Arial,Lucida,sans-serif;font-weight:600;font-size:25px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_1_tb_footer{margin-bottom:15px!important}.et-db #et-boc .et-l .et_pb_social_media_follow_0_tb_footer li a.icon:before{font-size:20px;line-height:40px;height:40px;width:40px}.et-db #et-boc .et-l .et_pb_social_media_follow_0_tb_footer li a.icon{height:40px;width:40px}.et-db #et-boc .et-l .et_pb_text_4_tb_footer h4,.et-db #et-boc .et-l .et_pb_text_2_tb_footer h4,.et-db #et-boc .et-l .et_pb_text_3_tb_footer h4{font-weight:600;font-size:25px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_3_tb_footer,.et-db #et-boc .et-l .et_pb_text_2_tb_footer,.et-db #et-boc .et-l .et_pb_text_4_tb_footer{margin-bottom:20px!important}.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area li,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area li:before,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area a,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area li,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area li:before,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area a{font-size:18px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_text_5_tb_footer{line-height:1.4em;font-size:18px;line-height:1.4em;margin-bottom:30px!important}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:0px!important;padding-top:0px}.et-db #et-boc .et-l .et_pb_text_7_tb_footer{font-size:18px}@media only screen and (max-width:980px){.et-db #et-boc .et-l .et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}@media only screen and (max-width:767px){.et-db #et-boc .et-l .et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}</style>
<div class="archive tax-product_cat theme-Divi et-tb-has-template et-tb-has-footer woocommerce woocommerce-page woocommerce-js et_button_no_icon et_pb_button_helper_class et_fixed_nav et_show_nav et_secondary_nav_enabled et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_left et_cover_background et_pb_gutter windows et_pb_gutters3 et_left_sidebar et_divi_theme et-db dokan-theme-Divi customize-support chrome">
<div id="main-content">
  <div class="container">
     <div id="content-area" class="clearfix">
        <div id="left-area">
     
           
         <div class="u-column2 col-2">
            <h2>Add Product</h2>
            <form method="post" action="{{ route('add_product') }}" class="woocommerce-form woocommerce-form-register register" enctype="multipart/form-data">
             {{ csrf_field() }}
              
             <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
               <div class="col">
                  <label for="exampleInputEmail1">Main Category</label>
                  <select class="form-control {{ $errors->has('main_category') ? 'has-error' : ''}}" name="main_category" id="main-category" required>
                      <option value="" disabled selected>Select Category</option>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                  </select>
               </div>
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
                        <input type="text" class="input-text form-control" name="product_sku" id="first-name" value="" required="required">
                     </p>
                     <p class="form-row form-group">
                        <label for="last-name">Product Slug <span class="required">*</span></label>
                        <input type="text" class="input-text form-control" name="product_slug" id="last-name" value="" required="required">
                     </p>
                     <p class="form-row form-group">
                        <label for="exampleInputEmail1">Sale(%)</label>
                        <input type="number" name="product_sale_percentage" placeholder="10" class="form-control" readonly id="product_sale_percentage" value="{{old('product_sale_percentage')}}" required>
                        </p>
                  </div>
                  
                  <p class="form-row form-group form-row-wide">
                     <label for="exampleInputEmail1">Product Sale</label>
                 <input type="checkbox" name="product_sale" class="form-control" id="product_sale" style="height: 20px;width: 20px;" value="yes" @if(old('product_sale') == 'yes') {{ 'checked' }} @endif>
                  </p>
                 
               
                  <p class="form-row form-group form-row-wide">
                     <label for="exampleInputEmail1">Product Stock</label>
                     <input type="checkbox" name="product_stock" class="form-control" id="product_stock" style="height: 20px;width: 20px;" value="yes" @if(old('product_stock') == 'yes') {{ 'checked' }} @endif>
                
                  </p>
                  
                  <p class="form-row form-group form-row-wide">
                     <label for="exampleInputEmail1">Product Stock Qty</label>
                     <input type="number" name="product_stock_qty" class="form-control" placeholder="10" readonly id="product_stock_qty" value="{{old('product_stock_qty')}}" required>
                 
                  </p>
                  
                  <p class="form-row form-group form-row-wide">
                     <label for="switch">Status</label>
                     <label class="switch"><input type="checkbox" @if(old('status') == '1') {{ 'checked' }} @endif data-id="" id="status-switch" name="status" value="1">
                     <span class="slider round"></span>
                  </label>
                                               
                  </p>
                  <p class="form-row form-group form-row-wide">
                     <label for="category">Description</label>
                  <textarea class="form-control {{ $errors->has('main_category') ? 'has-error' : ''}}" name="description" id="description" placeholder="Description" required>{{old('description')}}</textarea>
                  {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                                
                  </p>
                  <p class="form-row form-group form-row-wide">
                     <label for="category">Meta Title</label>
                     <input type="text" class="form-control {{ $errors->has('meta-title') ? 'has-error' : ''}}" name="meta-title" id="meta-title"  value="{{old('meta-title')}}" placeholder="Meta Title" required >
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
                  
               <p class="woocommerce-form-row form-row">
                  <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">Register</button>

               </p>
            </form>
         </div>
         
           </div>
           
        </div>
     </div>
  </div>
</div>

@endsection
