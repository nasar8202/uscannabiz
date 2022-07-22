@php
use Illuminate\Support\Facades\Request;
@endphp
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport" />

      <link rel="pingback" href="xmlrpc.php">
      <script type="text/javascript">
         document.documentElement.className = 'js';
      </script>
      <link rel="icon" href="https://webprojectmockup.com/wp/uscannabiz/wp-content/uploads/2022/03/cropped-Uscannazon4-1-192x192.png" sizes="192x192" />

      <title>Us Cannazon | Market Place | @yield('title', '')</title>
      <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
      <meta name="robots" content="max-image-preview:large">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript">
         let jqueryParams=[],jQuery=function(r){return jqueryParams=[...jqueryParams,r],jQuery},$=function(r){return jqueryParams=[...jqueryParams,r],$};window.jQuery=jQuery,window.$=jQuery;let customHeadScripts=!1;jQuery.fn=jQuery.prototype={},$.fn=jQuery.prototype={},jQuery.noConflict=function(r){if(window.jQuery)return jQuery=window.jQuery,$=window.jQuery,customHeadScripts=!0,jQuery.noConflict},jQuery.ready=function(r){jqueryParams=[...jqueryParams,r]},$.ready=function(r){jqueryParams=[...jqueryParams,r]},jQuery.load=function(r){jqueryParams=[...jqueryParams,r]},$.load=function(r){jqueryParams=[...jqueryParams,r]},jQuery.fn.ready=function(r){jqueryParams=[...jqueryParams,r]},$.fn.ready=function(r){jqueryParams=[...jqueryParams,r]};
      </script>
      <link rel="stylesheet" type="text/css"href="{{ URL::asset('assets/css/divi-style-parent-inline-inline-css.css') }}">
      <link rel="stylesheet" type="text/css"href="{{ URL::asset('assets/css/divi-dynamic-critical-inline-css.css') }}">
      <!-- <link rel="stylesheet" type="text/css"href="{{ URL::asset('assets/css/et-builder-googlefonts-inline.css') }}"> -->
      <!-- <link rel="stylesheet" type="text/css"href="{{ URL::asset('assets/css/et-core-unified-tb-70-34-cached-inline-styles.css') }}"> -->
      <!-- <link rel="stylesheet" type="text/css"href="{{ URL::asset('assets/css/global-styles-inline-css.css') }}"> -->
      <link rel="stylesheet" id="dashicons-css"href="{{ URL::asset('assets/wp-includes/css/dashicons.min.css?ver=5.9.2') }}" type="text/css" media="all">
      <link rel="stylesheet" id="wc-blocks-vendors-style-css"href="{{ URL::asset('assets/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-vendors-style.css?ver=6.9.0') }}" type="text/css" media="all">
      <link rel="stylesheet" id="wc-blocks-style-css"href="{{ URL::asset('assets/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks-style.css?ver=6.9.0') }}" type="text/css" media="all">
      <link rel="stylesheet" id="simple-sitemap-css-css"href="{{ URL::asset('assets/plugins/simple-sitemap/lib/assets/css/simple-sitemap.css?ver=3.5.5') }}" type="text/css" media="all">
      <link rel="stylesheet" id="woocommerce-layout-css"href="{{ URL::asset('assets/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=6.3.1') }}" type="text/css" media="all">
      <link rel="stylesheet" id="woocommerce-smallscreen-css"href="{{ URL::asset('assets/plugins/woocommerce/assets/css/woocommerce-smallscreen.css?ver=6.3.1') }}" type="text/css" media="only screen and (max-width: 768px)">
      <link rel="stylesheet" id="woocommerce-general-css"href="{{ URL::asset('assets/plugins/woocommerce/assets/css/woocommerce.css?ver=6.3.1') }}" type="text/css" media="all">
      <style id="woocommerce-inline-inline-css" type="text/css">.woocommerce form .form-row .required { visibility: visible; }</style>
      <link rel="stylesheet" id="dokan-style-css"href="{{ URL::asset('assets/plugins/dokan-lite/assets/css/style.css?ver=1647983870') }}" type="text/css" media="all">
      <!--Zeveloper-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" defer />
      <!--Zeveloper-->
      <link rel="stylesheet" id="dokan-fontawesome-css"href="{{ URL::asset('assets/plugins/dokan-lite/assets/vendors/font-awesome/font-awesome.min.css?ver=3.4.1') }}" type="text/css" media="all">
      
      <link rel="stylesheet" id="divi-style-css"href="{{ URL::asset('assets/themes/Divi-child/style.css?ver=4.15.1') }}" type="text/css" media="all">
      <link rel="stylesheet" id="divi-style-css"href="{{ URL::asset('assets/style/style.css') }}" type="text/css" media="all">
      <script type="text/javascript" src="{{ URL::asset('assets/wp-includes/js/jquery/jquery.min.js?ver=3.6.0" id="jquery-core-js')}}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2')}}" id="jquery-migrate-js"></script>
      <script type="text/javascript" id="jquery-js-after">
         jqueryParams.length&&$.each(jqueryParams,function(e,r){if("function"==typeof r){var n=String(r);n.replace("$","jQuery");var a=new Function("return "+n)();$(document).ready(a)}});
      </script>
      <script type="text/javascript" src="{{ URL::asset('assets/plugins/dokan-lite/assets/vendors/magnific/jquery.magnific-popup.min.js?ver=3.4.1')}}" id="dokan-popup-js"></script>
      <script type="text/javascript" id="dokan-i18n-jed-js-extra">
         /* <![CDATA[ */
         var dokan = {"ajaxurl":"https:\/\/webprojectmockup.com\/wp\/uscannabizhtml\/wp-admin\/admin-ajax.php","nonce":"21e97816cc","ajax_loader":"https:\/\/webprojectmockup.com\/wp\/uscannabizhtml\/wp-content\/plugins\/dokan-lite\/assets\/images\/ajax-loader.gif","seller":{"available":"Available","notAvailable":"Not Available"},"delete_confirm":"Are you sure?","wrong_message":"Something went wrong. Please try again.","vendor_percentage":"90","commission_type":"percentage","rounding_precision":"6","mon_decimal_point":".","product_types":["simple"],"loading_img":"https:\/\/webprojectmockup.com\/wp\/uscannabizhtml\/wp-content\/plugins\/dokan-lite\/assets\/images\/loading.gif","store_product_search_nonce":"5f075d9a26","i18n_download_permission":"Are you sure you want to revoke access to this download?","i18n_download_access":"Could not grant access - the user may already have permission for this file or billing email is not set. Ensure the billing email is set, and the order has been saved.","maximum_tags_select_length":"-1","rest":{"root":"https:\/\/webprojectmockup.com\/wp\/uscannabizhtml\/wp-json\/","nonce":"e4a6c761f3","version":"dokan\/v1"},"api":null,"libs":[],"routeComponents":{"default":null},"routes":[],"urls":{"assetsUrl":"https:\/\/webprojectmockup.com\/wp\/uscannabizhtml\/wp-content\/plugins\/dokan-lite\/assets"}};
         /* ]]> */
      </script>

      <script type="text/javascript" src="{{ URL::asset('assets/plugins/dokan-lite/assets/vendors/i18n/jed.js?ver=3.4.1')}}" id="dokan-i18n-jed-js"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/plugins/dokan-lite/assets/vendors/sweetalert2/sweetalert2.all.min.js?ver=1647983870')}}" id="dokan-sweetalert2-js"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/plugins/dokan-lite/assets/js/helper.js?ver=1647983870')}}" id="dokan-util-helper-js"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/themes/Divi-child/ds-script.js?ver=5.9.2')}}" id="ds-theme-script-js"></script>
      <!-- Starting: WooCommerce Conversion Tracking (https://wordpress.org/plugins/woocommerce-conversion-tracking/) -->
      <!-- End: WooCommerce Conversion Tracking Codes -->
      <noscript>
         <style>.woocommerce-product-gallery{ opacity: 1 !important; }</style>
      </noscript>
      <link rel="stylesheet" id="et-core-unified-34-cached-inline-styles"href="{{ URL::asset('assets/et-cache/34/et-core-unified-34.min.css?ver=1655922750') }}">

   </head>
   <body class="home page-template-default page page-id-34 theme-Divi et-tb-has-template et-tb-has-footer woocommerce-no-js et_button_no_icon et_pb_button_helper_class et_fixed_nav et_show_nav et_secondary_nav_enabled et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_left et_cover_background et_pb_gutter et_pb_gutters3 et_pb_pagebuilder_layout et_no_sidebar et_divi_theme et-db dokan-theme-Divi">
      <div id="page-container">
         <div id="et-boc" class="et-boc">
            <div id="top-header">
               <div class="container clearfix">
                  <div id="et-info">
                     <span id="et-info-phone"><a href="tel:1800-824-4749">Call Us : +1 (800) 824 4749</a></span>
                     <a href="mailto:Emailinfo@uscannazon.com"><span id="et-info-email">Emailinfo@uscannazon.com</span></a>
                  </div>
                  <div id="et-secondary-menu">
                    <span>Items
                        @if (Cart::instance('default')->count() > 0)
                            <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                        @endif
                    </span>
                  </div>
               </div>
            </div>
            <header id="main-header" data-height-onload="66">
               <div class="container clearfix et_menu_container">
                  <div class="logo_container">
                     <span class="logo_helper"></span>
                     <a href="{{route('homepage')}}">
                     <img src="{{asset('assets/uploads/2022/03/Uscannazon4.png')}}" width="149" height="104" alt="Us Cannazon" id="logo" data-height-percentage="54">
                     </a>
                  </div>

                  <div id="et-top-navigation" data-height="66" data-fixed-height="40">
                     <nav id="top-menu-nav">

                        <ul id="top-menu" class="nav">

                           <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-34 current_page_item menu-item-43 {{ Request::route()->getName() == 'homepage' ? 'current-menu-item' : '' }}"><a href="{{ route('homepage') }}" aria-current="page">Home</a></li>
                           <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44 {{ Request::route()->getName() == 'aboutUs' ? 'current-menu-item' : '' }}"><a href="{{ route('aboutUs') }}">About Us</a></li>
<<<<<<< HEAD
                           @php
                           $role = Auth::user();
                           @endphp
                           @if(isset($role) && $role->role_id == 2)
                           <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44"><a href="javascript:void(0)" class="trigger">Product Request</a></li>
                           @endif
                            </li>
=======
>>>>>>> 17cdf3d77f7d6eb02a448b0976317893b18a74b8
                           <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-46 {{ Request::route()->getName() == 'faq' ? 'current-menu-item' : '' }}"><a href="{{ route('faq') }}">FAQ Page</a></li>
                           <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45 {{ Request::route()->getName() == 'contactUs' ? 'current-menu-item' : '' }}"><a href="{{ route('contactUs') }}">Contact Us</a></li>
                           {{-- @if(Auth::check())
                            <li>
                                <a href="{{route('shop.view_wishlist')}}">
                                    Wishlist
                                </a>
                            </li>
                            @endif --}}


                           @guest
                           <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-47"><a href="{{ route('myAccount') }}">Login/Sign Up</a></li>
                           @else
                           <li>

                           @php
                              $role = Auth::user()->role_id;
                              @endphp
                              @if($role == 3)
                           <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44 {{ Request::route()->getName() == 'editVendor' ? 'current-menu-item' : '' }}"><a href="{{ route('editVendor') }}">My Account</a></li>
                           {{-- <a href="{{ Route('editVendor') }}">My Account</a> --}}
                           @elseif($role == 2)
                           <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44 {{ Request::route()->getName() == 'edit-account' ? 'current-menu-item' : '' }}"><a href="{{ route('edit-account') }}">My Account</a></li>
                              {{-- <a href="{{ Route('edit-account') }}">My Account</a> --}}
                              @endif
                            </li>
                            <li class="logoutBtn">
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        @endguest

                        </ul>
                     </nav>
                     <div id="et_mobile_nav_menu">
                        <div class="mobile_nav closed">
                           <span class="select_page">Select Page</span>
                           <span class="mobile_menu_bar mobile_menu_bar_toggle"></span>
                        </div>
                     </div>
                  </div>
                  <!-- #et-top-navigation -->
               </div>
               <!-- .container -->
            </header>
            <!-- #main-header -->
            <div id="et-main-area">
