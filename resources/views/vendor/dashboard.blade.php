@extends('front.layout.app')
@section('title', 'Vendor')
@section('content')
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
	                           <ul class="dokan-dashboard-menu">
	                              <li class="active dashboard"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
	                              <li class="products"><a href="product"><i class="fas fa-briefcase"></i> Products</a></li>
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
	                     <div class="dokan-dashboard-content">
	                        <article class="dashboard-content-area">
	                           <div class="dokan-w6 dokan-dash-left">
	                              <div class="dashboard-widget big-counter">
	                                 <ul class="list-inline">
	                                    <li>
	                                       <div class="title">Sales</div>
	                                       <div class="count"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>0.00</span></div>
	                                    </li>
	                                    <li>
	                                       <div class="title">Earning</div>
	                                       <div class="count"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>0.00</span></div>
	                                    </li>
	                                    <li>
	                                       <div class="title">Pageview</div>
	                                       <div class="count">{{$productViewed->view ?? 0}}</div>

	                                    </li>
	                                    <li>
	                                       <div class="title">Order</div>
	                                       <div class="count">
	                                          {{ $orderCount ?? 0 }}
	                                       </div>
	                                    </li>
	                                 </ul>
	                              </div>
	                              <!-- .big-counter -->
	                              <div class="dashboard-widget orders">
	                                 <div class="widget-title"><i class="fas fa-shopping-cart"></i> Orders</div>
	                                 <div class="content-half-part">
	                                    <ul class="list-unstyled list-count">
	                                       <li>
	                                          <a href="orders/">
	                                          <span class="title">Total</span> <span class="count">{{ $orderCount ?? 0 }}</span>
	                                          </a>
	                                       </li>
	                                       <li>
	                                          <a href="orders/?order_status=wc-completed" style="color: #73a724">
	                                          <span class="title">Completed</span> <span class="count">0</span>
	                                          </a>
	                                       </li>
	                                       <li>
	                                          <a href="orders/?order_status=wc-pending" style="color: #999">
	                                          <span class="title">Pending</span> <span class="count">0</span>
	                                          </a>
	                                       </li>
	                                       <li>
	                                          <a href="orders/?order_status=wc-processing" style="color: #21759b">
	                                          <span class="title">Processing</span> <span class="count">0</span>
	                                          </a>
	                                       </li>
	                                       <li>
	                                          <a href="orders/?order_status=wc-cancelled" style="color: #d54e21">
	                                          <span class="title">Cancelled</span> <span class="count">0</span>
	                                          </a>
	                                       </li>
	                                       <li>
	                                          <a href="orders/?order_status=wc-refunded" style="color: #e6db55">
	                                          <span class="title">Refunded</span> <span class="count">0</span>
	                                          </a>
	                                       </li>
	                                       <li>
	                                          <a href="orders/?order_status=wc-on-hold" style="color: #f0ad4e">
	                                          <span class="title">On hold</span> <span class="count">0</span>
	                                          </a>
	                                       </li>
	                                    </ul>
	                                 </div>
	                                 <div class="content-half-part">
	                                    <canvas id="order-stats" width="199" height="199" style="display: block; box-sizing: border-box; height: 199px; width: 199px;"></canvas>
	                                 </div>
	                              </div>
	                              <!-- .orders -->
	                              <script type="text/javascript">
	                                 jQuery(function($) {
	                                     var order_stats = [0,0,0,0,0,0];
	                                     var colors = ["#73a724","#999","#21759b","#d54e21","#e6db55","#f0ad4e"];
	                                     var labels = ["Completed","Pending","Processing","Cancelled","Refunded","On Hold"];

	                                     var ctx = $("#order-stats").get(0).getContext("2d");
	                                     var donn = new Chart(ctx, {
	                                         type: 'doughnut',
	                                         data: {
	                                             datasets: [{
	                                                 data: order_stats,
	                                                 backgroundColor: colors
	                                             }],
	                                             labels: labels,
	                                         },
	                                         options: {
	                                             plugins: {
	                                                 legend: false
	                                             }
	                                         }
	                                     });
	                                 });
	                              </script>
	                              <div class="dashboard-widget products">
	                                 <div class="widget-title">
	                                    <i class="fas fa-briefcase" aria-hidden="true"></i> Products
	                                    <span class="pull-right">
	                                    <a href="new-product/">+ Add new product</a>
	                                    </span>
	                                 </div>
	                                 <ul class="list-unstyled list-count">
	                                    <li>
	                                       <a href="products/">
	                                       <span class="title">Total</span> <span class="count">{{ $productCount ?? 0 }}</span>
	                                       </a>
	                                    </li>
	                                    <li>
	                                       <a href="products/?post_status=publish">
	                                       <span class="title">Live</span> <span class="count">7</span>
	                                       </a>
	                                    </li>
	                                    <li>
	                                       <a href="products/?post_status=draft">
	                                       <span class="title">Offline</span> <span class="count">0</span>
	                                       </a>
	                                    </li>
	                                    <li>
	                                       <a href="products/?post_status=pending">
	                                       <span class="title">Pending Review</span> <span class="count">0</span>
	                                       </a>
	                                    </li>
	                                 </ul>
	                              </div>
	                              <!-- .products -->
	                           </div>
	                           <!-- .col-md-6 -->
	                           <div class="dokan-w6 dokan-dash-right">
	                              <div class="dashboard-widget sells-graph">
	                                 <div class="widget-title"><i class="far fa-credit-card"></i> Sales this Month</div>
	                                 <div class="chart-container">
	                                    <div class="chart-placeholder main" style="width: 100%; height: 350px; padding: 0px; position: relative;">
	                                       <canvas class="flot-base" width="413" height="350" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 413.703px; height: 350px;"></canvas>
	                                       <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
	                                          <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
	                                             <div style="position: absolute; max-width: 45px; top: 336px; font: 500 11px / 13px &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(170, 170, 170); left: 0px; text-align: center;">01 Jun</div>
	                                             <div style="position: absolute; max-width: 45px; top: 336px; font: 500 11px / 13px &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(170, 170, 170); left: 52px; text-align: center;">04 Jun</div>
	                                             <div style="position: absolute; max-width: 45px; top: 336px; font: 500 11px / 13px &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(170, 170, 170); left: 104px; text-align: center;">07 Jun</div>
	                                             <div style="position: absolute; max-width: 45px; top: 336px; font: 500 11px / 13px &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(170, 170, 170); left: 156px; text-align: center;">10 Jun</div>
	                                             <div style="position: absolute; max-width: 45px; top: 336px; font: 500 11px / 13px &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(170, 170, 170); left: 208px; text-align: center;">13 Jun</div>
	                                             <div style="position: absolute; max-width: 45px; top: 336px; font: 500 11px / 13px &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(170, 170, 170); left: 259px; text-align: center;">16 Jun</div>
	                                             <div style="position: absolute; max-width: 45px; top: 336px; font: 500 11px / 13px &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(170, 170, 170); left: 311px; text-align: center;">19 Jun</div>
	                                             <div style="position: absolute; max-width: 45px; top: 336px; font: 500 11px / 13px &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(170, 170, 170); left: 363px; text-align: center;">22 Jun</div>
	                                          </div>
	                                          <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
	                                             <div style="position: absolute; top: 324px; font: 500 11px / 13px &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(170, 170, 170); left: 1px; text-align: right;">0</div>
	                                             <div style="position: absolute; top: 6px; font: 500 11px / 13px &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(170, 170, 170); left: 1px; text-align: right;">1</div>
	                                          </div>
	                                       </div>
	                                       <canvas class="flot-overlay" width="413" height="350" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 413.703px; height: 350px;"></canvas>
	                                       <div class="legend">
	                                          <div style="position: absolute; width: 411.703px; height: 88.5312px; top: 17px; left: 22px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
	                                          <table style="position:absolute;top:17px;left:22px;;font-size:smaller;color:#aaa">
	                                             <tbody>
	                                                <tr>
	                                                   <td class="legendColorBox">
	                                                      <div style="border:1px solid #ccc;padding:1px">
	                                                         <div style="width:4px;height:0;border:5px solid rgb(52,152,219);overflow:hidden"></div>
	                                                      </div>
	                                                   </td>
	                                                   <td class="legendLabel">Sales total</td>
	                                                </tr>
	                                                <tr>
	                                                   <td class="legendColorBox">
	                                                      <div style="border:1px solid #ccc;padding:1px">
	                                                         <div style="width:4px;height:0;border:5px solid rgb(26,188,156);overflow:hidden"></div>
	                                                      </div>
	                                                   </td>
	                                                   <td class="legendLabel">Number of orders</td>
	                                                </tr>
	                                             </tbody>
	                                          </table>
	                                       </div>
	                                    </div>
	                                 </div>

	                                 <script type="text/javascript">
	                                    jQuery(function($) {

	                                        var order_data = jQuery.parseJSON( '{"order_counts":[["1654041600000",<?php echo $orderCount; ?>],["1654128000000",0],["1654214400000",0],["1654300800000",0],["1654387200000",0],["1654473600000",0],["1654560000000",0],["1654646400000",0],["1654732800000",0],["1654819200000",0],["1654905600000",0],["1654992000000",0],["1655078400000",0],["1655164800000",0],["1655251200000",0],["1655337600000",0],["1655424000000",0],["1655510400000",0],["1655596800000",0],["1655683200000",0],["1655769600000",0],["1655856000000",0],["1655942400000",0]],"order_amounts":[["1654041600000",0],["1654128000000",0],["1654214400000",0],["1654300800000",0],["1654387200000",0],["1654473600000",0],["1654560000000",0],["1654646400000",0],["1654732800000",0],["1654819200000",0],["1654905600000",0],["1654992000000",0],["1655078400000",0],["1655164800000",0],["1655251200000",0],["1655337600000",0],["1655424000000",0],["1655510400000",0],["1655596800000",0],["1655683200000",0],["1655769600000",0],["1655856000000",0],["1655942400000",0]]}' );

                                            var isRtl = '0';
	                                        var series = [
	                                            {
	                                                label: "Sales total",
	                                                data: order_data.order_amounts,
	                                                shadowSize: 0,
	                                                hoverable: true,
	                                                points: { show: true, radius: 5, lineWidth: 1, fillColor: '#fff', fill: true },
	                                                lines: { show: true, lineWidth: 2, fill: false },
	                                                shadowSize: 0,
	                                                prepend_tooltip: "&#036;"
	                                            },
	                                            {
	                                                label: "Number of orders",
	                                                data: order_data.order_counts,
	                                                shadowSize: 0,
	                                                hoverable: true,
	                                                points: { show: true, radius: 5, lineWidth: 2, fillColor: '#fff', fill: true },
	                                                lines: { show: true, lineWidth: 3, fill: false },
	                                                shadowSize: 0,
	                                                append_tooltip: " Sales"
	                                            },
	                                        ];

	                                        var main_chart = jQuery.plot(
	                                            jQuery('.chart-placeholder.main'),
	                                            series,
	                                            {
	                                                legend: {
	                                                    show: true,
	                                                    position: 'nw'
	                                                },
	                                                series: {
	                                                    lines: { show: true, lineWidth: 4, fill: false },
	                                                    points: { show: true }
	                                                },
	                                                grid: {
	                                                    borderColor: '#eee',
	                                                    color: '#aaa',
	                                                    borderWidth: 1,
	                                                    hoverable: true,
	                                                    show: true,
	                                                    aboveData: false,
	                                                },
	                                                xaxis: {
	                                                    color: '#aaa',
	                                                    position: "bottom",
	                                                    tickColor: 'transparent',
	                                                    mode: "time",
	                                                    timeformat: "%d %b",
	                                                    monthNames: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
	                                                    tickLength: 1,
	                                                    minTickSize: [1, "day"],
	                                                    font: {
	                                                        color: "#aaa"
	                                                    },
	                                                    transform: function (v) { return ( isRtl == '1' ) ? -v : v; },
	                                                    inverseTransform: function (v) { return ( isRtl == '1' ) ? -v : v; }
	                                                },
	                                                yaxes: [
	                                                    {
	                                                        position: ( isRtl == '1' ) ? "right" : "left",
	                                                        min: 0,
	                                                        minTickSize: 1,
	                                                        tickDecimals: 0,
	                                                        color: '#d4d9dc',
	                                                        font: { color: "#aaa" }
	                                                    },
	                                                    {
	                                                        position: ( isRtl == '1' ) ? "right" : "left",
	                                                        min: 0,
	                                                        tickDecimals: 2,
	                                                        alignTicksWithAxis: 1,
	                                                        color: 'transparent',
	                                                        font: { color: "#aaa" }
	                                                    }
	                                                ],
	                                                colors: ["#3498db", "#1abc9c"]
	                                            }
	                                        );

	                                        jQuery('.chart-placeholder').resize();
	                                    });

	                                 </script>
	                              </div>
	                              <!-- .sells-graph -->
	                           </div>
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
