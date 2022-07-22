@extends('front.layout.app')
@section('title', 'Product')
@section('content')
<style type="text/css">
.addBtn{
            float: right;
            /*margin-top: 10px;*/
        }
        td{
            text-align: center;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }


        .addBtn{
            float: right;
            /*margin-top: 10px;*/
        }
        td{
            text-align: center;
        }
	.et_pb_section_0_tb_footer.et_pb_section{padding-bottom:20px;background-color:#0D4400!important}.et_pb_row_0_tb_footer.et_pb_row{padding-top:0px!important;padding-bottom:0px!important;padding-top:0px;padding-bottom:0px}.et_pb_image_0_tb_footer{margin-bottom:20px!important;text-align:left;margin-left:0}.et_pb_text_0_tb_footer.et_pb_text,.et_pb_text_5_tb_footer.et_pb_text,.et_pb_text_7_tb_footer.et_pb_text{color:#FFFFFF!important}.et_pb_text_0_tb_footer{font-size:18px;margin-bottom:30px!important}.et_pb_text_1_tb_footer h5{font-family:'Montserrat',Helvetica,Arial,Lucida,sans-serif;font-weight:600;font-size:25px;color:#FFFFFF!important}.et_pb_text_1_tb_footer{margin-bottom:15px!important}.et_pb_social_media_follow_0_tb_footer li a.icon:before{font-size:20px;line-height:40px;height:40px;width:40px}.et_pb_social_media_follow_0_tb_footer li a.icon{height:40px;width:40px}.et_pb_text_4_tb_footer h4,.et_pb_text_2_tb_footer h4,.et_pb_text_3_tb_footer h4{font-weight:600;font-size:25px;color:#FFFFFF!important}.et_pb_text_3_tb_footer,.et_pb_text_2_tb_footer,.et_pb_text_4_tb_footer{margin-bottom:20px!important}.et_pb_sidebar_1_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area li,.et_pb_sidebar_1_tb_footer.et_pb_widget_area li:before,.et_pb_sidebar_1_tb_footer.et_pb_widget_area a,.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_0_tb_footer.et_pb_widget_area li,.et_pb_sidebar_0_tb_footer.et_pb_widget_area li:before,.et_pb_sidebar_0_tb_footer.et_pb_widget_area a{font-size:18px;color:#FFFFFF!important}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_text_5_tb_footer{line-height:1.4em;font-size:18px;line-height:1.4em;margin-bottom:30px!important}.et_pb_row_1_tb_footer.et_pb_row{padding-top:0px!important;padding-top:0px}.et_pb_text_7_tb_footer{font-size:18px}@media only screen and (max-width:980px){.et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}@media only screen and (max-width:767px){.et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}
</style>
<div class="page-template-default page theme-Divi et-tb-has-template et-tb-has-footer woocommerce-js et_button_no_icon et_pb_button_helper_class et_fixed_nav et_show_nav et_secondary_nav_enabled et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_left et_cover_background et_pb_gutter windows et_pb_gutters3 et_right_sidebar et_divi_theme et-db et_full_width_page et_no_sidebar dokan-dashboard dokan-theme-Divi customize-support chrome">
	<div id="main-content">
	   <div class="container">
	      <div id="content-area" class="clearfix">
	         <div id="left-area">
	            <article id="post-7" class="post-7 page type-page status-publish hentry">
	               <h1 class="entry-title main_title">Orders</h1>
	               <div class="entry-content">
	                  <div class="dokan-dashboard-wrap">
						<div class="dokan-dash-sidebar">
	                        <div id="dokan-navigation" aria-label="Menu">
	                           <label id="mobile-menu-icon" for="toggle-mobile-menu" aria-label="Menu">☰</label><input id="toggle-mobile-menu" type="checkbox">
                               <ul class="dokan-dashboard-menu">
								<li class="dashboard {{ Request::route()->getName() == 'dashboard' ? 'active' : '' }}"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer"></i> Dashboard</a></li>
								<li class="products {{ Request::route()->getName() == 'product' ? 'active' : '' }}"><a href="{{route('product')}}"><i class="fas fa-briefcase"></i> Products</a></li>
								<li class="orders {{ Request::route()->getName() == 'vendor_order' ? 'active' : '' }}"><a href="{{route('vendor_order')}}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
								<li class="orders {{ Request::route()->getName() == 'show_brokers' ? 'active' : '' }}"><a href="{{route('show_brokers')}}"><i class="fas fa-shopping-cart"></i> Broker</a></li>
	                            <li class="orders {{ Request::route()->getName() == 'show_inventory' ? 'active' : '' }}"><a href="{{route('show_inventory')}}"><i class="fas fa-shopping-cart"></i> Inventory</a></li>  
                                {{-- <li class="withdraw"><a href="{{route('show_brokers_yajra')}}""><i class="fas fa-upload"></i> Broker Yajra</a></li> --}}
	                              <li class="settings {{ Request::route()->getName() == 'editVendor' ? 'active' : '' }}"><a href="{{ Route('editVendor') }}"><i class="fas fa-cog"></i> Settings <i class="fas fa-angle-right pull-right"></i></a></li>
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
						            <a href="#">
						            All ({{$orderCount??0}})
						            </a>
						         </li>
						         <li>
						            <a href="#">
						            Completed ({{$orderCompletedCount??0}})
						            </a>
						         </li>
						         {{-- <li>
						            <a href="dashboard/orders/?order_status=wc-processing">
						            Processing (0)
						            </a>
						         </li>
						         <li>
						            <a href="dashboard/orders/?order_status=wc-on-hold">
						            On-hold (0)
						            </a>
						         </li> --}}
						         <li>
						            <a href="#">
						            Pending ({{$orderPendingCount??0}})
						            </a>
						         </li>
						         <li>
						            <a href="#">
						            Cancelled ({{$orderCancelledCount??0}})
						            </a>
						         </li>
						         {{-- <li>
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
						      <div class="dokan-order-filter-serach">
						         <form action="" method="POST" class="dokan-right">
						            <div class="dokan-form-group">
										<input type="hidden" id="dokan_vendor_order_export_nonce" name="dokan_vendor_order_export_nonce" value="f17801938d"><input type="hidden" name="_wp_http_referer" value="/wp/uscannabiz/dashboard/orders/">                <a href="export" name="dokan_order_export_all" class="dokan-btn dokan-btn-sm dokan-btn-danger dokan-btn-theme" value="Export All">Export All</a>
										{{-- <input type="submit" name="dokan_order_export_filtered" class="dokan-btn dokan-btn-sm dokan-btn-danger dokan-btn-theme" value="Export Filtered"> --}}
										<input type="hidden" name="order_date" value="">
										<input type="hidden" name="order_status" value="all">
									 </div>
						         </form>
						         <div class="dokan-clearfix"></div>
						      </div>

							  <table class="dokan-table dokan-table-striped product-listing-table dokan-inline-editable-table" id="example1">
								<thead>
								   <tr style="text-align: center">
                                    <th>S.No</th>
									  <th>Image</th>
									  <th>Name</th>
									  <th>Status</th>
									  <th>SKU</th>
									  <th>Price</th>
									  <th>Quantity</th>
									  <th>Total</th>
									  <th>Date</th>
                                      <th></th>
								   </tr>
								</thead>
								<tbody>

								</tbody>
							 </table>

						   </article>
						</div>
	                     <!-- .dokan-dashboard-content -->
	                  </div>
	                  <!-- .dokan-dashboard-wrap -->
	               </div>
	            </article>
	         </div>

	      </div>
	   </div>
	</div>
</div>

<link href="{{ asset('admin/datatables/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('admin/datatables/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('admin/datatables/datatables.net/js/jquery.dataTables.min.js')}}"></script>


    <script>
        $(document).ready(function () {
            var DataTable = $("#example1").DataTable({
                dom: "Blfrtip",
                buttons: [{
                    extend: "copy",
                    className: "btn-sm"
                }, {
                    extend: "csv",
                    className: "btn-sm"
                }, {
                    extend: "excel",
                    className: "btn-sm"
                }, {
                    extend: "pdfHtml5",
                    className: "btn-sm"
                }, {
                    extend: "print",
                    className: "btn-sm"
                }],
                responsive: true,
                processing: true,
                serverSide: true,
                pageLength: 10,
                ajax: {
                    url: `{{route('vendor_order')}}`,
                },
                columns: [

                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    //{data: 'id', name: 'id'},
                    {data: 'product_image', name: 'product_image'},
                    {data: 'product_name', name: 'product_name'},
                    {data: 'order_status', name: 'order_status'},
                    {data: 'sku', name: 'sku'},
                    {data: 'product_current_price', name: 'product_current_price'},
                    {data: 'order_product_qty', name: 'order_product_qty'},
                    {data: 'total', name: 'total'},
                    {data: 'date', name: 'date'},
                    {data: 'action', name: 'action', orderable: false}
                ]

            });



        })



    </script>


@endsection
