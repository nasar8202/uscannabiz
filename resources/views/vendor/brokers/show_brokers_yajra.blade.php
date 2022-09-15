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
	               <h1 class="entry-title main_title">Dashboard</h1>
	               <div class="entry-content">
	                  <div class="dokan-dashboard-wrap">
						<div class="dokan-dash-sidebar">
	                        <div id="dokan-navigation" aria-label="Menu">
	                           <label id="mobile-menu-icon" for="toggle-mobile-menu" aria-label="Menu">☰</label><input id="toggle-mobile-menu" type="checkbox">
	                           {{-- <ul class="dokan-dashboard-menu">
								<li class="active dashboard"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
								<li class="products"><a href="{{route('product')}}"><i class="fas fa-briefcase"></i> Products</a></li>
								<li class="orders"><a href="{{route('vendor_order')}}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
	                              <li class="withdraw"><a href="withdraw/"><i class="fas fa-upload"></i> Withdraw</a></li>
	                              <li class="settings"><a href="settings/store/"><i class="fas fa-cog"></i> Settings <i class="fas fa-angle-right pull-right"></i></a></li>
	                              <li class="dokan-common-links dokan-clearfix">
	                                 <a title="" class="tips" data-placement="top" href="Us-Cannazon/user_uscannabiz/" target="_blank" data-original-title="Visit Store"><i class="fas fa-external-link-alt"></i></a>
	                                 <a title="" class="tips" data-placement="top" href="edit-account/" data-original-title="Edit Account"><i class="fas fa-user"></i></a>
	                                 <a title="" class="tips" data-placement="top" href="wp-login.php?action=logout&amp;redirect_to=https%3A%2F%2Fwebprojectmockup.com%2Fwp%2Fuscannabiz&amp;_wpnonce=776bce81ba" data-original-title="Log out"><i class="fas fa-power-off"></i></a>
	                              </li>
	                           </ul> --}}
                               <ul class="dokan-dashboard-menu">
								<li class="dashboard {{ Request::route()->getName() == 'dashboard_vendor' ? 'active' : '' }}"><a href="{{route('dashboard_vendor')}}"><i class="fas fa-tachometer"></i> Dashboard</a></li>
								<li class="products {{ Request::route()->getName() == 'product' ? 'active' : '' }}"><a href="{{route('product')}}"><i class="fas fa-briefcase"></i> Products</a></li>
								<li class="orders {{ Request::route()->getName() == 'vendor_order' ? 'active' : '' }}"><a href="{{route('vendor_order')}}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
								{{-- <li class="orders {{ Request::route()->getName() == 'show_brokers' ? 'active' : '' }}"><a href="{{route('show_brokers')}}"><i class="fas fa-shopping-cart"></i> Broker</a></li> --}}
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


							  @if(Session::has('success'))
									<div class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
								@endif
							  @if(Session::has('error'))
									<div class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span><em> {!! session('error') !!}</em></div>
								@endif
							  <table class="dokan-table dokan-table-striped product-listing-table dokan-inline-editable-table table table-bordered table-striped"  id="example1">
								<thead>
                                    <tr style="text-align: center">
                                    <th>S.No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>State</th>
                                    <th>Action</th>
                                 </tr>
                                </thead>
                                    <tbody>
                                    </tbody>
							 </table>

						   </article>
						</div>
	                  </div>
	               </div>
	            </article>
	         </div>
	         <div id="sidebar">
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
                    url: `{{route('show_brokers_yajra')}}`,
                },
                columns: [

                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    //{data: 'id', name: 'id'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'email', name: 'Email'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false}
                ]

            });
            var delete_id;
            $(document,this).on('click','.delete',function(){
                delete_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });
            $(document).on('click','#ok_delete',function(){
                $.ajax({
                    url:`{{url('admin/customers/destroy')}}/${delete_id}`,
                    type:'post',
                    data:{
                        id:delete_id,
                        "_method": 'DELETE',
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(){
                        $('#ok_delete').text('Deleting...');
                        $('#ok_delete').attr("disabled",true);
                    },
                    success: function (data) {
                        DataTable.ajax.reload();
                        $('#ok_delete').text('Delete');
                        $('#ok_delete').attr("disabled",false);
                        $('#confirmModal').modal('hide');
                        //   js_success(data);
                        if(data==0) {
                            toastr.error('Exception Here ! Delete Firstly Child Category');
                        }else{
                            toastr.success('Record Delete Successfully');
                        }



                    }
                })
            });

        })

        $(document).on('click','#status-switch',function(){
                let id = $(this).data('id');
                let val = $(this).data('val');


                $.ajax({
                    type:"get",
                    url:"{{route('changeVendorStatus')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        id:id,
                        val:val
                    },
                    success: function (data) {
                        // DataTable.ajax.reload();

                        if(data==0) {
                            toastr.error('Exception Here !');
                        }else{
                            toastr.success('Record Status Updated Successfully');
                        }



                    }
                })
            });

    </script>


@endsection
