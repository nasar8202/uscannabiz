@extends('front.layout.app')
@section('title', 'Customer')
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
                                                <h1>My Account</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
                                                                <a href="{{route('edit-account')}}">Dashboard</a>
                                                            </li>
                                                            <li
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                                                <a href="/user/my-orders">Orders</a>
                                                            </li>
                                                            <li
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
                                                                <a href="my-account/downloads/">Downloads</a>
                                                            </li>
                                                            <li
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                                                                <a href="my-account/edit-address/">Addresses</a>
                                                            </li>
                                                            <li
                                                                class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                                                <a href="{{route('edit-account')}}">Account details</a>
                                                            </li>
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

                                                        <form action = "{{url('user/addCustomerAddress')}}" method="post">
                                                            @csrf
                                                            <h3>Shipping address</h3>
                                                            <div class="woocommerce-address-fields">

                                                                <div class="woocommerce-address-fields__field-wrapper">
                                                                    <p class="form-row form-row-first validate-required"
                                                                        id="shipping_first_name_field" data-priority="10">
                                                                        <label for="shipping_first_name"
                                                                            class="">First name&nbsp;<abbr
                                                                                class="required"
                                                                                title="required">*</abbr></label><span
                                                                            class="woocommerce-input-wrapper"><input
                                                                                type="text" class="input-text "
                                                                                id="first_name" placeholder=""
                                                                                name="first_name"
                                                                                autocomplete="given-name"></span></p>
                                                                    <p class="form-row form-row-last validate-required"
                                                                        id="shipping_last_name_field" data-priority="20">
                                                                        <label for="shipping_last_name" class="">Last
                                                                            name&nbsp;<abbr class="required"
                                                                                title="required">*</abbr></label><span
                                                                            class="woocommerce-input-wrapper"><input
                                                                                type="text" class="input-text "
                                                                                name="last_name"
                                                                                id="last_name" placeholder=""

                                                                                autocomplete="family-name"></span></p>

                                                                                <p class="form-row form-row-first validate-required"
                                                                        id="shipping_first_name_field" data-priority="10">
                                                                        <label for="shipping_first_name"
                                                                            class="">Phone No.&nbsp;<abbr
                                                                                class="required"
                                                                                title="required">*</abbr></label><span
                                                                            class="woocommerce-input-wrapper"><input
                                                                                type="text" class="input-text "
                                                                                id="phone_no_code" placeholder=""
                                                                                name="phone_no_code"
                                                                                autocomplete="given-name"></span></p>
                                                                    <p class="form-row form-row-last validate-required"
                                                                        id="shipping_last_name_field" data-priority="20">
                                                                        <label for="shipping_last_name" class="">
                                                                            Title&nbsp;<abbr class="required"
                                                                                title="required">*</abbr></label><span
                                                                            class="woocommerce-input-wrapper"><input
                                                                                type="text" class="input-text "
                                                                                name="title"
                                                                                id="title" placeholder=""

                                                                                autocomplete="family-name"></span></p>

                                                                    <p class="form-row form-row-wide"
                                                                        id="shipping_company_field" data-priority="30">
                                                                        <label for="shipping_company" class="">Company
                                                                            name&nbsp;<span
                                                                                class="optional">(optional)</span></label><span
                                                                            class="woocommerce-input-wrapper"><input
                                                                                type="text" class="input-text "
                                                                                name="company_name"
                                                                                id="company_name" placeholder=""

                                                                                autocomplete="organization"></span></p>
                                                                    <p class="form-row form-row-wide address-field update_totals_on_change validate-required"
                                                                        id="shipping_country_field" data-priority="40">
                                                                        <label for="shipping_country" class="">Country
                                                                            / Region&nbsp;<abbr class="required"
                                                                                title="required">*</abbr></label><span
                                                                            class="woocommerce-input-wrapper"><select
                                                                            name="country" id="country_e"
                                                                                class="country_to_state country_select select2-hidden-accessible"
                                                                                autocomplete="country"
                                                                                data-placeholder="Select a country / region…"
                                                                                data-label="Country / Region" tabindex="-1"
                                                                                aria-hidden="true">
                                                                                <option value="">Select a country /
                                                                                    region…</option>
                                                                                    @foreach($countries as $country)
                                                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                                                    @endforeach

                                                                            </select><span
                                                                                class="select2 select2-container select2-container--default"
                                                                                dir="ltr" style="width: 100%;"><span
                                                                                    class="selection"><span
                                                                                        class="select2-selection select2-selection--single"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        tabindex="0"
                                                                                        aria-label="Country / Region"
                                                                                        role="combobox"><span
                                                                                            class="select2-selection__rendered"
                                                                                            id="select2-shipping_country-container"
                                                                                            role="textbox"
                                                                                            aria-readonly="true"><span
                                                                                                class="select2-selection__placeholder">Select
                                                                                                a country /
                                                                                                region…</span></span><span
                                                                                            class="select2-selection__arrow"
                                                                                            role="presentation"><b
                                                                                                role="presentation"></b></span></span></span><span
                                                                                    class="dropdown-wrapper"
                                                                                    aria-hidden="true"></span></span><noscript><button
                                                                                    type="submit"
                                                                                    name="woocommerce_checkout_update_totals"
                                                                                    value="Update country / region">Update
                                                                                    country /
                                                                                    region</button></noscript></span></p>
                                                                    <p class="form-row form-row-wide address-field validate-required"
                                                                        id="shipping_address_1_field" data-priority="50">
                                                                        <label for="shipping_address_1"
                                                                            class="">Street address&nbsp;<abbr
                                                                                class="required"
                                                                                title="required">*</abbr></label><span
                                                                            class="woocommerce-input-wrapper"><input
                                                                                type="text" class="input-text "
                                                                                name="address"
                                                                                placeholder="House number and street name"
                                                                                value=""
                                                                                autocomplete="address-line1"></span></p>


                                                                    <p class="form-row form-row-wide address-field validate-required validate-state"
                                                                        id="shipping_state_field" data-priority="80">
                                                                        <label for="shipping_state"
                                                                            class="">State&nbsp;<abbr
                                                                                class="required"
                                                                                title="required">*</abbr></label><span
                                                                            class="woocommerce-input-wrapper"><select
                                                                            name="state" id="state_e"
                                                                                class="state_select select2-hidden-accessible"
                                                                                autocomplete="address-level1"
                                                                                data-placeholder="Select an option…"
                                                                                data-input-classes="" data-label="State"
                                                                                tabindex="-1" aria-hidden="true">
                                                                                <option value="">Select an option…
                                                                                </option>

                                                                            </select><span
                                                                                class="select2 select2-container select2-container--default"
                                                                                dir="ltr" style="width: 100%;"><span
                                                                                    class="selection"><span
                                                                                        class="select2-selection select2-selection--single"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        tabindex="0" aria-label="State"
                                                                                        role="combobox"><span
                                                                                            class="select2-selection__rendered"
                                                                                            id="select2-shipping_state-container"
                                                                                            role="textbox"
                                                                                            aria-readonly="true"><span
                                                                                                class="select2-selection__placeholder">Select
                                                                                                an
                                                                                                option…</span></span><span
                                                                                            class="select2-selection__arrow"
                                                                                            role="presentation"><b
                                                                                                role="presentation"></b></span></span></span><span
                                                                                    class="dropdown-wrapper"
                                                                                    aria-hidden="true"></span></span></span>
                                                                    </p>

                                                                    <p class="form-row form-row-wide address-field validate-required validate-state"
                                                                        id="shipping_state_field" data-priority="80">
                                                                        <label for="shipping_state"
                                                                            class="">City&nbsp;<abbr
                                                                                class="required"
                                                                                title="required">*</abbr></label><span
                                                                            class="woocommerce-input-wrapper"><select
                                                                            name="city" id="city_e"
                                                                                class="state_select select2-hidden-accessible"
                                                                                autocomplete="address-level1"
                                                                                data-placeholder="Select an option…"
                                                                                data-input-classes="" data-label="State"
                                                                                tabindex="-1" aria-hidden="true">
                                                                                <option value="">Select an option…
                                                                                </option>

                                                                            </select><span
                                                                                class="select2 select2-container select2-container--default"
                                                                                dir="ltr" style="width: 100%;"><span
                                                                                    class="selection"><span
                                                                                        class="select2-selection select2-selection--single"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false"
                                                                                        tabindex="0" aria-label="State"
                                                                                        role="combobox"><span
                                                                                            class="select2-selection__rendered"
                                                                                            id="select2-shipping_state-container"
                                                                                            role="textbox"
                                                                                            aria-readonly="true"><span
                                                                                                class="select2-selection__placeholder">Select
                                                                                                an
                                                                                                option…</span></span><span
                                                                                            class="select2-selection__arrow"
                                                                                            role="presentation"><b
                                                                                                role="presentation"></b></span></span></span><span
                                                                                    class="dropdown-wrapper"
                                                                                    aria-hidden="true"></span></span></span>
                                                                    </p>

                                                                    <p class="form-row form-row-wide address-field validate-required validate-postcode"
                                                                        id="shipping_postcode_field" data-priority="90">
                                                                        <label for="shipping_postcode" class="">ZIP
                                                                            Code&nbsp;<abbr class="required"
                                                                                title="required">*</abbr></label><span
                                                                            class="woocommerce-input-wrapper"><input
                                                                                type="text" class="input-text "
                                                                                name="zip_code" id="zip_code_e" placeholder=""
                                                                                value=""
                                                                                autocomplete="postal-code"></span></p>
                                                                </div>


                                                                <p>
                                                                    <button type="submit" class="button"
                                                                        name="save_address" value="Save address">Save
                                                                        address</button>
                                                                    <input type="hidden"
                                                                        id="woocommerce-edit-address-nonce"
                                                                        name="woocommerce-edit-address-nonce"
                                                                        value="de5e19be99"><input type="hidden"
                                                                        name="_wp_http_referer" value="shipping"> <input
                                                                        type="hidden" name="action"
                                                                        value="edit_address">
                                                                </p>
                                                            </div>

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
            </article>
        </div>
    </div>

    <script src="{{asset('front/js/location.js')}}"></script>
    <script>

        $('document').ready(function () {
            $(".phone_no").intlTelInput({
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
            });
            // $('.country_code').on('click',function () {
            //     $('#country_code').val($(this).data('code'));
            // });
            //
            // $('.address_country_code').on('click',function () {
            //     $('input[name="phone_no_code"]').val($(this).data('code'));
            // });
            // $('.address_country_code_e').on('click',function () {
            //     $('input[name="phone_no_code_e"]').val($(this).data('code'));
            // });
            $("#phone_no").intlTelInput("setNumber", '{{Auth::user()->customers->country_code.Auth::user()->customers->phone_no}}');


            $('.orderDetailBtn').on('click',function () {
                $order_id = $(this).data('order_id');

                $.ajax({
                    url: "{{url('user/getOrderDetail')}}/"+$order_id,
                    method: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res){
                        // console.log(res);
                        var html = '';
                        let total_amount = parseInt(res.total_amount)+parseInt(res.shipping_cost);
                        html += `<div class="alert alert-success" role="alert">
                            <span>Order# ${res.order_no}</span>
                            <span>Total: $${total_amount}</span>
                            <span>Placed on ${new Date(res.created_at).toDateString()}</span>
                            <span style="text-transform: capitalize" >Payment Method: ${res.payment.pay_method_name}</span>
                            <span>Ship to: ${res.customer.first_name}</span>
                        </div>
                        <table class="table orderTable">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>`

                            res.order_items.map(function (item) {
                               html += `<tr>
                                    <td><p><img src="images/cart-item1.jpg" alt="">${item.product.product_name}</p></td>
                                    <td><p>$ ${item.product_per_price}</p></td>
                                    <td><p>${item.product_qty}</p></td>
                                    <td><p>$ ${item.product_per_price*item.product_qty}</p></td>
                                    <td>
                                    <form action="{{ url('cart/store') }}/${item.product.id}" method="POST" id="cart-form">
                                        {{ csrf_field() }}
                                    <button type="submit" href="#" class="btnStyle">Reorder</button>
                                    </form>
                                    </td>
                                   </tr>`
                            });
                           html += `</tbody>
                                    </table>`;
                        $('#OrderDetailModalBody').html(html);
                        $('#OrderDetailModal').modal('show');

                    }
                })
            });


            //Edit Address
            $('.editAddress').on('click',function () {
                $id = $(this).data('id');

                $.ajax({
                    url: "{{url('user/getAddressDetail')}}/"+$id,
                    method: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res){
                        console.log(res);

                        $('#add_id').val(res.customer_address.id);
                        $('#first_name_e').val(res.customer_address.first_name);
                        $('#last_name_e').val(res.customer_address.last_name);
                        $('#phone_no_e').val(res.customer_address.phone_no);
                        $("#phone_no_e").intlTelInput("setNumber", res.customer_address.phone_no);
                        $('#title_e').val(res.customer_address.title);
                        $('#address_e').val(res.customer_address.address);
                        $("#city_e").append(new Option(res.city.name, res.city.id));

                        $('#company_name_e').val(res.customer_address.company_name);
                        $('#zip_code_e').val(res.customer_address.zip_code);
                        $('#country_e').val(res.customer_address.country);
                        // $('#country_e option[value="res.country"]').attr("selected", "selected");


                        $("#state_e").append(new Option(res.state.name, res.state.id));
                        $('#shipping_billing_e').val(res.customer_address.shipping_billing);

                        $('#editAddressModal').modal('show');

                    }
                })
            });
        });
    </script>
    <script>
        $(document).on('click', ".add_to_wishlist", function(){
            let el = $(this);
            $.post(base_url + '/user/add-wishlist', {
                "product_id": el.data('product'),
                "customer_id": el.data('customer'),
                "_token": $("meta[name=csrf-token]").attr('content')
            }, function(d){
                if(d.status){
                    el.addClass('wishlist-added');
                    el.addClass('remove_to_wishlist');
                    el.removeClass('add_to_wishlist');
                    el.attr('data-wishlist', d.data.id);
                    el.css('color', 'red');
                    toastr.success('Whishlist Added Successfully!', 'Success!')
                } else {
                    toastr.error(d.message, 'Error!')
                }
            })
        })

        $(document).on('click', ".remove_to_wishlist", function(){
            let el = $(this);
            $.post(base_url + '/user/add-wishlist', {
                "product_id": el.data('product'),
                "customer_id": el.data('customer'),
                "_token": $("meta[name=csrf-token]").attr('content'),
                "remove": 1,
                "wishlist_id": el.attr('data-wishlist')
            }, function(d){
                if(d.status){
                    el.removeClass('remove_to_wishlist');
                    el.removeClass('wishlist-added');
                    el.addClass('add_to_wishlist')
                    el.css('color', '');
                    toastr.success(d.message, 'Success!');
                    location.reload();

                } else {
                    toastr.error(d.message, 'Error!')
                }
            })
        })

        $('document').ready(function () {

            $("#country_e").on("change", function(ev) {
                var countryId = $(this).val();
                if(countryId != ''){
                    $("#state_e option").remove();
                    $("#cities_e option").remove();

                    $.ajax({
                        url: '{{url("user/getStates")}}/countryId/'+countryId,
                        type: 'get',
                        dataType: 'json',
                        success: function (data) {
                            if(data.tp == 1){
                                $.each(data['result'], function(key, val) {
                                    var option = $('<option />');
                                    option.attr('value', val.id).text(val.name);
                                    $('#state_e').append(option);
                                });
                                $("#state_e").prop("disabled",false);
                            }
                            else{
                                alert(data.msg);
                            }
                        }
                    });
                }
                else{
                    $("#state_e option").remove();
                }
            });

            $("#state_e").on("change", function(ev) {
                var stateId = $(this).val();
                if(stateId != ''){
                    $("#cities_e option").remove();

                    $.ajax({
                        url: '{{url("user/getCities")}}/stateId/'+stateId,
                        type: 'get',
                        dataType: 'json',
                        success: function (data) {
                            if(data.tp == 1){
                                $.each(data['result'], function(key, val) {
                                    var option = $('<option />');
                                    option.attr('value', val.id).text(val.name);
                                    $('#city_e').append(option);
                                });
                                $("#city_e").prop("disabled",false);
                            }
                        }
                    });
                }
                else{
                    $("#states_e option:gt(0)").remove();
                }
            });

            $(".formStyle").submit(function() {
                $("#country_code").val($("#phone_no").intlTelInput("getSelectedCountryData").dialCode);
            });

            $("#addAddressForm").submit(function() {
                $("input[name='phone_no_code']").val($("input[name='add_phone_no']").intlTelInput("getSelectedCountryData").dialCode);
            });

            $("#updateAddress").submit(function() {
                $("input[name='phone_no_code_e']").val($("#phone_no_e").intlTelInput("getSelectedCountryData").dialCode);
            });
        })
    </script>


@endsection
