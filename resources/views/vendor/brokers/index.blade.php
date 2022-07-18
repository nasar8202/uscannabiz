@extends('front.layout.app')
@section('title', 'Product')
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
								<li class="active dashboard"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
								<li class="products"><a href="{{route('product')}}"><i class="fas fa-briefcase"></i> Products</a></li>
								<li class="orders"><a href="{{route('vendor_order')}}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
								<li class="orders"><a href="{{route('show_brokers')}}"><i class="fas fa-shopping-cart"></i> Broker</a></li>
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
							  @if(!$brokers->isEmpty())
							  @if(Session::has('success'))
									<div class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
								@endif
							  @if(Session::has('error'))
									<div class="alert alert-success text-center"><span class="glyphicon glyphicon-ok"></span><em> {!! session('error') !!}</em></div>
								@endif
							  <table class="dokan-table dokan-table-striped product-listing-table dokan-inline-editable-table" id="dokan-product-list-table">
								<thead>
								   <tr>
									  <th>S.No</th>
									  <th>Name</th>
									  <th>Email</th>
									  {{-- <th>Status</th> --}}
									  <th>Phone Number</th>
									  <th>City</th>
									  <th>State</th>
									  <th>Country</th>
									  <th>Address</th>
									  <th>Action</th>
								   </tr>
								</thead>
								<tbody>
									@php
										$counter = 1;
									@endphp
								 @foreach($brokers as $broker)
								 {{-- @dd($broker) --}}
								   <tr class="">
									  <td data-title="S.no" class="column-thumb">
										 {{$counter++}}
									  </td>
									  <td data-title="name" class="column-primary">
										{{$broker->first_name}} {{$broker->last_name}}
									  </td>
									  <td data-title="email" class="column-primary">
										{{$broker->email}}
									  </td>
									  {{-- <td data-title="email" class="column-primary">
										already assigned
									  </td> --}}
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
									  <td data-title="address" class="column-primary">
										{{-- @dd(!is_null($broker->user_id) && $broker->user_id == Auth::user()->id) --}}
										@if(!is_null($broker->user_id) && $broker->user_id != Auth::user()->id)
										<label class="dokan-label dokan-label-secondary">Already Assigned</label>
										@else
										{{-- @dd($broker,Auth::user()) --}}
											@if($broker->user_id == Auth::user()->id)
											<a href="{{route('assigned_broker.cancle',['id'=>$broker->id])}}" class="dokan-btn dokan-btn-theme dokan-add-new-product">Cancel</a>
											@else
											<a href="{{route('assigned_broker',['id'=>$broker->id])}}" class="dokan-btn dokan-btn-theme dokan-add-new-product">Accept</a>
											@endif
										@endif
									  </td>
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
@endsection
