<?php include_once('header.php');?>
<style type="text/css">
	.et_pb_section_0_tb_footer.et_pb_section{padding-bottom:20px;background-color:#0D4400!important}.et_pb_row_0_tb_footer.et_pb_row{padding-top:0px!important;padding-bottom:0px!important;padding-top:0px;padding-bottom:0px}.et_pb_image_0_tb_footer{margin-bottom:20px!important;text-align:left;margin-left:0}.et_pb_text_0_tb_footer.et_pb_text,.et_pb_text_5_tb_footer.et_pb_text,.et_pb_text_7_tb_footer.et_pb_text{color:#FFFFFF!important}.et_pb_text_0_tb_footer{font-size:18px;margin-bottom:30px!important}.et_pb_text_1_tb_footer h5{font-family:'Montserrat',Helvetica,Arial,Lucida,sans-serif;font-weight:600;font-size:25px;color:#FFFFFF!important}.et_pb_text_1_tb_footer{margin-bottom:15px!important}.et_pb_social_media_follow_0_tb_footer li a.icon:before{font-size:20px;line-height:40px;height:40px;width:40px}.et_pb_social_media_follow_0_tb_footer li a.icon{height:40px;width:40px}.et_pb_text_4_tb_footer h4,.et_pb_text_2_tb_footer h4,.et_pb_text_3_tb_footer h4{font-weight:600;font-size:25px;color:#FFFFFF!important}.et_pb_text_3_tb_footer,.et_pb_text_2_tb_footer,.et_pb_text_4_tb_footer{margin-bottom:20px!important}.et_pb_sidebar_1_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area li,.et_pb_sidebar_1_tb_footer.et_pb_widget_area li:before,.et_pb_sidebar_1_tb_footer.et_pb_widget_area a,.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_0_tb_footer.et_pb_widget_area li,.et_pb_sidebar_0_tb_footer.et_pb_widget_area li:before,.et_pb_sidebar_0_tb_footer.et_pb_widget_area a{font-size:18px;color:#FFFFFF!important}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_text_5_tb_footer{line-height:1.4em;font-size:18px;line-height:1.4em;margin-bottom:30px!important}.et_pb_row_1_tb_footer.et_pb_row{padding-top:0px!important;padding-top:0px}.et_pb_text_7_tb_footer{font-size:18px}@media only screen and (max-width:980px){.et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}@media only screen and (max-width:767px){.et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}
</style>
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
	                           <!-- <ul class="dokan-dashboard-menu">
	                              <li class="active dashboard"><a href=""><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
	                              <li class="products"><a href="products/"><i class="fas fa-briefcase"></i> Products</a></li>
	                              <li class="orders"><a href="orders/"><i class="fas fa-shopping-cart"></i> Orders</a></li>
	                              <li class="withdraw"><a href="withdraw/"><i class="fas fa-upload"></i> Withdraw</a></li>
	                              <li class="settings"><a href="settings/store/"><i class="fas fa-cog"></i> Settings <i class="fas fa-angle-right pull-right"></i></a></li>
	                              <li class="dokan-common-links dokan-clearfix">
	                                 <a title="" class="tips" data-placement="top" href="Us-Cannazon/user_uscannabiz/" target="_blank" data-original-title="Visit Store"><i class="fas fa-external-link-alt"></i></a>
	                                 <a title="" class="tips" data-placement="top" href="edit-account/" data-original-title="Edit Account"><i class="fas fa-user"></i></a>
	                                 <a title="" class="tips" data-placement="top" href="wp-login.php?action=logout&amp;redirect_to=https%3A%2F%2Fwebprojectmockup.com%2Fwp%2Fuscannabiz&amp;_wpnonce=776bce81ba" data-original-title="Log out"><i class="fas fa-power-off"></i></a>
	                              </li>
	                           </ul> -->
                               <ul class="dokan-dashboard-menu">
								<li class="active dashboard"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
								<li class="products"><a href="{{route('product')}}"><i class="fas fa-briefcase"></i> Products</a></li>
								<li class="orders"><a href="{{route('vendor_order')}}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
	                              {{-- <li class="withdraw"><a href="withdraw/"><i class="fas fa-upload"></i> Withdraw</a></li> --}}
	                              <li class="settings"><a href="{{ Route('editVendor') }}"><i class="fas fa-cog"></i> Settings <i class="fas fa-angle-right pull-right"></i></a></li>
	                              {{-- <li class="dokan-common-links dokan-clearfix">
	                                 <a title="" class="tips" data-placement="top" href="Us-Cannazon/user_uscannabiz/" target="_blank" data-original-title="Visit Store"><i class="fas fa-external-link-alt"></i></a>
	                                 <a title="" class="tips" data-placement="top" href="edit-account/" data-original-title="Edit Account"><i class="fas fa-user"></i></a>
	                                 <a title="" class="tips" data-placement="top" href="wp-login.php?action=logout&amp;redirect_to=https%3A%2F%2Fwebprojectmockup.com%2Fwp%2Fuscannabiz&amp;_wpnonce=776bce81ba" data-original-title="Log out"><i class="fas fa-power-off"></i></a>
	                              </li> --}}
	                           </ul>
	                        </div>
	                     </div>
	                     <div class="dokan-dashboard-content dokan-orders-content">
						   <article class="dokan-orders-area">
						      <ul class="list-inline order-statuses-filter">
						         <li class="active">
						            <a href="dashboard/orders/">
						            All (0)
						            </a>
						         </li>
						         <li>
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
						         </li>
						      </ul>
						      <div class="dokan-order-filter-serach">
						         <form action="" method="GET" class="dokan-left">
						            <div class="dokan-form-group">
						               <input type="text" autocomplete="off" class="datepicker hasDatepicker" style="width:120px; padding-bottom:7px" name="order_date" id="order_date_filter" placeholder="Filter by Date" value="">
						               <select name="customer_id" id="dokan-filter-customer" style="width:220px" class="dokan-form-control select2-hidden-accessible enhanced" data-allow_clear="true" data-placeholder="Filter by registered customer" tabindex="-1" aria-hidden="true">
						                  <option value="" selected="selected"></option>
						                  <option>
						                  </option>
						               </select>
						               <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 220px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-dokan-filter-customer-container"><span class="select2-selection__rendered" id="select2-dokan-filter-customer-container"><span class="select2-selection__placeholder">Filter by registered customer</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
						               <input type="submit" name="dokan_order_filter" class="dokan-btn dokan-btn-sm dokan-btn-danger dokan-btn-theme" value="Filter">
						               <input type="hidden" name="order_status" value="all">
						            </div>
						         </form>
						         <form action="" method="POST" class="dokan-right">
						            <div class="dokan-form-group">
						               <input type="hidden" id="dokan_vendor_order_export_nonce" name="dokan_vendor_order_export_nonce" value="f17801938d"><input type="hidden" name="_wp_http_referer" value="/wp/uscannabiz/dashboard/orders/">                <input type="submit" name="dokan_order_export_all" class="dokan-btn dokan-btn-sm dokan-btn-danger dokan-btn-theme" value="Export All">
						               <input type="submit" name="dokan_order_export_filtered" class="dokan-btn dokan-btn-sm dokan-btn-danger dokan-btn-theme" value="Export Filtered">
						               <input type="hidden" name="order_date" value="">
						               <input type="hidden" name="order_status" value="all">
						            </div>
						         </form>
						         <div class="dokan-clearfix"></div>
						      </div>
						      <div class="dokan-error">
						         No orders found
						      </div>
						      <script>
						         (function($){
						             $(document).ready(function(){
						                 $('.datepicker').datepicker({
						                     dateFormat: 'yy-m-d'
						                 });
						             });
						         })(jQuery);
						      </script>
						   </article>
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
<?php include_once('footer.php');?>
