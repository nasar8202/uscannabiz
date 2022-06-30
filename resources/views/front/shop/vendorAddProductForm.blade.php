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
            <h2>Add To Request</h2>
            <form method="post" action="{{ route('register') }}" class="woocommerce-form woocommerce-form-register register">
             {{ csrf_field() }}
              
             
             <div class="row">
               <table class="table">
                   <tr>
                       <th>Product Image</th>
                       <th>Select Image</th>
                   </tr>
                   <tbody>
                       <tr>
                           <td>
                               <img src="{{asset('admin/images/.$product->image')}}" alt="" id="img_0" style="height: 150px;width: 150px;">
                           </td>
                           <td>
                               <div class="input-group">
                                   <div class="custom-file">
                                   <label>Product Name</label>
                                  <h3>{{$data->product_name}}</h3> 
                                  
                                  <label>Product Price</label>
                                  <h3>{{$data->product_current_price}}</h3> 
                                 </div>
                                   {!! $errors->first('product_image_first', '<p class="help-block">:message</p>') !!}
                               </div>
                           </td>
                       </tr>
                   </tbody>
               </table>
           </div>
           
             
                  <div class="split-row form-row-wide">
                     <p class="form-row form-group">
                        <label for="first-name">Full Name <span class="required">*</span></label>
                        <input type="text" class="input-text form-control" name="product_sku" id="first-name" value="" required="required">
                     </p>
                     <p class="form-row form-group">
                        <label for="last-name">Phone Number <span class="required">*</span></label>
                        <input type="number" class="input-text form-control" name="product_slug" id="last-name" value="" required="required">
                     </p>
                  
                     <p class="form-row form-group">
                        <label for="last-name">Email <span class="required">*</span></label>
                        <input type="email" class="input-text form-control" name="product_slug" id="last-name" value="" required="required">
                     </p>
                     <p class="form-row form-group">
                        <label for="last-name">Address <span class="required">*</span></label>
                        <input type="text" class="input-text form-control" name="product_slug" id="last-name" value="" required="required">
                     </p>
                     <p class="form-row form-group">
                        <label for="last-name">City <span class="required">*</span></label>
                        <input type="text" class="input-text form-control" name="product_slug" id="last-name" value="" required="required">
                     </p>
                  
                  
                  
               <p class="woocommerce-form-row form-row">
                  <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">Add Product Request</button>

               </p>
            </form>
         </div>
         
           </div>
           
        </div>
     </div>
  </div>
</div>

@endsection
