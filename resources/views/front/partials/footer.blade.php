</div>
<footer class="et-l et-l--footer">
   <div class="et_builder_inner_content et_pb_gutters3">
      <div class="et_pb_section et_pb_section_0_tb_footer sec-footer et_pb_with_background et_section_regular">
         <div class="et_pb_row et_pb_row_0_tb_footer">
            <div class="et_pb_column et_pb_column_1_4 et_pb_column_0_tb_footer  et_pb_css_mix_blend_mode_passthrough">
               <div class="et_pb_module et_pb_image et_pb_image_0_tb_footer">
                  <a href="{{route('homepage')}}"><span class="et_pb_image_wrap "><img loading="lazy" width="149" height="104" src="{{asset('assets/uploads/2022/03/Uscannazon-1.png')}}" alt="" title="Uscannazon" class="wp-image-80"></span></a>
               </div>
               <div class="et_pb_module et_pb_text et_pb_text_0_tb_footer  et_pb_text_align_left et_pb_bg_layout_light">
                  <div class="et_pb_text_inner">
                     <p>Call us: (949)-689-6669</p>
                     <p>Email: Info@uscannazon.com</p>
                  </div>
               </div>
               <div class="et_pb_module et_pb_text et_pb_text_1_tb_footer  et_pb_text_align_left et_pb_bg_layout_light">
                  <div class="et_pb_text_inner">
                     <h5>Follow Us</h5>
                  </div>
               </div>
               <ul class="et_pb_module et_pb_social_media_follow et_pb_social_media_follow_0_tb_footer clearfix  et_pb_bg_layout_light">
                  <li class="et_pb_social_media_follow_network_0_tb_footer et_pb_social_icon et_pb_social_network_link  et-social-facebook"><a href="#" class="icon et_pb_with_border" title="Follow on Facebook" target="_blank"><span class="et_pb_social_media_follow_network_name" aria-hidden="true">Follow</span></a></li>
                  <li class="et_pb_social_media_follow_network_1_tb_footer et_pb_social_icon et_pb_social_network_link  et-social-twitter"><a href="#" class="icon et_pb_with_border" title="Follow on Twitter" target="_blank"><span class="et_pb_social_media_follow_network_name" aria-hidden="true">Follow</span></a></li>
                  <li class="et_pb_social_media_follow_network_2_tb_footer et_pb_social_icon et_pb_social_network_link  et-social-instagram"><a href="#" class="icon et_pb_with_border" title="Follow on Instagram" target="_blank"><span class="et_pb_social_media_follow_network_name" aria-hidden="true">Follow</span></a></li>
               </ul>
            </div>
            <div class="et_pb_column et_pb_column_1_4 et_pb_column_1_tb_footer  et_pb_css_mix_blend_mode_passthrough">
               <div class="et_pb_module et_pb_text et_pb_text_2_tb_footer  et_pb_text_align_left et_pb_bg_layout_light footerInformation">
                  <div class="et_pb_text_inner">
                     <h4>Information</h4>
                  </div>
               </div>
               <div class="et_pb_with_border et_pb_module et_pb_sidebar_0_tb_footer et_pb_widget_area clearfix et_pb_widget_area_left et_pb_bg_layout_light">
                  <div id="nav_menu-2" class="fwidget et_pb_widget widget_nav_menu">
                     <div class="menu-information-container">
                        <ul id="menu-information" class="menu">
                           <li id="menu-item-49" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-49"><a href="{{route('aboutUs')}}">About Us</a></li>
                           <li id="menu-item-50" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-50"><a href="{{route('contactUs')}}">Contact</a></li>
                           {{-- <li id="menu-item-425" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-425"><a href="{{route('myAccount')}}">Profile</a></li> --}}
                           @if(Auth::check() && Auth::user()->role_id == 2)
                           <li id="menu-item-425" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-425"><a href="{{ route('edit-account') }}">Profile</a></li>
                           @endif
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et_pb_column et_pb_column_1_4 et_pb_column_2_tb_footer  et_pb_css_mix_blend_mode_passthrough">
               <div class="et_pb_module et_pb_text et_pb_text_3_tb_footer  et_pb_text_align_left et_pb_bg_layout_light">
                  <div class="et_pb_text_inner">
                     <h4>Returns</h4>
                  </div>
               </div>
               <div class="et_pb_with_border et_pb_module et_pb_sidebar_1_tb_footer et_pb_widget_area clearfix et_pb_widget_area_left et_pb_bg_layout_light">
                  <div id="nav_menu-3" class="fwidget et_pb_widget widget_nav_menu">
                     <div class="menu-returns-container">
                        <ul id="menu-returns" class="menu">
                           <li id="menu-item-52" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52"><a href="{{ route('faq') }}">FAQs</a></li>
                           <li id="menu-item-431" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-431"><a href="{{ route('myAccount') }}">Sell With Us</a></li>
                           <li id="menu-item-426" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-426"><a href="{{route('homepage')}}">Site map</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="et_pb_column et_pb_column_1_4 et_pb_column_3_tb_footer  et_pb_css_mix_blend_mode_passthrough et-last-child">
               <div class="et_pb_module et_pb_text et_pb_text_4_tb_footer  et_pb_text_align_left et_pb_bg_layout_light">
                  <div class="et_pb_text_inner">
                     <h4>Get In Touch</h4>
                  </div>
               </div>
               <div class="et_pb_module et_pb_text et_pb_text_5_tb_footer  et_pb_text_align_left et_pb_bg_layout_light">
                  <div class="et_pb_text_inner">Street addresses: 2222 Michaelson dr. Irvine,<br>
                     Ca 92612
                  </div>
               </div>
               <div class="et_pb_module et_pb_text et_pb_text_6_tb_footer visa-cards  et_pb_text_align_left et_pb_bg_layout_light">
                  <div class="et_pb_text_inner">
                     <div class="main-div">
                        <div><img src="{{asset('assets/uploads/2022/03/Group-52.png')}}"></div>
                        <div><img src="{{asset('assets/uploads/2022/03/Group-53.png')}}"></div>
                        <div><img src="{{asset('assets/uploads/2022/03/Group-54.png')}}"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="et_pb_row et_pb_row_1_tb_footer">
            <div class="et_pb_column et_pb_column_4_4 et_pb_column_4_tb_footer  et_pb_css_mix_blend_mode_passthrough et-last-child">
               <div class="et_pb_module et_pb_text et_pb_text_7_tb_footer  et_pb_text_align_center et_pb_bg_layout_light">
                  <div class="et_pb_text_inner">
                     <p>Copyright©2022 Uscannazon All Rights Reserved.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
</div>
</div>
{{-- product modal popup --}}

{{-- <button class="trigger">Click the modal!</button> --}}
<div class="modal modalTn">
    <div class="modal-content">
        <span class="close-button">×</span>
        <div class="u-column2 col-2">
         <h2>Add To Request</h2>
         <form method="Post" action="{{ route('vendorRequest_shop') }}" class="woocommerce-form woocommerce-form-register register">
          {{ csrf_field() }}

{{--
          <input type="hidden" value="{{$data->id}}" name="product_id">
          <input type="hidden" value="{{$data->vender_id}}" name="vendor_id"> --}}


               <div class="split-row form-row-wide">
                  <p class="form-row form-group">
                     <!-- <label for="first-name">Full Name <span class="required">*</span></label> -->
                     <input type="text" class="input-text form-control" name="full_name" id="first-name" required="required" placeholder="Full Name">
                  </p>
                  <p class="form-row form-group">
                     <!-- <label for="last-name">Phone Number <span class="required">*</span></label> -->
                     <input type="number" class="input-text form-control" name="phone_num" id="last-name" required="required" placeholder="Phone Number">

                  </p>

                  <p class="form-row form-group">
                     <!-- <label for="last-name">Email <span class="required">*</span></label> -->
                     <input type="email" class="input-text form-control" name="email" id="last-name" required="required" placeholder="Email">
                  </p>
                  <p class="form-row form-group">
                     <!-- <label for="last-name">Address <span class="required">*</span></label> -->
                     <input type="text" class="input-text form-control" name="address" id="last-name" required="required" placeholder="Address">
                  </p>
                  <p class="form-row form-group">
                     <!-- <label for="last-name">City <span class="required">*</span></label> -->
                     <input type="text" class="input-text form-control" name="city" id="last-name" required="required" placeholder="City">
                  </p>
                  <p class="form-row form-group">
                     <!-- <label for="last-name">Select Product <span class="required">*</span></label> -->
                     <select name="product_id" id="product_vendor_find" class="input-text form-control" required>
                        <option value="" selected disabled>Select Product</option>
                        @foreach(GetProducts() as $products)
                        <option value="{{$products->id}}" data-vendor="{{$products->vender_id}}">{{$products->product_name}}</option>
                        @endforeach
                     </select>
                  </p>
                  <input type="hidden" value="" name="vendor_id" id="set_vendor_id">
                  <p class="form-row form-group">
                     <!-- <label for="last-name">Quantity <span class="required">*</span></label> -->
                     <input type="number" class="input-text form-control" name="quantity" title="Qty" size="4" required="required" inputmode="numeric" autocomplete="off" placeholder="Quantity">
                  </p>
                  {{-- <div class="quantity">
                     <input type="number" name="quantity" id="quantity_62b36070a592a" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder=""   inputmode="numeric" autocomplete="off">
                  </div> --}}

               <br>
            <p class="woocommerce-form-row form-row">
               <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">Add Product Request</button>

            </p>
         </form>
      </div>

    </div>

</div>
{{-- product modal popup --}}

</div>
{{-- product modal popup --}}


@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
{{--    <script src="{{ asset('js/algolia.js') }}"></script>--}}
@endsection
<script type="text/javascript">

// product modal popup

// var modal = document.querySelector(".modal");
// var trigger = document.querySelector(".trigger");
// var closeButton = document.querySelector(".close-button");

// function toggleModal() {
//     modal.classList.toggle("show-modal");
// }

// function windowOnClick(event) {
//     if (event.target === modal) {
//         toggleModal();
//     }
// }

// trigger.addEventListener("click", toggleModal);
// closeButton.addEventListener("click", toggleModal);
// window.addEventListener("click", windowOnClick);

// product modal popup

(function () {
var c = document.body.className;
c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
document.body.className = c;
})();
</script>
<style>.wp-container-62b3603e50735 .alignleft { float: left; margin-right: 2em; }.wp-container-62b3603e50735 .alignright { float: right; margin-left: 2em; }</style>
<script>
jQuery('.sec-1 .wc-block-product-categories-list--depth-1').parent('li').addClass('first-level');
jQuery('li.first-level').prepend('<span id="toggle-span"><\/span>');
</script>
<script>
jQuery(document).ready(function(){
jQuery("span#toggle-span").click(function(){
jQuery( ".wc-block-product-categories-list--depth-1" ).toggle("slow");
});
jQuery('.sec-1 .wc-block-product-categories-list li.wc-block-product-categories-list-item.first-level').click(function(){
jQuery(this).toggleClass('active') ;

});
});
</script><script type="text/javascript" src="{{ URL::asset('assets/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.7.0-wc.6.3.1" id="jquery-blockui-js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/dokan-lite/assets/js/vendor-registration.js')}}"></script>
<script type="text/javascript" id="wc-add-to-cart-js-extra">
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/wp\/uscannabiz\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/wp\/uscannabiz\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"https:\/\/webprojectmockup.com\/wp\/uscannabizhtml\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=6.3.1" id="wc-add-to-cart-js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4-wc.6.3.1" id="js-cookie-js')}}"></script>
<script type="text/javascript" id="woocommerce-js-extra">
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/wp\/uscannabiz\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/wp\/uscannabiz\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=6.3.1')}}" id="woocommerce-js"></script>
<script type="text/javascript" id="wc-cart-fragments-js-extra">
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/wp\/uscannabiz\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/wp\/uscannabiz\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_4b2954fb646b3ffe8c79fff6a1fcab46","fragment_name":"wc_fragments_4b2954fb646b3ffe8c79fff6a1fcab46","request_timeout":"5000"};
/* ]]> */
</script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=6.3.1')}}" id="wc-cart-fragments-js"></script>
<script type="text/javascript" id="divi-custom-script-js-extra">
/* <![CDATA[ */
var DIVI = {"item_count":"%d Item","items_count":"%d Items"};
var et_builder_utils_params = {"condition":{"diviTheme":true,"extraTheme":false},"scrollLocations":["app","top"],"builderScrollLocations":{"desktop":"app","tablet":"app","phone":"app"},"onloadScrollLocation":"app","builderType":"fe"};
var et_frontend_scripts = {"builderCssContainerPrefix":"#et-boc","builderCssLayoutPrefix":"#et-boc .et-l"};
var et_pb_custom = {"ajaxurl":"https:\/\/webprojectmockup.com\/wp\/uscannabizhtml\/wp-admin\/admin-ajax.php","images_uri":"https:\/\/webprojectmockup.com\/wp\/uscannabizhtml\/wp-content\/themes\/Divi\/images","builder_images_uri":"https:\/\/webprojectmockup.com\/wp\/uscannabizhtml\/wp-content\/themes\/Divi\/includes\/builder\/images","et_frontend_nonce":"d7f3159274","subscription_failed":"Please, check the fields below to make sure you entered the correct information.","et_ab_log_nonce":"372a059ac0","fill_message":"Please, fill in the following fields:","contact_error_message":"Please, fix the following errors:","invalid":"Invalid email","captcha":"Captcha","prev":"Prev","previous":"Previous","next":"Next","wrong_captcha":"You entered the wrong number in captcha.","wrong_checkbox":"Checkbox","ignore_waypoints":"no","is_divi_theme_used":"1","widget_search_selector":".widget_search","ab_tests":[],"is_ab_testing_active":"","page_id":"34","unique_test_id":"","ab_bounce_rate":"5","is_cache_plugin_active":"no","is_shortcode_tracking":"","tinymce_uri":"","waypoints_options":[]};
var et_pb_box_shadow_elements = [];
/* ]]> */
</script>
<script type="text/javascript" src="{{ URL::asset('assets/themes/Divi/js/scripts.min.js?ver=4.15.1')}}" id="divi-custom-script-js"></script>
<script type="text/javascript" src="{{ URL::asset('assets/themes/Divi/includes/builder/feature/dynamic-assets/assets/js/jquery.fitvids.js?ver=4.15.1')}}" id="fitvids-js"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/dokan-lite/assets/js/login-form-popup.js?ver=1647983870')}}" id="dokan-login-form-popup-js"></script>
<script type="text/javascript" src="{{ URL::asset('assets/themes/Divi/core/admin/js/common.js?ver=4.15.1')}}" id="et-core-common-js"></script>
<script>
   $('.for_vender').hide();

   $('.form-row.form-group.user-role.vendor-customer-registration .radio input').change(function(){

   var value = $(this).val();

if ( value === '3') {
    $('.for_vender').find( 'input, select' ).removeAttr( 'disabled' );
    $('.for_vender').slideDown();

    if ( $( '.tc_check_box' ).length > 0 ) {
        $('button[name=register]').attr('disabled','disabled');
    }

} else {
    $('.for_vender').find( 'input, select' ).attr( 'disabled', 'disabled' );
    $('.for_vender').slideUp();

    if ( $( '.tc_check_box' ).length > 0 ) {
        $( 'button[name=register]' ).removeAttr( 'disabled' );
    }
}
});

$('#product_vendor_find').change(function(){
                var data_val = $(this).val();
               //  console.log(data_val);
                $.ajax({
                    type: "GET",
                    url: '{{route("getVendor")}}',
                    data: {
                        'data_val': data_val
                    },
                    success: function(response) {
                     $('#set_vendor_id').val(response.data)
                    }
                });
});


$('.trigger').click(function() {
   $('.modal.modalTn').slideDown();
})
$('.modal.modalTn span.close-button').click(function(){
    $(this).closest('.modalTn').slideUp();
});


// Zeveloper

$(window).on('load', function() {
    $('table').wrapAll('<div class="table-overflowx-auto"><div>');
});

$('#dokan-product-list-table.dokan-table td:not(.hidden)').on('click',function(){
    $(this).parent('tr').toggleClass('is-expanded');
});

$('.alert-success').ready(function() {
    setTimeout(function() {
       $(".alert-success").addClass('hide')
        }, 4000);
    });

    $('.alert-danger').ready(function() {
    setTimeout(function() {
       $(".alert-danger").addClass('hide')
        }, 4000);
    });

    $('.alert-info').ready(function() {
    setTimeout(function() {
       $(".alert-info").addClass('hide')
        }, 4000);
    });
    
     if ( !$('.msgContainer').children().length )
        $('.msgContainer').hide();

   </script>

    <script>

    </script>
</body>
</html>
