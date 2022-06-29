@extends('front.layout.app')
@section('title', 'Add to cart')

@section('content')
<style type="text/css">
	.et_pb_section_0_tb_footer.et_pb_section{padding-bottom:20px;background-color:#0D4400!important}.et_pb_row_0_tb_footer.et_pb_row{padding-top:0px!important;padding-bottom:0px!important;padding-top:0px;padding-bottom:0px}.et_pb_image_0_tb_footer{margin-bottom:20px!important;text-align:left;margin-left:0}.et_pb_text_0_tb_footer.et_pb_text,.et_pb_text_5_tb_footer.et_pb_text,.et_pb_text_7_tb_footer.et_pb_text{color:#FFFFFF!important}.et_pb_text_0_tb_footer{font-size:18px;margin-bottom:30px!important}.et_pb_text_1_tb_footer h5{font-family:'Montserrat',Helvetica,Arial,Lucida,sans-serif;font-weight:600;font-size:25px;color:#FFFFFF!important}.et_pb_text_1_tb_footer{margin-bottom:15px!important}.et_pb_social_media_follow_0_tb_footer li a.icon:before{font-size:20px;line-height:40px;height:40px;width:40px}.et_pb_social_media_follow_0_tb_footer li a.icon{height:40px;width:40px}.et_pb_text_4_tb_footer h4,.et_pb_text_2_tb_footer h4,.et_pb_text_3_tb_footer h4{font-weight:600;font-size:25px;color:#FFFFFF!important}.et_pb_text_3_tb_footer,.et_pb_text_2_tb_footer,.et_pb_text_4_tb_footer{margin-bottom:20px!important}.et_pb_sidebar_1_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area li,.et_pb_sidebar_1_tb_footer.et_pb_widget_area li:before,.et_pb_sidebar_1_tb_footer.et_pb_widget_area a,.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_0_tb_footer.et_pb_widget_area li,.et_pb_sidebar_0_tb_footer.et_pb_widget_area li:before,.et_pb_sidebar_0_tb_footer.et_pb_widget_area a{font-size:18px;color:#FFFFFF!important}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_text_5_tb_footer{line-height:1.4em;font-size:18px;line-height:1.4em;margin-bottom:30px!important}.et_pb_row_1_tb_footer.et_pb_row{padding-top:0px!important;padding-top:0px}.et_pb_text_7_tb_footer{font-size:18px}@media only screen and (max-width:980px){.et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}@media only screen and (max-width:767px){.et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}.et_pb_wc_cart_notice_0 .woocommerce-message,.et_pb_wc_cart_notice_0 .woocommerce-info,.et_pb_wc_cart_notice_0 .woocommerce-error{padding-top:15px!important;padding-right:15px!important;padding-bottom:15px!important;padding-left:15px!important;margin-top:0em!important;margin-right:0em!important;margin-bottom:2em!important;margin-left:0em!important}body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="apply_coupon"],body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="update_cart"]:not([disabled]),body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="apply_coupon"]:hover,body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="update_cart"]:not([disabled]):hover{padding:0.3em 1em!important}body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="apply_coupon"]:before,body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="update_cart"]:not([disabled]):before,body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="apply_coupon"]:after,body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="update_cart"]:not([disabled]):after{display:none!important}.et_pb_wc_cart_products_0 table.shop_table,.et_pb_wc_cart_totals_0 table.shop_table{border-collapse:separate;border-spacing:0px 0px}body #page-container .et_pb_section .et_pb_wc_cart_totals_0 a.checkout-button.button,.et_pb_wc_cart_totals_0 button.button{padding-top:0.3em!important;padding-right:1em!important;padding-bottom:0.3em!important;padding-left:1em!important}.et_pb_wc_cart_totals_0 .select2-container--default .select2-selection--single .select2-selection__arrow b{margin-left:calc(-0px - 4px)}@media only screen and (max-width:980px){body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-forward,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 button.button,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-backward,body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="apply_coupon"],body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="update_cart"]:not([disabled]),body #page-container .et_pb_section .et_pb_wc_cart_totals_0 a.checkout-button,body #page-container .et_pb_section .et_pb_wc_cart_totals_0 button.button{font-size:16px!important}body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-forward:after,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 button.button:after,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-backward:after,body #page-container .et_pb_section .et_pb_wc_cart_totals_0 a.checkout-button:after,body #page-container .et_pb_section .et_pb_wc_cart_totals_0 button.button:after{display:inline-block;opacity:0;font-size:1.6em}body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-forward:hover:after,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 button.button:hover:after,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-backward:hover:after,body #page-container .et_pb_section .et_pb_wc_cart_totals_0 a.checkout-button:hover:after,body #page-container .et_pb_section .et_pb_wc_cart_totals_0 button.button:hover:after{opacity:1}body.et_button_custom_icon #page-container .et_pb_wc_cart_notice_0 .wc-forward,.et_pb_wc_cart_notice_0 button.button,.et_pb_wc_cart_notice_0 .wc-backward:after,body.et_button_custom_icon #page-container .et_pb_wc_cart_totals_0 a.checkout-button,.et_pb_wc_cart_totals_0 button.button:after{font-size:16px}.et_pb_wc_cart_products_0 table.shop_table,.et_pb_wc_cart_totals_0 table.shop_table{border-collapse:separate;border-spacing:0px 0px}}@media only screen and (max-width:767px){body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-forward,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 button.button,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-backward,body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="apply_coupon"],body #page-container .et_pb_section .et_pb_wc_cart_products_0 table.cart button[name="update_cart"]:not([disabled]),body #page-container .et_pb_section .et_pb_wc_cart_totals_0 a.checkout-button,body #page-container .et_pb_section .et_pb_wc_cart_totals_0 button.button{font-size:14px!important}body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-forward:after,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 button.button:after,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-backward:after,body #page-container .et_pb_section .et_pb_wc_cart_totals_0 a.checkout-button:after,body #page-container .et_pb_section .et_pb_wc_cart_totals_0 button.button:after{display:inline-block;opacity:0;font-size:1.6em}body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-forward:hover:after,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 button.button:hover:after,body #page-container .et_pb_section .et_pb_wc_cart_notice_0 .wc-backward:hover:after,body #page-container .et_pb_section .et_pb_wc_cart_totals_0 a.checkout-button:hover:after,body #page-container .et_pb_section .et_pb_wc_cart_totals_0 button.button:hover:after{opacity:1}body.et_button_custom_icon #page-container .et_pb_wc_cart_notice_0 .wc-forward,.et_pb_wc_cart_notice_0 button.button,.et_pb_wc_cart_notice_0 .wc-backward:after,body.et_button_custom_icon #page-container .et_pb_wc_cart_totals_0 a.checkout-button,.et_pb_wc_cart_totals_0 button.button:after{font-size:14px}.et_pb_wc_cart_products_0 table.shop_table,.et_pb_wc_cart_totals_0 table.shop_table{border-collapse:separate;border-spacing:0px 0px}}
</style>

        <div id="main-content">
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($cartCollection->count() > 0)
            <article id="post-12" class="post-12 page type-page status-publish hentry">
                <div class="entry-content">
                    <div class="et-l et-l--post">
                        <div class="et_builder_inner_content et_pb_gutters3 product">
                            <div class="et_pb_section et_pb_section_0 et_section_regular">
                                <div class="et_pb_row et_pb_row_0">
                                    <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                        <div class="et_pb_module et_pb_post_title et_pb_post_title_0 et_pb_bg_layout_light  et_pb_text_align_left">
                                            <div class="et_pb_title_container">
                                                <h1 class="entry-title">{{ $cartCollection->count() }} item(s) in Shopping Cart</h1>
                                            </div>
                                        </div>
                                        <div class="et_pb_module et_pb_wc_cart_notice et_pb_wc_cart_notice_0 woocommerce et_pb_fields_layout_default et_pb_bg_layout_  et_pb_text_align_left">
                                            <div class="et_pb_module_inner">
                                                <div class="woocommerce-notices-wrapper"></div>
                                            </div>
                                        </div>
                                        <div class="et_pb_module et_pb_wc_cart_products et_pb_wc_cart_products_0 woocommerce-cart woocommerce et_pb_woo_custom_button_icon et_pb_row_layout_default">
                                            <div class="et_pb_module_inner">
                                                <form class="woocommerce-cart-form" action="https://webprojectmockup.com/wp/uscannabiz/cart/" method="post">
                                                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                                        cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-remove">&nbsp;</th>
                                                                <th class="product-thumbnail">&nbsp;</th>
                                                                <th class="product-name">Product</th>
                                                                <th class="product-price">Price</th>
                                                                <th class="product-quantity">Quantity</th>
                                                                <th class="product-subtotal">Subtotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (Cart::content() as $item)

                                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                                <td class="product-remove">
                                                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST" class="removeItem">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}

                                                                        <button type="submit" class="cart-options"><i class="fa fa-trash" style="color:red "></i></button>
                                                                    </form>
                                                                    {{-- <a href="https://webprojectmockup.com/wp/uscannabiz/cart/?remove_item=00ec53c4682d36f5c4359f4ae7bd7ba1&amp;_wpnonce=c226e5ce15"
                                                                        class="remove" aria-label="Remove this item"
                                                                        data-product_id="381" data-product_sku="">×</a> --}}
                                                                </td>
                                                                <td class="product-thumbnail">
                                                                    <a href="{{ route('shop.showProduct', $item->model->slug) }}"><img width="300" height="300" src="{{ productImage($item->model->product_image) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy"></a>
                                                                </td>
                                                                <td class="product-name" data-title="Product">
                                                                    <a
                                                                        href="{{ route('shop.showProduct', $item->model->slug) }}">{{ $item->model->product_name }}</a>
                                                                    <dl class="variation">
                                                                        <dt class="variation-Vendor">Vendor:</dt>
                                                                        <dd class="variation-Vendor">
                                                                            <p>store1</p>
                                                                        </dd>
                                                                    </dl>
                                                                </td>

                                                                <td class="product-price" data-title="Price">
                                                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol"></span>{{$item->price}}</bdi></span>
                                                                </td>

                                                                <td class="product-quantity" data-title="Quantity">
                                                                    <div class="quantity">
                                                                        <label class="screen-reader-text"
                                                                            for="quantity_62bbfed33c3af">abc-shirt
                                                                            quantity</label>
                                                                        <input type="number" id="quantity_62bbfed33c3af"
                                                                            class="input-text qty text quantity" step="1"
                                                                            min="0" max=""
                                                                            name="cart[00ec53c4682d36f5c4359f4ae7bd7ba1][qty]"
                                                                            value="{{$item->qty}}" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->product_qty }}" title="Qty" size="4"
                                                                            placeholder="" inputmode="numeric">
                                                                    </div>
                                                                </td>

                                                                <td class="product-subtotal" data-title="Subtotal">
                                                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol"></span>{{ presentPrice($item->total()) }}</bdi></span>
                                                                </td>
                                                            </tr>

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </form>
                                                <div class="cart-collaterals">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="et_pb_row et_pb_row_1">
                                    <div class="et_pb_column et_pb_column_1_2 et_pb_column_1  et_pb_css_mix_blend_mode_passthrough">
                                        <div class="et_pb_module et_pb_wc_cross_sells et_pb_wc_cross_sells_0 ">
                                            <div class="et_pb_module_inner">

                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="et_pb_column et_pb_column_1_2 et_pb_column_2  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                        <div class="et_pb_module et_pb_wc_cart_totals et_pb_wc_cart_totals_0 woocommerce-cart et_pb_woo_custom_button_icon">
                                            <div class="et_pb_module_inner">
                                                <div class="cart_totals ">
                                                    <h2>Cart totals</h2>
                                                    <table cellspacing="0" class="shop_table shop_table_responsive">
                                                        <tbody>
                                                            <tr class="cart-subtotal">
                                                                <th>Subtotal</th>
                                                                <td data-title="Subtotal"><span
                                                                        class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol"></span>{{ presentPrice(Cart::subtotal()) }}</bdi></span>
                                                                </td>
                                                            </tr>
                                                            <tr class="order-total">
                                                                <th>Total</th>
                                                                <td data-title="Total">
                                                                    <strong><span class="woocommerce-Price-amount amount"><bdi>
                                                                    <span class="woocommerce-Price-currencySymbol"></span>{{ presentPrice(Cart::total()) }}</bdi></span>
                                                                </strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="wc-proceed-to-checkout">
                                                        <a href="{{ route('checkout.index') }}"
                                                            class="checkout-button button alt wc-forward">
                                                            Proceed to checkout</a>
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
            @else
                <h3>No items in Cart!</h3>
                <div class="spacer"></div>
                <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                <div class="spacer"></div>
            @endif
        </div>

@endsection

@section('extra-js')

    <script>
        (function() {
            $(".quantity").on('change', function() {
                const id = $(this).data('id');
                const productQuantity = $(this).attr('data-productQuantity');
                console.log(productQuantity)
                $.ajax({
                    url: `cart/update/${id}`,
                    type: 'PATCH',
                    data: {
                        quantity: $(this).val(),
                        productQuantity: productQuantity,
                        "_token": $("meta[name='csrf-token']").attr('content')
                    },
                    success: function() {
                        window.location.href = '{{ route('cart.index') }}';
                    },
                    error: function() {
                        window.location.href = '{{ route('cart.index') }}'
                    }
                })
            })
        })();
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
