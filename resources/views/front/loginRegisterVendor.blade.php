@extends('front.layout.app')
@section('title', 'Register and login')
@section('content')
<style type="text/css">
    .et_pb_section_0_tb_footer.et_pb_section{padding-bottom:20px;background-color:#0D4400!important}.et_pb_row_0_tb_footer.et_pb_row{padding-top:0px!important;padding-bottom:0px!important;padding-top:0px;padding-bottom:0px}.et_pb_image_0_tb_footer{margin-bottom:20px!important;text-align:left;margin-left:0}.et_pb_text_0_tb_footer.et_pb_text,.et_pb_text_5_tb_footer.et_pb_text,.et_pb_text_7_tb_footer.et_pb_text{color:#FFFFFF!important}.et_pb_text_0_tb_footer{font-size:18px;margin-bottom:30px!important}.et_pb_text_1_tb_footer h5{font-family:'Montserrat',Helvetica,Arial,Lucida,sans-serif;font-weight:600;font-size:25px;color:#FFFFFF!important}.et_pb_text_1_tb_footer{margin-bottom:15px!important}.et_pb_social_media_follow_0_tb_footer li a.icon:before{font-size:20px;line-height:40px;height:40px;width:40px}.et_pb_social_media_follow_0_tb_footer li a.icon{height:40px;width:40px}.et_pb_text_4_tb_footer h4,.et_pb_text_2_tb_footer h4,.et_pb_text_3_tb_footer h4{font-weight:600;font-size:25px;color:#FFFFFF!important}.et_pb_text_3_tb_footer,.et_pb_text_2_tb_footer,.et_pb_text_4_tb_footer{margin-bottom:20px!important}.et_pb_sidebar_1_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area li,.et_pb_sidebar_1_tb_footer.et_pb_widget_area li:before,.et_pb_sidebar_1_tb_footer.et_pb_widget_area a,.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_0_tb_footer.et_pb_widget_area li,.et_pb_sidebar_0_tb_footer.et_pb_widget_area li:before,.et_pb_sidebar_0_tb_footer.et_pb_widget_area a{font-size:18px;color:#FFFFFF!important}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_text_5_tb_footer{line-height:1.4em;font-size:18px;line-height:1.4em;margin-bottom:30px!important}.et_pb_row_1_tb_footer.et_pb_row{padding-top:0px!important;padding-top:0px}.et_pb_text_7_tb_footer{font-size:18px}@media only screen and (max-width:980px){.et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}@media only screen and (max-width:767px){.et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}div.et_pb_section.et_pb_section_0{background-image:url(assets/uploads/2022/03/shutterstock_1877216707.jpg)!important}.et_pb_text_0 h1{font-weight:600;font-size:40px;color:#FFFFFF!important}.et_pb_section_1.et_pb_section{background-color:rgba(238,238,238,0)!important}@media only screen and (max-width:980px){.et_pb_section_0.et_pb_section{padding-top:30px;padding-bottom:30px}.et_pb_text_0 h1{font-size:30px}}@media only screen and (max-width:767px){.et_pb_section_0.et_pb_section{padding-top:30px;padding-bottom:30px}.et_pb_text_0 h1{font-size:25px}}
</style>
<style type="text/css">
    .woocommerce #respond input#submit,.woocommerce-page #respond input#submit,.woocommerce #content input.button,.woocommerce-page #content input.button,.woocommerce-message,.woocommerce-error,.woocommerce-info{background:#0d4400!important}#et_search_icon:hover,.mobile_menu_bar:before,.mobile_menu_bar:after,.et_toggle_slide_menu:after,.et-social-icon a:hover,.et_pb_sum,.et_pb_pricing li a,.et_pb_pricing_table_button,.et_overlay:before,.entry-summary p.price ins,.woocommerce div.product span.price,.woocommerce-page div.product span.price,.woocommerce #content div.product span.price,.woocommerce-page #content div.product span.price,.woocommerce div.product p.price,.woocommerce-page div.product p.price,.woocommerce #content div.product p.price,.woocommerce-page #content div.product p.price,.et_pb_member_social_links a:hover,.woocommerce .star-rating span:before,.woocommerce-page .star-rating span:before,.et_pb_widget li a:hover,.et_pb_filterable_portfolio .et_pb_portfolio_filters li a.active,.et_pb_filterable_portfolio .et_pb_portofolio_pagination ul li a.active,.et_pb_gallery .et_pb_gallery_pagination ul li a.active,.wp-pagenavi span.current,.wp-pagenavi a:hover,.nav-single a,.tagged_as a,.posted_in a{color:#0d4400}.et_pb_contact_submit,.et_password_protected_form .et_submit_button,.et_pb_bg_layout_light .et_pb_newsletter_button,.comment-reply-link,.form-submit .et_pb_button,.et_pb_bg_layout_light .et_pb_promo_button,.et_pb_bg_layout_light .et_pb_more_button,.woocommerce a.button.alt,.woocommerce-page a.button.alt,.woocommerce button.button.alt,.woocommerce button.button.alt.disabled,.woocommerce-page button.button.alt,.woocommerce-page button.button.alt.disabled,.woocommerce input.button.alt,.woocommerce-page input.button.alt,.woocommerce #respond input#submit.alt,.woocommerce-page #respond input#submit.alt,.woocommerce #content input.button.alt,.woocommerce-page #content input.button.alt,.woocommerce a.button,.woocommerce-page a.button,.woocommerce button.button,.woocommerce-page button.button,.woocommerce input.button,.woocommerce-page input.button,.et_pb_contact p input[type="checkbox"]:checked+label i:before,.et_pb_bg_layout_light.et_pb_module.et_pb_button{color:#fff}.footer-widget h4{color:#0d4400}.et-search-form,.nav li ul,.et_mobile_menu,.footer-widget li:before,.et_pb_pricing li:before,blockquote{border-color:#0d4400}.et_pb_counter_amount,.et_pb_featured_table .et_pb_pricing_heading,.et_quote_content,.et_link_content,.et_audio_content,.et_pb_post_slider.et_pb_bg_layout_dark,.et_slide_in_menu_container,.et_pb_contact p input[type="radio"]:checked+label i:before{background-color:#0d4400}.container,.et_pb_row,.et_pb_slider .et_pb_container,.et_pb_fullwidth_section .et_pb_title_container,.et_pb_fullwidth_section .et_pb_title_featured_container,.et_pb_fullwidth_header:not(.et_pb_fullscreen) .et_pb_fullwidth_header_container{max-width:1740px}.et_boxed_layout #page-container,.et_boxed_layout.et_non_fixed_nav.et_transparent_nav #page-container #top-header,.et_boxed_layout.et_non_fixed_nav.et_transparent_nav #page-container #main-header,.et_fixed_nav.et_boxed_layout #page-container #top-header,.et_fixed_nav.et_boxed_layout #page-container #main-header,.et_boxed_layout #page-container .container,.et_boxed_layout #page-container .et_pb_row{max-width:1900px}a{color:#0d4400}#top-header,#et-secondary-nav li ul{background-color:#0d4400}.et_header_style_centered .mobile_nav .select_page,.et_header_style_split .mobile_nav .select_page,.et_nav_text_color_light #top-menu>li>a,.et_nav_text_color_dark #top-menu>li>a,#top-menu a,.et_mobile_menu li a,.et_nav_text_color_light .et_mobile_menu li a,.et_nav_text_color_dark .et_mobile_menu li a,#et_search_icon:before,.et_search_form_container input,span.et_close_search_field:after,#et-top-navigation .et-cart-info{color:#000000}.et_search_form_container input::-moz-placeholder{color:#000000}.et_search_form_container input::-webkit-input-placeholder{color:#000000}.et_search_form_container input:-ms-input-placeholder{color:#000000}#top-menu li a{font-size:18px}body.et_vertical_nav .container.et_search_form_container .et-search-form input{font-size:18px!important}#main-footer .footer-widget h4,#main-footer .widget_block h1,#main-footer .widget_block h2,#main-footer .widget_block h3,#main-footer .widget_block h4,#main-footer .widget_block h5,#main-footer .widget_block h6{color:#0d4400}.footer-widget li:before{border-color:#0d4400}.woocommerce a.button.alt,.woocommerce-page a.button.alt,.woocommerce button.button.alt,.woocommerce button.button.alt.disabled,.woocommerce-page button.button.alt,.woocommerce-page button.button.alt.disabled,.woocommerce input.button.alt,.woocommerce-page input.button.alt,.woocommerce #respond input#submit.alt,.woocommerce-page #respond input#submit.alt,.woocommerce #content input.button.alt,.woocommerce-page #content input.button.alt,.woocommerce a.button,.woocommerce-page a.button,.woocommerce button.button,.woocommerce-page button.button,.woocommerce input.button,.woocommerce-page input.button,.woocommerce #respond input#submit,.woocommerce-page #respond input#submit,.woocommerce #content input.button,.woocommerce-page #content input.button,.woocommerce-message a.button.wc-forward,body .et_pb_button{background-color:#0d4400;border-color:#0d4400}.woocommerce.et_pb_button_helper_class a.button.alt,.woocommerce-page.et_pb_button_helper_class a.button.alt,.woocommerce.et_pb_button_helper_class button.button.alt,.woocommerce.et_pb_button_helper_class button.button.alt.disabled,.woocommerce-page.et_pb_button_helper_class button.button.alt,.woocommerce-page.et_pb_button_helper_class button.button.alt.disabled,.woocommerce.et_pb_button_helper_class input.button.alt,.woocommerce-page.et_pb_button_helper_class input.button.alt,.woocommerce.et_pb_button_helper_class #respond input#submit.alt,.woocommerce-page.et_pb_button_helper_class #respond input#submit.alt,.woocommerce.et_pb_button_helper_class #content input.button.alt,.woocommerce-page.et_pb_button_helper_class #content input.button.alt,.woocommerce.et_pb_button_helper_class a.button,.woocommerce-page.et_pb_button_helper_class a.button,.woocommerce.et_pb_button_helper_class button.button,.woocommerce-page.et_pb_button_helper_class button.button,.woocommerce.et_pb_button_helper_class input.button,.woocommerce-page.et_pb_button_helper_class input.button,.woocommerce.et_pb_button_helper_class #respond input#submit,.woocommerce-page.et_pb_button_helper_class #respond input#submit,.woocommerce.et_pb_button_helper_class #content input.button,.woocommerce-page.et_pb_button_helper_class #content input.button,body.et_pb_button_helper_class .et_pb_button,body.et_pb_button_helper_class .et_pb_module.et_pb_button{color:#ffffff}body .et_pb_bg_layout_light.et_pb_button:hover,body .et_pb_bg_layout_light .et_pb_button:hover,body .et_pb_button:hover{color:#0d4400!important;background-color:rgba(255,255,255,0);border-color:#0d4400!important}.woocommerce a.button.alt:hover,.woocommerce-page a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce button.button.alt.disabled:hover,.woocommerce-page button.button.alt:hover,.woocommerce-page button.button.alt.disabled:hover,.woocommerce input.button.alt:hover,.woocommerce-page input.button.alt:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce-page #respond input#submit.alt:hover,.woocommerce #content input.button.alt:hover,.woocommerce-page #content input.button.alt:hover,.woocommerce a.button:hover,.woocommerce-page a.button:hover,.woocommerce button.button:hover,.woocommerce-page button.button:hover,.woocommerce input.button:hover,.woocommerce-page input.button:hover,.woocommerce #respond input#submit:hover,.woocommerce-page #respond input#submit:hover,.woocommerce #content input.button:hover,.woocommerce-page #content input.button:hover{color:#0d4400!important;background-color:rgba(255,255,255,0)!important;border-color:#0d4400!important}@media only screen and (min-width:981px){.et-fixed-header#top-header,.et-fixed-header#top-header #et-secondary-nav li ul{background-color:#0d4400}.et-fixed-header #top-menu a,.et-fixed-header #et_search_icon:before,.et-fixed-header #et_top_search .et-search-form input,.et-fixed-header .et_search_form_container input,.et-fixed-header .et_close_search_field:after,.et-fixed-header #et-top-navigation .et-cart-info{color:#000000!important}.et-fixed-header .et_search_form_container input::-moz-placeholder{color:#000000!important}.et-fixed-header .et_search_form_container input::-webkit-input-placeholder{color:#000000!important}.et-fixed-header .et_search_form_container input:-ms-input-placeholder{color:#000000!important}}@media only screen and (min-width:2175px){.et_pb_row{padding:43px 0}.et_pb_section{padding:87px 0}.single.et_pb_pagebuilder_layout.et_full_width_page .et_post_meta_wrapper{padding-top:130px}.et_pb_fullwidth_section{padding:0}}	h1,h2,h3,h4,h5,h6{font-family:'Poppins',Helvetica,Arial,Lucida,sans-serif}body,input,textarea,select{font-family:'Poppins',Helvetica,Arial,Lucida,sans-serif}.et_pb_section_0_tb_footer.et_pb_section{padding-bottom:20px;background-color:#0D4400!important}.et_pb_row_0_tb_footer.et_pb_row{padding-top:0px!important;padding-bottom:0px!important;padding-top:0px;padding-bottom:0px}.et_pb_image_0_tb_footer{margin-bottom:20px!important;text-align:left;margin-left:0}.et_pb_text_0_tb_footer.et_pb_text,.et_pb_text_5_tb_footer.et_pb_text,.et_pb_text_7_tb_footer.et_pb_text{color:#FFFFFF!important}.et_pb_text_0_tb_footer{font-size:18px;margin-bottom:30px!important}.et_pb_text_1_tb_footer h5{font-family:'Montserrat',Helvetica,Arial,Lucida,sans-serif;font-weight:600;font-size:25px;color:#FFFFFF!important}.et_pb_text_1_tb_footer{margin-bottom:15px!important}.et_pb_social_media_follow_0_tb_footer li a.icon:before{font-size:20px;line-height:40px;height:40px;width:40px}.et_pb_social_media_follow_0_tb_footer li a.icon{height:40px;width:40px}.et_pb_text_4_tb_footer h4,.et_pb_text_2_tb_footer h4,.et_pb_text_3_tb_footer h4{font-weight:600;font-size:25px;color:#FFFFFF!important}.et_pb_text_3_tb_footer,.et_pb_text_2_tb_footer,.et_pb_text_4_tb_footer{margin-bottom:20px!important}.et_pb_sidebar_1_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area li,.et_pb_sidebar_1_tb_footer.et_pb_widget_area li:before,.et_pb_sidebar_1_tb_footer.et_pb_widget_area a,.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_0_tb_footer.et_pb_widget_area li,.et_pb_sidebar_0_tb_footer.et_pb_widget_area li:before,.et_pb_sidebar_0_tb_footer.et_pb_widget_area a{font-size:18px;color:#FFFFFF!important}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_text_5_tb_footer{line-height:1.4em;font-size:18px;line-height:1.4em;margin-bottom:30px!important}.et_pb_row_1_tb_footer.et_pb_row{padding-top:0px!important;padding-top:0px}.et_pb_text_7_tb_footer{font-size:18px}@media only screen and (max-width:980px){.et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}@media only screen and (max-width:767px){.et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}div.et_pb_section.et_pb_section_0{background-image:url(assets//uploads/2022/03/shutterstock_1877216707.jpg)!important}.et_pb_text_0 h1{font-weight:600;font-size:40px;color:#FFFFFF!important}.et_pb_section_1.et_pb_section{background-color:rgba(238,238,238,0)!important}@media only screen and (max-width:980px){.et_pb_section_0.et_pb_section{padding-top:30px;padding-bottom:30px}.et_pb_text_0 h1{font-size:30px}}@media only screen and (max-width:767px){.et_pb_section_0.et_pb_section{padding-top:30px;padding-bottom:30px}.et_pb_text_0 h1{font-size:25px}}
</style>
<div id="main-content">
  <article id="post-14" class="post-14 page type-page status-publish hentry">
     <div class="entry-content">
        <div class="et-l et-l--post">
           <div class="et_builder_inner_content et_pb_gutters3">
              <div class="et_pb_section et_pb_section_0 et_pb_with_background et_section_regular">
                 <div class="et_pb_row et_pb_row_0">
                    <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">
                       <div class="et_pb_module et_pb_text et_pb_text_0  et_pb_text_align_left et_pb_bg_layout_light">
                          <div class="et_pb_text_inner">
                             <h1>My Account</h1>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="et_pb_section et_pb_section_1 et_pb_with_background et_section_regular">
                 <div class="et_pb_row et_pb_row_1">
                    <div class="et_pb_column et_pb_column_4_4 et_pb_column_1  et_pb_css_mix_blend_mode_passthrough et-last-child">
                       <div class="et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_left et_pb_bg_layout_light">
                          <div class="et_pb_text_inner">
                             <div class="woocommerce">
                                <div class="woocommerce-notices-wrapper"></div>
                                <div class="u-columns col2-set" id="customer_login">
                                   <div class="u-column1 col-1">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                    @if(count($errors) > 0)
                                        <div class="alert alert-danger multiple">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                      <h2>Login</h2>
                                      <form action="{{ route('login') }}" method="POST"  class="woocommerce-form woocommerce-form-login login" >
                                        {{ csrf_field() }}
                                         <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="username">Username or email address&nbsp;<span class="required">*</span></label>
                                            <input type="email" value="{{ old('email') }}" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="email" autocomplete="email" >
                                         </p>
                                         <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" value="{{ old('password') }}" name="password" id="password" autocomplete="current-password">
                                         </p>
                                         <p class="form-row">
                                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                                            </label>
                                            <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="44e0230480"><input type="hidden" name="_wp_http_referer" value="wp/uscannabiz/my-account/">				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                                         </p>
                                         <p class="woocommerce-LostPassword lost_password">
                                            <a href="{{ route('resetPasswordLink') }}">Lost your password?</a>
                                            {{-- <a href="/my-account/lost-password/">Lost your password?</a> --}}
                                         </p>
                                      </form>
                                   </div>
                                   <div class="u-column2 col-2">
                                      <h2>Register</h2>
                                      <form method="post" action="{{ route('registerVendorAndCustomer') }}" class="woocommerce-form woocommerce-form-register register">
                                       {{ csrf_field() }}
                                         <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="reg_email">Email address&nbsp;<span class="required">*</span></label>
                                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="">
                                         </p>
                                         <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="reg_password">Password&nbsp;<span class="required">*</span></label>
                                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password">
                                         </p>
                                         <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                          <label for="password">Confirm Password&nbsp;<span class="required">*</span></label>
                                          <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" value="{{ old('password') }}" name="confirm_password" id="password" autocomplete="current-password">
                                       </p>

                                            <div class="split-row form-row-wide">
                                               <p class="form-row form-group">
                                                  <label for="first-name">First Name <span class="required">*</span></label>
                                                  <input type="text" class="input-text form-control" name="fname" id="first-name" value="" required="required">
                                               </p>
                                               <p class="form-row form-group">
                                                  <label for="last-name">Last Name <span class="required">*</span></label>
                                                  <input type="text" class="input-text form-control" name="lname" id="last-name" value="" required="required">
                                               </p>
                                            </div>

                                            <p class="form-row form-group form-row-wide">
                                             <label for="shop-phone">Phone Number<span class="required">*</span></label>
                                             <input type="text" class="input-text form-control" name="phone" id="shop-phone" value="" required="required">
                                          </p>

                                         <div class="for_vender" >

                                        </div>

                                        <div class="for_broker" >

                                       </div>
                                         <p class="form-row form-group user-role vendor-customer-registration">
                                            <label class="radio">
                                            <input type="radio" name="role" value="2" id="customer_add_fields" checked>
                                            I am a buyer    </label>
                                            <br>
                                            <label class="radio">
                                            <input type="radio" name="role" id="vendor_add_fields" value="3">
                                            I am a vendor    </label>
                                            <br>
                                            <label class="radio">
                                            <input type="radio" name="role" id="broker_add_fields" value="4">
                                            I am a broker    </label>
                                         </p>
                                         <div class="woocommerce-privacy-policy-text">
                                            <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="/?page_id=3" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
                                         </div>
                                         <p class="woocommerce-form-row form-row">
                                            <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="fee4748166"><input type="hidden" name="_wp_http_referer" value="wp/uscannabiz/my-account/">
                                            <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">Register</button>

                                         </p>
                                      </form>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </article>
</div>

<script>

$(document).ready(function() {


               $('#customer_add_fields').click(function() {
                 $('.for_broker').html('');
                 $('.for_vender').html('');
              });

              $('#vendor_add_fields').click(function() {
                 $('.for_broker').html('');
                 $('.for_vender').html('');
                $(".for_vender").html('<p class="form-row form-group form-row-wide"><label for="company-name">City <span class="">*</span></label><input type="text" class="input-text form-control" name="city" id="city" value="" required=""></p><p class="form-row form-group form-row-wide"><label for="company-name">State <span class="">*</span></label><input type="text" class="input-text form-control" name="state" id="state" value="" required=""></p><p class="form-row form-group form-row-wide"><label for="company-name">Country <span class="">*</span></label><input type="text" class="input-text form-control" name="country" id="country" value="" required=""></p><p class="form-row form-group form-row-wide"><label for="company-name">Address <span class="">*</span></label><input type="text" class="input-text form-control" name="address" id="address" value="" required=""></p><p class="form-row form-group form-row-wide"><label for="company-name">Store Name <span class="">*</span></label><input type="text" class="input-text form-control" name="store_name" id="store_name" value="" required=""></p><p class="form-row form-group form-row-wide"><label for="company-name">Store Url <span class="">*</span></label><input type="text" class="input-text form-control" name="store_url" id="store_url" value="" required=""></p>')
              });

              $('#broker_add_fields').click(function() {
                 $('.for_vender').html('');
                 $('.for_broker').html('');
                 $(".for_broker").html('<p class="form-row form-group form-row-wide"><label for="company-name">City <span class="">*</span></label><input type="text" class="input-text form-control" name="city" id="city" value="" required=""></p><p class="form-row form-group form-row-wide"><label for="company-name">State <span class="">*</span></label><input type="text" class="input-text form-control" name="state" id="state" value="" required=""></p><p class="form-row form-group form-row-wide"><label for="company-name">Country <span class="">*</span></label><input type="text" class="input-text form-control" name="country" id="country" value="" required=""></p><p class="form-row form-group form-row-wide"><label for="company-name">Address <span class="">*</span></label><input type="text" class="input-text form-control" name="address" id="address" value="" required=""></p><p class="form-row form-group form-row-wide"><label for="company-name">Store Name <span class="">*</span></label><input type="text" class="input-text form-control" name="store_name" id="store_name" value="" required=""></p><p class="form-row form-group form-row-wide"><label for="company-name">Store Url <span class="">*</span></label><input type="text" class="input-text form-control" name="store_url" id="store_url" value="" required=""></p>')

               });


          });
</script>
@endsection
@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
{{--    <script src="{{ asset('js/algolia.js') }}"></script>--}}
@endsection


