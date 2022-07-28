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
	               <h1 class="entry-title main_title">Inventory</h1>
				  
	               <div class="entry-content">
	                  <div class="dokan-dashboard-wrap">
	                     <div class="dokan-dash-sidebar">
	                        <div id="dokan-navigation" aria-label="Menu">
	                           <label id="mobile-menu-icon" for="toggle-mobile-menu" aria-label="Menu">☰</label><input id="toggle-mobile-menu" type="checkbox">
	                           {{-- <ul class="dokan-dashboard-menu">
	                              <li class="active dashboard"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer"></i> Dashboard</a></li>
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
	                     <div class="dokan-dashboard-content dokan-product-listing">
							@if (session()->has('success'))
								 <div class="alert alert-success">
									 {{ session()->get('success') }}
								 </div>
								 @endif
						   <article class="dokan-product-listing-area">
						      <div class="product-listing-top dokan-clearfix">
						         <ul class="dokan-listing-filter dokan-left subsubsub">
						            <li class="active">
						               <a>All (7)</a>
						            </li>
						            
						            {{-- <li>
						               <a >In stock ({{$product_stock->product_qty??'0'}})</a>
						            </li> --}}
						         </ul>
								 
						         <!-- .post-statuses-filter -->
						         <!-- <span class="dokan-add-product-link">
						         <a href="{{Route('productForm')}}" class="dokan-btn dokan-btn-theme dokan-add-new-product">
						         <i class="fas fa-briefcase">&nbsp;</i>
						         Add new product                                        </a>
						         </span> -->
						      </div>
						      <div class="dokan-w12">
						         <form class="dokan-form-inline dokan-w8 dokan-product-date-filter" action="{{route('product_filter')}}" method="get">
						            {{-- <div class="dokan-form-group">
						               <select name="date" id="filter-by-date" class="dokan-form-control">
						                  <option selected="selected" value="0">All dates</option>
						                  <option value="202205">May 2022</option>
						                  <option value="202203">March 2022</option>
						               </select>
						            </div> --}}
						            <!-- <div class="dokan-form-group">
						               <select name="product_cat" id="product_cat" class="product_cat dokan-form-control chosen">
						                  <option value="-1" selected="selected">– Select a category –</option>
						                  <option value="all">All</option>
						                 @foreach ($category as $cat)
										 <option class="level-0" value="{{$cat->id}}">{{$cat->name}}</option>

										 @endforeach

						               </select>
						            </div> -->
						            <!-- {{-- <div class="dokan-form-group">
						               <select name="product_type" id="filter-by-type" class="dokan-form-control" style="max-width:140px;">
						                  <option value="">Product type</option>
						                  <option value="simple">Simple</option>
						               </select>
						            </div> --}}
						            <button type="submit" name="product_listing_filter" value="ok" class="dokan-btn">Filter</button>
						         </form> -->
						         <!-- <form method="get" action="{{route('product_filter_search')}}" class="dokan-form-inline dokan-w5 dokan-product-search-form">
						            <button type="submit" name="product_listing_search" value="ok" class="dokan-btn">Search</button>
						            <input type="hidden" id="dokan_product_search_nonce" name="dokan_product_search_nonce" value="754d5308e1"><input type="hidden" name="_wp_http_referer" value="/wp/uscannabiz/dashboard/products/">
						            <div class="dokan-form-group">
						               <input type="text" class="dokan-form-control" name="product_search_name" placeholder="Search Products" value="">
						            </div>
						         </form> -->
						      </div>
						      <div class="dokan-dashboard-product-listing-wrapper">
						         <form id="product-filter" method="get" action="{{route('deleteProductbulk')}}" class="dokan-form-inline">
						            <!-- <div class="dokan-form-group">
						               <label for="bulk-product-action-selector" class="screen-reader-text">Select bulk action</label>
						               <select name="status" id="bulk-product-action-selector" class="dokan-form-control chosen">
						                  <option class="bulk-product-status" value="-1">Bulk Actions</option>
						                  <option class="bulk-product-status" value="delete">Delete Permanently</option>
						               </select>
						            </div> -->
						            <div class="dokan-form-group">
						               <input type="hidden" id="security" name="security" value="90eee0abd0"><input type="hidden" name="_wp_http_referer" value="/wp/uscannabiz/dashboard/products/">                                    
                                       <!-- <input type="submit" name="bulk_product_status_change" id="bulk-product-action" class="dokan-btn dokan-btn-theme" value="Apply"> -->
						            </div>
						            <table class="dokan-table dokan-table-striped product-listing-table dokan-inline-editable-table" id="dokan-product-list-table">
						               <thead>
						                  <tr>
						                     <th id="cb" class="manage-column column-cb check-column">
						                        <label for="cb-select-all"></label>
						                        <input id="cb-select-all" class="dokan-checkbox" type="checkbox">
						                     </th>
						                     <th>Image</th>
						                     <th>Name</th>
						                     <!--<th>Status</th>-->
						                     <th>SKU</th>
						                     <th>Stock</th>
						                     <th>Price</th>
						                     <!--<th>Earning<span class="tips earning-info" title="" data-original-title="Earning could be greater than or less than the calculated value based on different criteria like tax and shipping fee receiver"></span></th>-->
						                     <th>Type</th>
						                     <th>Views</th>
						                     <th>Date</th>
						                  </tr>
						               </thead>
						               <tbody>
										{{-- @if($category_filter->isEmpty())
										<tr class="">
											<td data-title="empty-data" colspan="11" class="column-thumb">
											   no data available for this category
											</td>
										</tr>
										@else --}}
										@if(isset($category_filter))
										@php
											$count = count($category_filter);
											// dd($count);
										@endphp
										@if($count == 0)
										<tr class="">
											<td data-title="empty-data" colspan="11" class="column-thumb text-center">
											   no data available for this category
											</td>
										</tr>
										@endif
										@foreach($category_filter as $pro)
						                  <tr class="">
						                     <th class="dokan-product-select check-column">
						                        <label for="cb-select-432"></label>
						                        <input class="cb-select-items dokan-checkbox" type="checkbox" data-product-name="Testing Products" name="bulk_products[]" value="{{$pro->id}}">
						                     </th>
						                     <td data-title="Image" class="column-thumb">
						                        <a href="products/?product_id=432&amp;action=edit"><img width="150" height="150" src="{{asset('uploads/products/'.$pro->product_image)}}" class="attachment-thumbnail size-thumbnail" alt=""></a>
						                     </td>
						                     <td data-title="Name" class="column-primary">
						                        <strong><a href="products/?product_id=432&amp;action=edit">{{$pro->product_name}}</a></strong>
						                        <div class="row-actions">
						                           <span class="edit"><a href="edit-products/{{$pro->id}}">Edit</a> | </span>
												   <span class="delete"><a href="delete-product/{{$pro->id}}" >Delete Permanently</a> </span>
												    {{-- <span class="view"><a href="product/testing-products/">View</a></span> --}}
						                        </div>
						                        <button type="button" class="toggle-row"></button>
						                     </td>
						                     <!--<td class="post-status" data-title="Status">-->
						                     <!--   <label class="dokan-label dokan-label-success">Online</label>-->
						                     <!--</td>-->
						                     <td data-title="SKU">
						                        <span class="na">{{$pro->sku}}</span>
						                     </td>
						                     <td data-title="Stock">
						                        <mark class="instock">{{$pro->product_qty??''}}</mark>
						                     </td>
						                     <td data-title="Price">
						                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$pro->product_current_price}}</span>
						                     </td>
						                     <!--<td data-title="Earning">-->
						                     <!--   <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>4.50</span>-->
						                     <!--</td>-->
						                     <td data-title="Type">
						                        <span >{{$pro->product_type}}</span>
						                     </td>
						                     <td data-title="Views">
						                       {{$pro->view}}
						                     </td>
						                     <td class="post-date" data-title="Date">
						                        <abbr title="May 18, 2022 1:14 am">{{$pro->created_at}}</abbr>
						                        <div class="status">Published        </div>
						                     </td>
						                     <td class="diviader"></td>
						                  </tr>
										  @endforeach
										@else
                                        <?php //echo $data = $product; die(); ?>
										@foreach($product as $pro)
                                            
						                  <tr class="">
						                     <th class="dokan-product-select check-column">
						                        <label for="cb-select-432"></label>
						                        <input class="cb-select-items dokan-checkbox" type="checkbox" data-product-name="Testing Products" name="bulk_products[]" value="{{$pro->id}}">
						                     </th>
						                     <td data-title="Image" class="column-thumb">
						                        <a href="#"><img width="150" height="150" src="{{asset('uploads/products/'.$pro->product_image)}}" class="attachment-thumbnail size-thumbnail" alt=""></a>
						                     </td>
						                     <td data-title="Name" class="column-primary">
						                        <!-- <strong><a href="products/?product_id=432&amp;action=edit">{{$pro->product_name}}</a></strong> -->
                                                <strong>{{$pro->product_name}}</strong>
						                        <!-- <div class="row-actions">
						                           <span class="edit"><a href="edit-products/{{$pro->id}}">Edit</a> | </span>
												   <span class="delete"><a href="delete-product/{{$pro->id}}" >Delete Permanently</a></span>
												    {{-- <span class="view"><a href="product/testing-products/">View</a></span> --}}
						                        </div> -->
						                        <button type="button" class="toggle-row"></button>
						                     </td>
						                     <!--<td class="post-status" data-title="Status">-->
						                     <!--   <label class="dokan-label dokan-label-success">Online</label>-->
						                     <!--</td>-->
						                     <td data-title="SKU">
						                        <span class="na">{{$pro->sku}}</span>
						                     </td>
						                     <td data-title="Stock">
						                        <mark class="instock">{{$pro->product_qty??''}}</mark>
						                     </td>
						                     <td data-title="Price">
						                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$pro->product_current_price}}</span>
						                     </td>
						                     <!--<td data-title="Earning">-->
						                     <!--   <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>4.50</span>-->
						                     <!--</td>-->
						                     <td data-title="Type">
						                        <span >{{$pro->product_type}}</span>
						                     </td>
						                     <td data-title="Views">
						                        {{$pro->view}}
						                     </td>
						                     <td class="post-date" data-title="Date">
						                        <abbr title="May 18, 2022 1:14 am">{{$pro->created_at}}</abbr>
						                        <div class="status">Published        </div>
						                     </td>
						                     <td class="diviader"></td>
						                  </tr>
										  @endforeach
										@endif
										{{-- @endif --}}
						               </tbody>
						            </table>
						         </form>
						      </div>
						   </article>
						   <script type="text/html" id="tmpl-dokan-add-new-product">
						      <div id="dokan-add-new-product-popup" class="white-popup dokan-add-new-product-popup">
						          <h2><i class="fas fa-briefcase">&nbsp;</i>&nbsp;Add New Product</h2>
						            <form action="" method="post" id="dokan-add-new-product-form">
						              <div class="product-form-container">
						                  <div class="content-half-part dokan-feat-image-content">
						                      <div class="dokan-feat-image-upload">
						                                                  <div class="instruction-inside">
						                              <input type="hidden" name="feat_image_id" class="dokan-feat-image-id" value="0">

						                              <i class="fas fa-cloud-upload-alt"></i>
						                              <a href="#" class="dokan-feat-image-btn btn btn-sm">Upload a product cover image</a>
						                          </div>

						                          <div class="image-wrap dokan-hide">
						                              <a class="close dokan-remove-feat-image">&times;</a>
						                              <img loading="lazy" height="" width="" src="" alt="">
						                          </div>
						                      </div>
						                      <div class="dokan-product-gallery">
						                          <div class="dokan-side-body" id="dokan-product-images">
						                              <div id="product_images_container">
						                                  <ul class="product_images dokan-clearfix">

						                                      <li class="add-image add-product-images tips" data-title="Add gallery image">
						                                          <a href="#" class="add-product-images"><i class="fas fa-plus" aria-hidden="true"></i></a>
						                                      </li>
						                                  </ul>
						                                  <input type="hidden" id="product_image_gallery" name="product_image_gallery" value="">
						                              </div>
						                          </div>
						                      </div>

						                  </div>
						                  <div class="content-half-part dokan-product-field-content">
						                      <div class="dokan-form-group">
						                          <input type="text" class="dokan-form-control" name="post_title" placeholder="Product name..">
						                      </div>

						                      <div class="dokan-clearfix">
						                          <div class="dokan-form-group dokan-clearfix dokan-price-container">
						                              <div class="content-half-part">
						                                  <label for="_regular_price" class="form-label">Price</label>
						                                  <div class="dokan-input-group">
						                                      <span class="dokan-input-group-addon">&#036;</span>
						                                      <input type="text" class="dokan-product-regular-price wc_input_price dokan-form-control" name="_regular_price" id="_regular_price" placeholder="0.00">
						                                  </div>
						                              </div>

						                              <div class="content-half-part sale-price">
						                                  <label for="_sale_price" class="form-label">
						                                      Discounted Price                                    <a href="#" class="sale_schedule">Schedule</a>
						                                      <a href="#" class="cancel_sale_schedule dokan-hide">Cancel</a>
						                                  </label>

						                                  <div class="dokan-input-group">
						                                      <span class="dokan-input-group-addon">&#036;</span>
						                                      <input type="text" class="dokan-product-sales-price wc_input_price dokan-form-control"  name="_sale_price" placeholder="0.00" id="_sale_price">
						                                  </div>
						                              </div>
						                          </div>

						                          <div class="dokan-hide sale-schedule-container sale_price_dates_fields dokan-clearfix dokan-form-group">
						                              <div class="content-half-part from">
						                                  <div class="dokan-input-group">
						                                      <span class="dokan-input-group-addon">From</span>
						                                      <input type="text" name="_sale_price_dates_from" class="dokan-form-control datepicker sale_price_dates_from" value="" maxlength="10" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" placeholder="YYYY-MM-DD">
						                                  </div>
						                              </div>

						                              <div class="content-half-part to">
						                                  <div class="dokan-input-group">
						                                      <span class="dokan-input-group-addon">To</span>
						                                      <input type="text" name="_sale_price_dates_to" class="dokan-form-control datepicker sale_price_dates_to" value="" maxlength="10" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" placeholder="YYYY-MM-DD">
						                                  </div>
						                              </div>
						                          </div>
						                      </div>
						                  </div>
						                  <div class="dokan-clearfix"></div>
						                  <div class="product-full-container">
						                      <div class="dokan-form-group">
						                          <select  name='product_cat' id='product_cat' class='product_cat dokan-form-control dokan-select2' >
												      <option value='-1' selected='selected'>&#8211; Select a category &#8211;</option>
												      <option class="level-0" value="25" data-commission="0" data-product-id="0"> Business &amp; Licenses for Sales</option>
												      <option class="level-0" value="22" data-commission="0" data-product-id="0"> Cartridges + Vapes</option>
												      <option class="level-0" value="18" data-commission="0" data-product-id="0"> Clones + Teens</option>
												      <option class="level-0" value="20" data-commission="0" data-product-id="0"> Concentrates</option>
												      <option class="level-1" value="42" data-commission="0" data-product-id="0">&nbsp;&#8212; All</option>
												      <option class="level-1" value="34" data-commission="0" data-product-id="0">&nbsp;&#8212; Badder</option>
												      <option class="level-1" value="35" data-commission="0" data-product-id="0">&nbsp;&#8212; Crumble</option>
												      <option class="level-1" value="36" data-commission="0" data-product-id="0">&nbsp;&#8212; Diamonds</option>
												      <option class="level-1" value="37" data-commission="0" data-product-id="0">&nbsp;&#8212; Hash</option>
												      <option class="level-1" value="38" data-commission="0" data-product-id="0">&nbsp;&#8212; Rosin + Resin</option>
												      <option class="level-1" value="39" data-commission="0" data-product-id="0">&nbsp;&#8212; Sauce</option>
												      <option class="level-1" value="40" data-commission="0" data-product-id="0">&nbsp;&#8212; Sugar</option>
												      <option class="level-1" value="41" data-commission="0" data-product-id="0">&nbsp;&#8212; Wax</option>
												      <option class="level-0" value="17" data-commission="0" data-product-id="0"> Distillate</option>
												      <option class="level-0" value="23" data-commission="0" data-product-id="0"> Edibles</option>
												      <option class="level-0" value="26" data-commission="0" data-product-id="0"> Equipment For Sale</option>
												      <option class="level-0" value="16" data-commission="0" data-product-id="0"> Flowers</option>
												      <option class="level-1" value="33" data-commission="0" data-product-id="0">&nbsp;&#8212; All</option>
												      <option class="level-1" value="27" data-commission="0" data-product-id="0">&nbsp;&#8212; Exotic</option>
												      <option class="level-1" value="29" data-commission="0" data-product-id="0">&nbsp;&#8212; Glass House</option>
												      <option class="level-1" value="31" data-commission="0" data-product-id="0">&nbsp;&#8212; Hoop House</option>
												      <option class="level-1" value="28" data-commission="0" data-product-id="0">&nbsp;&#8212; Indoor</option>
												      <option class="level-1" value="30" data-commission="0" data-product-id="0">&nbsp;&#8212; Light Dep</option>
												      <option class="level-1" value="32" data-commission="0" data-product-id="0">&nbsp;&#8212; Out Door</option>
												      <option class="level-0" value="21" data-commission="0" data-product-id="0"> PreRolls</option>
												      <option class="level-0" value="19" data-commission="0" data-product-id="0"> Trim + Fresh Frozen</option>
												      <option class="level-0" value="15" data-commission="0" data-product-id="0"> Uncategorized</option>
												      <option class="level-0" value="24" data-commission="0" data-product-id="0"> White Label</option>
												   </select>
						                      </div>
						                      <div class="dokan-form-group">
						                          <label for="product_tag" class="form-label">Tags</label>
						                          <select multiple="multiple" name="product_tag[]" id="product_tag_search" class="product_tag_search product_tags dokan-form-control dokan-select2" data-placeholder="Select product tags"></select>
						                      </div>
						                      <div class="dokan-form-group">
						                          <textarea name="post_excerpt" id="" class="dokan-form-control" rows="5" placeholder="Enter some short description about this product..."></textarea>
						                      </div>
						                  </div>
						              </div>
						              <div class="product-container-footer">
						                  <span class="dokan-show-add-product-error"></span>
						                  <span class="dokan-show-add-product-success"></span>
						                  <span class="dokan-spinner dokan-add-new-product-spinner dokan-hide"></span>
						                  <input type="submit" id="dokan-create-new-product-btn" class="dokan-btn dokan-btn-default" data-btn_id="create_new" value="Create product">
						                    <input type="submit" id="dokan-create-and-add-new-product-btn" class="dokan-btn dokan-btn-theme" data-btn_id="create_and_new" value="Create &amp; add new">
						              </div>
						          </form>
						      </div>
						   </script>
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
