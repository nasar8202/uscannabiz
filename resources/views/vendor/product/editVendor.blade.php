@extends('front.layout.app')
@section('title', 'Add Product Form')
@section('content')
<style id="et-builder-module-design-179-cached-inline-styles">.et-db #et-boc .et-l .et_pb_section_0_tb_footer.et_pb_section{padding-bottom:20px;background-color:#0D4400!important}.et-db #et-boc .et-l .et_pb_row_0_tb_footer.et_pb_row{padding-top:0px!important;padding-bottom:0px!important;padding-top:0px;padding-bottom:0px}.et-db #et-boc .et-l .et_pb_image_0_tb_footer{margin-bottom:20px!important;text-align:left;margin-left:0}.et-db #et-boc .et-l .et_pb_text_0_tb_footer.et_pb_text,.et-db #et-boc .et-l .et_pb_text_5_tb_footer.et_pb_text,.et-db #et-boc .et-l .et_pb_text_7_tb_footer.et_pb_text{color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_0_tb_footer{font-size:18px;margin-bottom:30px!important}.et-db #et-boc .et-l .et_pb_text_1_tb_footer h5{font-family:'Montserrat',Helvetica,Arial,Lucida,sans-serif;font-weight:600;font-size:25px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_1_tb_footer{margin-bottom:15px!important}.et-db #et-boc .et-l .et_pb_social_media_follow_0_tb_footer li a.icon:before{font-size:20px;line-height:40px;height:40px;width:40px}.et-db #et-boc .et-l .et_pb_social_media_follow_0_tb_footer li a.icon{height:40px;width:40px}.et-db #et-boc .et-l .et_pb_text_4_tb_footer h4,.et-db #et-boc .et-l .et_pb_text_2_tb_footer h4,.et-db #et-boc .et-l .et_pb_text_3_tb_footer h4{font-weight:600;font-size:25px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_3_tb_footer,.et-db #et-boc .et-l .et_pb_text_2_tb_footer,.et-db #et-boc .et-l .et_pb_text_4_tb_footer{margin-bottom:20px!important}.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area li,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area li:before,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area a,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area li,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area li:before,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area a{font-size:18px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_text_5_tb_footer{line-height:1.4em;font-size:18px;line-height:1.4em;margin-bottom:30px!important}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:0px!important;padding-top:0px}.et-db #et-boc .et-l .et_pb_text_7_tb_footer{font-size:18px}@media only screen and (max-width:980px){.et-db #et-boc .et-l .et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}@media only screen and (max-width:767px){.et-db #et-boc .et-l .et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}</style>
<div class="archive tax-product_cat theme-Divi et-tb-has-template et-tb-has-footer woocommerce woocommerce-page woocommerce-js et_button_no_icon et_pb_button_helper_class et_fixed_nav et_show_nav et_secondary_nav_enabled et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_left et_cover_background et_pb_gutter windows et_pb_gutters3 et_left_sidebar et_divi_theme et-db dokan-theme-Divi customize-support chrome">
   <div class="page-template-default page theme-Divi et-tb-has-template et-tb-has-footer woocommerce-js et_button_no_icon et_pb_button_helper_class et_fixed_nav et_show_nav et_secondary_nav_enabled et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_left et_cover_background et_pb_gutter windows et_pb_gutters3 et_right_sidebar et_divi_theme et-db et_full_width_page et_no_sidebar dokan-dashboard dokan-theme-Divi customize-support chrome">
      <div id="main-content">
         <div class="container">
            <div id="content-area" class="clearfix">
               <div id="left-area">
                  <article id="post-7" class="post-7 page type-page status-publish hentry">
                     <h1 class="entry-title main_title">Dashboard</h1>
                     <div class="entry-content">
                        <div class="dokan-dashboard-wrap">
                           <div class="dokan-dash-sidebar">
                              <div id="dokan-navigation" aria-label="Menu">
                                 <label id="mobile-menu-icon" for="toggle-mobile-menu" aria-label="Menu">☰</label><input id="toggle-mobile-menu" type="checkbox">
                                 <ul class="dokan-dashboard-menu">
                                    <li class="active dashboard"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                                    <li class="products"><a href="product"><i class="fas fa-briefcase"></i> Products</a></li>
                                    <li class="orders"><a href="orders/"><i class="fas fa-shopping-cart"></i> Orders</a></li>
                                    <li class="withdraw"><a href="withdraw/"><i class="fas fa-upload"></i> Withdraw</a></li>
                                    <li class="settings"><a href="store/"><i class="fas fa-cog"></i> Settings <i class="fas fa-angle-right pull-right"></i></a></li>
                                    <li class="dokan-common-links dokan-clearfix">
                                       <a title="" class="tips" data-placement="top" href="https://webprojectmockup.com/wp/uscannabiz/Us-Cannazon/user_uscannabiz/" target="_blank" data-original-title="Visit Store"><i class="fas fa-external-link-alt"></i></a>
                                       <a title="" class="tips" data-placement="top" href="edit-account/" data-original-title="Edit Account"><i class="fas fa-user"></i></a>
                                       <a title="" class="tips" data-placement="top" href="https://webprojectmockup.com/wp/uscannabiz/wp-login.php?action=logout&amp;redirect_to=https%3A%2F%2Fwebprojectmockup.com%2Fwp%2Fuscannabiz&amp;_wpnonce=776bce81ba" data-original-title="Log out"><i class="fas fa-power-off"></i></a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                           <div class="dokan-dashboard-content">
                              <article class="dashboard-content-area woocommerce edit-account-wrap">
                                 <h1 class="entry-title">Edit Account Details</h1>
                                 @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                        @endif
                                        @if (session()->has('error'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                        @endif
                                 <form class="edit-account" action="{{route('updateVendor',$user->id)}}" method="post">
                                    {{ csrf_field() }}
                                    <p class="form-row form-row-first">
                                       <label for="account_first_name">First name <span class="required">*</span></label>
                                       <input type="text" class="input-text" name="first_name" value="{{$customer->first_name}}" id="account_first_name" value="">
                                     
                                       
                                    </p>
                                    <p class="form-row form-row-first">
                                       <label for="account_first_name">Last name <span class="required">*</span></label>
                                       <input type="text" class="input-text" name="last_name" value="{{$customer->last_name}}" id="account_first_name" value="">
                                     
                                       
                                    </p>
                                    
                                    <div class="clear"></div>
                                    <p class="form-row form-row-wide">
                                       <label for="account_email">Email address <span class="required">*</span></label>
                                       <input type="email" class="input-text" name="account_email" id="account_email" value="{{$user->email}}">
                                    </p>
                                    <fieldset>
                                       <legend>Password Change</legend>
                                       <p class="form-row form-row-wide">
                                          <label for="password_current">Current Password (leave blank to leave unchanged)</label>
                                          <input type="password" class="input-text" name="password_current" id="password_current">
                                       </p>
                                       <p class="form-row form-row-wide">
                                          <label for="password_1">New Password (leave blank to leave unchanged)</label>
                                          <input type="password" class="input-text" name="password_1" id="password_1">
                                       </p>
                                       <p class="form-row form-row-wide">
                                          <label for="password_2">Confirm New Password</label>
                                          <input type="password" class="input-text" name="password_2" id="password_2">
                                       </p>
                                    </fieldset>
                                    <div class="clear"></div>
                                    <p>
                                       <input type="hidden" id="_wpnonce" name="_wpnonce" value="ebd582eb76"><input type="hidden" name="_wp_http_referer" value="/wp/uscannabiz/dashboard/edit-account/">                            
                                      
                                       <button type="submit" class="dokan-btn dokan-btn-danger dokan-btn-theme" name="dokan_save_account_details" >Save Changes</button>
                                       <input type="hidden" name="action" value="dokan_save_account_details">
                                    </p>
                                    <br>
                                 </form>
                              </article>
                              <!-- .dashboard-content-area -->
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

@endsection
