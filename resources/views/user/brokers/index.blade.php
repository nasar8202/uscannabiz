@extends('front.layout.app')
@section('title', 'My Orders')
@section('content')
    <style id="et-critical-inline-css">
        .woocommerce #respond input#submit,
        .woocommerce-page #respond input#submit,
        .woocommerce #content input.button,
        .woocommerce-page #content input.button,
        .woocommerce-message,
        .woocommerce-error,
        .woocommerce-info {
            background: #0d4400 !important;
            border-top-color: #0d4400;
        }

        #et_search_icon:hover,
        .mobile_menu_bar:before,
        .mobile_menu_bar:after,
        .et_toggle_slide_menu:after,
        .et-social-icon a:hover,
        .et_pb_sum,
        .et_pb_pricing li a,
        .et_pb_pricing_table_button,
        .et_overlay:before,
        .entry-summary p.price ins,
        .woocommerce div.product span.price,
        .woocommerce-page div.product span.price,
        .woocommerce #content div.product span.price,
        .woocommerce-page #content div.product span.price,
        .woocommerce div.product p.price,
        .woocommerce-page div.product p.price,
        .woocommerce #content div.product p.price,
        .woocommerce-page #content div.product p.price,
        .et_pb_member_social_links a:hover,
        .woocommerce .star-rating span:before,
        .woocommerce-page .star-rating span:before,
        .et_pb_widget li a:hover,
        .et_pb_filterable_portfolio .et_pb_portfolio_filters li a.active,
        .et_pb_filterable_portfolio .et_pb_portofolio_pagination ul li a.active,
        .et_pb_gallery .et_pb_gallery_pagination ul li a.active,
        .wp-pagenavi span.current,
        .wp-pagenavi a:hover,
        .nav-single a,
        .tagged_as a,
        .posted_in a {
            color: #0d4400
        }

        .et_pb_contact_submit,
        .et_password_protected_form .et_submit_button,
        .et_pb_bg_layout_light .et_pb_newsletter_button,
        .comment-reply-link,
        .form-submit .et_pb_button,
        .et_pb_bg_layout_light .et_pb_promo_button,
        .et_pb_bg_layout_light .et_pb_more_button,
        .woocommerce a.button.alt,
        .woocommerce-page a.button.alt,
        .woocommerce button.button.alt,
        .woocommerce button.button.alt.disabled,
        .woocommerce-page button.button.alt,
        .woocommerce-page button.button.alt.disabled,
        .woocommerce input.button.alt,
        .woocommerce-page input.button.alt,
        .woocommerce #respond input#submit.alt,
        .woocommerce-page #respond input#submit.alt,
        .woocommerce #content input.button.alt,
        .woocommerce-page #content input.button.alt,
        .woocommerce a.button,
        .woocommerce-page a.button,
        .woocommerce button.button,
        .woocommerce-page button.button,
        .woocommerce input.button,
        .woocommerce-page input.button,
        .et_pb_contact p input[type="checkbox"]:checked+label i:before,
        .et_pb_bg_layout_light.et_pb_module.et_pb_button {
            color: #0d4400
        }

        .footer-widget h4 {
            color: #0d4400
        }

        .et-search-form,
        .nav li ul,
        .et_mobile_menu,
        .footer-widget li:before,
        .et_pb_pricing li:before,
        blockquote {
            border-color: #0d4400
        }

        .et_pb_counter_amount,
        .et_pb_featured_table .et_pb_pricing_heading,
        .et_quote_content,
        .et_link_content,
        .et_audio_content,
        .et_pb_post_slider.et_pb_bg_layout_dark,
        .et_slide_in_menu_container,
        .et_pb_contact p input[type="radio"]:checked+label i:before {
            background-color: #0d4400
        }

        .container,
        .et_pb_row,
        .et_pb_slider .et_pb_container,
        .et_pb_fullwidth_section .et_pb_title_container,
        .et_pb_fullwidth_section .et_pb_title_featured_container,
        .et_pb_fullwidth_header:not(.et_pb_fullscreen) .et_pb_fullwidth_header_container {
            max-width: 1740px
        }

        .et_boxed_layout #page-container,
        .et_boxed_layout.et_non_fixed_nav.et_transparent_nav #page-container #top-header,
        .et_boxed_layout.et_non_fixed_nav.et_transparent_nav #page-container #main-header,
        .et_fixed_nav.et_boxed_layout #page-container #top-header,
        .et_fixed_nav.et_boxed_layout #page-container #main-header,
        .et_boxed_layout #page-container .container,
        .et_boxed_layout #page-container .et_pb_row {
            max-width: 1900px
        }

        a {
            color: #0d4400
        }

        #top-header,
        #et-secondary-nav li ul {
            background-color: #0d4400
        }

        .et_header_style_centered .mobile_nav .select_page,
        .et_header_style_split .mobile_nav .select_page,
        .et_nav_text_color_light #top-menu>li>a,
        .et_nav_text_color_dark #top-menu>li>a,
        #top-menu a,
        .et_mobile_menu li a,
        .et_nav_text_color_light .et_mobile_menu li a,
        .et_nav_text_color_dark .et_mobile_menu li a,
        #et_search_icon:before,
        .et_search_form_container input,
        span.et_close_search_field:after,
        #et-top-navigation .et-cart-info {
            color: #000000
        }

        .et_search_form_container input::-moz-placeholder {
            color: #000000
        }

        .et_search_form_container input::-webkit-input-placeholder {
            color: #000000
        }

        .et_search_form_container input:-ms-input-placeholder {
            color: #000000
        }

        #top-menu li a {
            font-size: 18px
        }

        body.et_vertical_nav .container.et_search_form_container .et-search-form input {
            font-size: 18px !important
        }

        #main-footer .footer-widget h4,
        #main-footer .widget_block h1,
        #main-footer .widget_block h2,
        #main-footer .widget_block h3,
        #main-footer .widget_block h4,
        #main-footer .widget_block h5,
        #main-footer .widget_block h6 {
            color: #0d4400
        }

        .footer-widget li:before {
            border-color: #0d4400
        }

        .woocommerce a.button.alt,
        .woocommerce-page a.button.alt,
        .woocommerce button.button.alt,
        .woocommerce button.button.alt.disabled,
        .woocommerce-page button.button.alt,
        .woocommerce-page button.button.alt.disabled,
        .woocommerce input.button.alt,
        .woocommerce-page input.button.alt,
        .woocommerce #respond input#submit.alt,
        .woocommerce-page #respond input#submit.alt,
        .woocommerce #content input.button.alt,
        .woocommerce-page #content input.button.alt,
        .woocommerce a.button,
        .woocommerce-page a.button,
        .woocommerce button.button,
        .woocommerce-page button.button,
        .woocommerce input.button,
        .woocommerce-page input.button,
        .woocommerce #respond input#submit,
        .woocommerce-page #respond input#submit,
        .woocommerce #content input.button,
        .woocommerce-page #content input.button,
        .woocommerce-message a.button.wc-forward,
        body .et_pb_button {
            background-color: #0d4400;
            border-color: #0d4400
        }

        .woocommerce.et_pb_button_helper_class a.button.alt,
        .woocommerce-page.et_pb_button_helper_class a.button.alt,
        .woocommerce.et_pb_button_helper_class button.button.alt,
        .woocommerce.et_pb_button_helper_class button.button.alt.disabled,
        .woocommerce-page.et_pb_button_helper_class button.button.alt,
        .woocommerce-page.et_pb_button_helper_class button.button.alt.disabled,
        .woocommerce.et_pb_button_helper_class input.button.alt,
        .woocommerce-page.et_pb_button_helper_class input.button.alt,
        .woocommerce.et_pb_button_helper_class #respond input#submit.alt,
        .woocommerce-page.et_pb_button_helper_class #respond input#submit.alt,
        .woocommerce.et_pb_button_helper_class #content input.button.alt,
        .woocommerce-page.et_pb_button_helper_class #content input.button.alt,
        .woocommerce.et_pb_button_helper_class a.button,
        .woocommerce-page.et_pb_button_helper_class a.button,
        .woocommerce.et_pb_button_helper_class button.button,
        .woocommerce-page.et_pb_button_helper_class button.button,
        .woocommerce.et_pb_button_helper_class input.button,
        .woocommerce-page.et_pb_button_helper_class input.button,
        .woocommerce.et_pb_button_helper_class #respond input#submit,
        .woocommerce-page.et_pb_button_helper_class #respond input#submit,
        .woocommerce.et_pb_button_helper_class #content input.button,
        .woocommerce-page.et_pb_button_helper_class #content input.button,
        body.et_pb_button_helper_class .et_pb_button,
        body.et_pb_button_helper_class .et_pb_module.et_pb_button {
            color: #ffffff
        }

        body .et_pb_bg_layout_light.et_pb_button:hover,
        body .et_pb_bg_layout_light .et_pb_button:hover,
        body .et_pb_button:hover {
            color: #0d4400 !important;
            background-color: rgba(255, 255, 255, 0);
            border-color: #0d4400 !important
        }

        .woocommerce a.button.alt:hover,
        .woocommerce-page a.button.alt:hover,
        .woocommerce button.button.alt:hover,
        .woocommerce button.button.alt.disabled:hover,
        .woocommerce-page button.button.alt:hover,
        .woocommerce-page button.button.alt.disabled:hover,
        .woocommerce input.button.alt:hover,
        .woocommerce-page input.button.alt:hover,
        .woocommerce #respond input#submit.alt:hover,
        .woocommerce-page #respond input#submit.alt:hover,
        .woocommerce #content input.button.alt:hover,
        .woocommerce-page #content input.button.alt:hover,
        .woocommerce a.button:hover,
        .woocommerce-page a.button:hover,
        .woocommerce button.button:hover,
        .woocommerce-page button.button:hover,
        .woocommerce input.button:hover,
        .woocommerce-page input.button:hover,
        .woocommerce #respond input#submit:hover,
        .woocommerce-page #respond input#submit:hover,
        .woocommerce #content input.button:hover,
        .woocommerce-page #content input.button:hover {
            color: #0d4400 !important;
            background-color: rgba(255, 255, 255, 0) !important;
            border-color: #0d4400 !important
        }

        @media only screen and (min-width:981px) {

            .et-fixed-header#top-header,
            .et-fixed-header#top-header #et-secondary-nav li ul {
                background-color: #0d4400
            }

            .et-fixed-header #top-menu a,
            .et-fixed-header #et_search_icon:before,
            .et-fixed-header #et_top_search .et-search-form input,
            .et-fixed-header .et_search_form_container input,
            .et-fixed-header .et_close_search_field:after,
            .et-fixed-header #et-top-navigation .et-cart-info {
                color: #000000 !important
            }

            .et-fixed-header .et_search_form_container input::-moz-placeholder {
                color: #000000 !important
            }

            .et-fixed-header .et_search_form_container input::-webkit-input-placeholder {
                color: #000000 !important
            }

            .et-fixed-header .et_search_form_container input:-ms-input-placeholder {
                color: #000000 !important
            }
        }

        @media only screen and (min-width:2175px) {
            .et_pb_row {
                padding: 43px 0
            }

            .et_pb_section {
                padding: 87px 0
            }

            .single.et_pb_pagebuilder_layout.et_full_width_page .et_post_meta_wrapper {
                padding-top: 130px
            }

            .et_pb_fullwidth_section {
                padding: 0
            }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins', Helvetica, Arial, Lucida, sans-serif
        }

        body,
        input,
        textarea,
        select {
            font-family: 'Poppins', Helvetica, Arial, Lucida, sans-serif
        }

        .et_pb_section_0_tb_footer.et_pb_section {
            padding-bottom: 20px;
            background-color: #0D4400 !important
        }

        .et_pb_row_0_tb_footer.et_pb_row {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
            padding-top: 0px;
            padding-bottom: 0px
        }

        .et_pb_image_0_tb_footer {
            margin-bottom: 20px !important;
            text-align: left;
            margin-left: 0
        }

        .et_pb_text_0_tb_footer.et_pb_text,
        .et_pb_text_5_tb_footer.et_pb_text,
        .et_pb_text_7_tb_footer.et_pb_text {
            color: #FFFFFF !important
        }

        .et_pb_text_0_tb_footer {
            font-size: 18px;
            margin-bottom: 30px !important
        }

        .et_pb_text_1_tb_footer h5 {
            font-family: 'Montserrat', Helvetica, Arial, Lucida, sans-serif;
            font-weight: 600;
            font-size: 25px;
            color: #FFFFFF !important
        }

        .et_pb_text_1_tb_footer {
            margin-bottom: 15px !important
        }

        .et_pb_social_media_follow_0_tb_footer li a.icon:before {
            font-size: 20px;
            line-height: 40px;
            height: 40px;
            width: 40px
        }

        .et_pb_social_media_follow_0_tb_footer li a.icon {
            height: 40px;
            width: 40px
        }

        .et_pb_text_4_tb_footer h4,
        .et_pb_text_2_tb_footer h4,
        .et_pb_text_3_tb_footer h4 {
            font-weight: 600;
            font-size: 25px;
            color: #FFFFFF !important
        }

        .et_pb_text_3_tb_footer,
        .et_pb_text_2_tb_footer,
        .et_pb_text_4_tb_footer {
            margin-bottom: 20px !important
        }

        .et_pb_sidebar_1_tb_footer.et_pb_widget_area,
        .et_pb_sidebar_1_tb_footer.et_pb_widget_area li,
        .et_pb_sidebar_1_tb_footer.et_pb_widget_area li:before,
        .et_pb_sidebar_1_tb_footer.et_pb_widget_area a,
        .et_pb_sidebar_0_tb_footer.et_pb_widget_area,
        .et_pb_sidebar_0_tb_footer.et_pb_widget_area li,
        .et_pb_sidebar_0_tb_footer.et_pb_widget_area li:before,
        .et_pb_sidebar_0_tb_footer.et_pb_widget_area a {
            font-size: 18px;
            color: #FFFFFF !important
        }

        .et_pb_sidebar_0_tb_footer.et_pb_widget_area,
        .et_pb_sidebar_1_tb_footer.et_pb_widget_area {
            border-right-color: RGBA(255, 255, 255, 0)
        }

        .et_pb_text_5_tb_footer {
            line-height: 1.4em;
            font-size: 18px;
            line-height: 1.4em;
            margin-bottom: 30px !important
        }

        .et_pb_row_1_tb_footer.et_pb_row {
            padding-top: 0px !important;
            padding-top: 0px
        }

        .et_pb_text_7_tb_footer {
            font-size: 18px
        }

        @media only screen and (max-width:980px) {
            .et_pb_image_0_tb_footer .et_pb_image_wrap img {
                width: auto
            }

            .et_pb_sidebar_0_tb_footer.et_pb_widget_area,
            .et_pb_sidebar_1_tb_footer.et_pb_widget_area {
                border-right-color: RGBA(255, 255, 255, 0)
            }

            .et_pb_row_1_tb_footer.et_pb_row {
                padding-top: 20px !important;
                padding-top: 20px !important
            }
        }

        @media only screen and (max-width:767px) {
            .et_pb_image_0_tb_footer .et_pb_image_wrap img {
                width: auto
            }

            .et_pb_sidebar_0_tb_footer.et_pb_widget_area,
            .et_pb_sidebar_1_tb_footer.et_pb_widget_area {
                border-right-color: RGBA(255, 255, 255, 0)
            }

            .et_pb_row_1_tb_footer.et_pb_row {
                padding-top: 20px !important;
                padding-top: 20px !important
            }
        }

        div.et_pb_section.et_pb_section_0 {
            background-image: url({{ URL::asset('assets/uploads/2022/03/shutterstock_1877216707.jpg') }}) !important
        }

        .et_pb_text_0 h1 {
            font-weight: 600;
            font-size: 40px;
            color: #FFFFFF !important
        }

        .et_pb_section_1.et_pb_section {
            background-color: rgba(238, 238, 238, 0) !important
        }

        @media only screen and (max-width:980px) {
            .et_pb_section_0.et_pb_section {
                padding-top: 30px;
                padding-bottom: 30px
            }

            .et_pb_text_0 h1 {
                font-size: 30px
            }
        }

        @media only screen and (max-width:767px) {
            .et_pb_section_0.et_pb_section {
                padding-top: 30px;
                padding-bottom: 30px
            }

            .et_pb_text_0 h1 {
                font-size: 25px
            }
        }
        .modal-content textarea.form-control{
            border-radius: 20px;
        }
    </style>
    <div
        class="page-template-default theme-Divi et-tb-has-template et-tb-has-footer woocommerce-account woocommerce-page woocommerce-js et_button_no_icon et_pb_button_helper_class et_fixed_nav et_show_nav et_secondary_nav_enabled et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_left et_cover_background et_pb_gutter windows et_pb_gutters3 et_pb_pagebuilder_layout et_no_sidebar et_divi_theme et-db dokan-theme-Divi customize-support chrome">
        <div id="main-content">
            <article id="post-14" class="post-14 page type-page status-publish hentry">
                <div class="entry-content">
                    <div class="et-l et-l--post">
                        <div class="et_builder_inner_content et_pb_gutters3">
                            <div class="et_pb_section et_pb_section_0 et_pb_with_background et_section_regular">
                                <div class="et_pb_row et_pb_row_0">
                                    <div
                                        class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                        <div
                                            class="et_pb_module et_pb_text et_pb_text_0  et_pb_text_align_left et_pb_bg_layout_light">
                                            <div class="et_pb_text_inner">
                                                <h1>My Orders</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @if(session()->has('error'))
                            <div class="alert alert-success">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
										@endif
										@if ($errors->any())
										@foreach ($errors->all() as $error)
										<div class="alert alert-danger alert-block">

												<strong>{{ $error }}</strong>

										</div>
										@endforeach
										@endif
                            <div class="et_pb_section et_pb_section_1 et_pb_with_background et_section_regular">
                                <div class="et_pb_row et_pb_row_1">
                                    <div
                                        class="et_pb_column et_pb_column_4_4 et_pb_column_1  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                        <div
                                            class="et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_left et_pb_bg_layout_light">
                                            <div class="et_pb_text_inner">
                                                <div class="woocommerce">
                                                    <nav class="woocommerce-MyAccount-navigation">
                                                        <ul>
                                                            <li
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active {{ Request::route()->getName() == 'show_brokers' ? 'active' : '' }}">
                                                                <a href="{{route('show_brokers')}}">Broker</a>
                                                            </li>
                                                            <li
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                                                <a href="{{route('edit-account')}}">Account details</a>
                                                            </li>
                                                            <li
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                                                <a href="{{route('MyOrders')}}">Orders</a>
                                                            </li>
                                                            <li
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                                                <a href="{{route('PendingOrders')}}">Pending Orders</a>
                                                            </li>
                                                            {{-- <li
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
                                                                <a href="my-account/downloads/">Downloads</a>
                                                            </li>
                                                            <li
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                                                                <a href="my-account/edit-address/">Addresses</a>
                                                            </li> --}}
                                                            <li
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
                                                                <a href="{{ route('logout') }}"
                                                                    onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">LogOut</a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                    <div class="woocommerce-MyAccount-content">
                                                        <div class="woocommerce-notices-wrapper"></div>


                                                            <div class="noRecord">
                                                                <article class="dokan-orders-area">
                                                                    <ul class="list-inline order-statuses-filter">
                                                                       <li class="active">
                                                                          <a >
                                                                          All ({{$countBroker??0}})
                                                                          </a>
                                                                       </li>
                                                                       {{-- <li>
                                                                          <a href="dashboard/orders/?order_status=wc-completed">
                                                                          Completed (0)
                                                                          </a>
                                                                       </li>
                                                                       <li>
                                                                          <a href="dashboard/orders/?order_status=wc-processing">
                                                                          Processing (0)
                                                                          </a>
                                                                       </li>
                                                                       <li>
                                                                          <a href="dashboard/orders/?order_status=wc-on-hold">
                                                                          On-hold (0)
                                                                          </a>
                                                                       </li>
                                                                       <li>
                                                                          <a href="dashboard/orders/?order_status=wc-pending">
                                                                          Pending (0)
                                                                          </a>
                                                                       </li>
                                                                       <li>
                                                                          <a href="dashboard/orders/?order_status=wc-cancelled">
                                                                          Cancelled (0)
                                                                          </a>
                                                                       </li>
                                                                       <li>
                                                                          <a href="dashboard/orders/?order_status=wc-refunded">
                                                                          Refunded (0)
                                                                          </a>
                                                                       </li>
                                                                       <li>
                                                                          <a href="dashboard/orders/?order_status=wc-failed">
                                                                          Failed (0)
                                                                          </a>
                                                                       </li> --}}
                                                                    </ul>
                                                                    @if(isset($show_data))
                                                                    <td data-title="S.no" class="column-thumb">
                                                                       {{$show_data}}
                                                                    </td>
                                                                    @else
                                                                    @if(!$brokers->isEmpty())
                                                                    @if(Session::has('success'))
                                                                          <div class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
                                                                      @endif
                                                                    @if(Session::has('error'))
                                                                          <div class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span><em> {!! session('error') !!}</em></div>
                                                                      @endif
                                                                      <form method="GET" action="{{Route('assignbroker')}}">
                                                                      <table class="dokan-table dokan-table-striped product-listing-table dokan-inline-editable-table" id="dokan-product-list-table">
                                                                      <thead>

                                                                         <tr>
                                                                          @if(isset($brokers) && isset($customer_condition) && $customer_condition == $brokers->first()->id)
                                                                          @else
                                                                          <th>Select</th>
                                                                          @endif
                                                                            <th>S.No</th>
                                                                            <th>Name</th>
                                                                            <th>Email</th>
                                                                            {{-- <th>Status</th> --}}
                                                                            <th>Phone Number</th>
                                                                            <th>City</th>
                                                                            <th>State</th>
                                                                            <th>Country</th>
                                                                            <th>Address</th>
                                                                            @if(isset($brokers) && isset($customer_condition) && $customer_condition == $brokers->first()->id)
                                                                            <th>Status</th>
                                                                            <th>Action</th>
                                                                            {{-- <th>Broker Percentage</th> --}}
                                                                            @else
                                                                              @endif

                                                                         </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                          @php
                                                                              $counter = 1;
                                                                          @endphp
                                                                       @foreach($brokers as $broker)
                                                                         <tr class="">
                                                                          @if(isset($customer_condition) && $customer_condition == $broker->id)
                                                                          @else
                                                                          <th class="dokan-product-select check-column">
                                                                              <label for="cb-select-432"></label>
                                                                              <input class="cb-select-items dokan-checkbox" type="checkbox" data-product-name="Testing Products" name="id[]" value="{{$broker->id}}">
                                                                          </th>
                                                                          @endif
                                                                            <td data-title="S.no" class="column-thumb">
                                                                               {{$counter++}}
                                                                            </td>
                                                                            <td data-title="name" class="column-primary">
                                                                              {{$broker->first_name}} {{$broker->last_name}}
                                                                            </td>
                                                                            <td data-title="email" class="column-primary">
                                                                              {{$broker->email}}
                                                                            </td>
                                                                            <td data-title="phone" class="column-primary">
                                                                              {{$broker->phone_no}}
                                                                            </td>
                                                                            <td data-title="city" class="column-primary">
                                                                              {{$broker->city}}
                                                                            </td>
                                                                            <td data-title="state" class="column-primary">
                                                                              {{$broker->state}}
                                                                            </td>
                                                                            <td data-title="country" class="column-primary">
                                                                              {{$broker->country}}
                                                                            </td>
                                                                            <td data-title="address" class="column-primary">
                                                                              {{$broker->address}}
                                                                            </td>
                                                                            @if(isset($customer_condition) && $customer_condition == $broker->id)
                                                                            <td data-title="address" class="column-primary">
                                                                                This Broker Assigned by admin
                                                                              </td>
                                                                              <td data-title="address" class="column-primary">
                                                                                  <a href="{{route('vendor_remove_broker',['id'=>$broker->id])}}" class="dokan-btn dokan-btn-theme dokan-add-new-product">Cancel</a>
                                                                              </td>

                                                                              @else
                                                                            @endif
                                                                          {{-- @if(isset($customer_condition) && $customer_condition == $broker->id)
                                                                          @else
                                                                          <th class="dokan-product-select check-column">
                                                                              <label for="cb-select-432"></label>
                                                                              <input class="cb-select-items dokan-checkbox" type="checkbox" data-product-name="Testing Products" name="id[]" value="{{$broker->id}}">
                                                                          </th>
                                                                          @endif --}}
                                                                            <td data-title="address" class="column-primary">

                                                                            <td class="diviader"></td>
                                                                         </tr>
                                                                         @endforeach
                                                                      </tbody>
                                                                   </table>
                                                                    @else
                                                                    @php
                                                                      $counter;
                                                                  @endphp
                                                                    <div class="dokan-error">
                                                                       No Brokers found
                                                                    </div>
                                                                    @endif

                                                                 </article>
                                                                 @if(isset($customer_condition) && $customer_condition == $broker->id)
                                                                 @else
                                                                 <span class="dokan-add-product-link">
                                                                     <button type="submit" class="dokan-btn dokan-btn-theme dokan-add-new-product float-right">Send Request</button>

                                                                  </span>
                                                                  @endif
                                                              </form>
                                                              @endif
                                                                  <br>
                                                              </div>
                                                            </div>
                                                         </div>
                                                      </article>
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


    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection
