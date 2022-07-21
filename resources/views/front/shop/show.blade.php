@extends('front.layout.app')

@section('title', 'Products')


@section('content')
<style id="et-builder-module-design-179-cached-inline-styles">.et-db #et-boc .et-l .et_pb_section_0_tb_footer.et_pb_section{padding-bottom:20px;background-color:#0D4400!important}.et-db #et-boc .et-l .et_pb_row_0_tb_footer.et_pb_row{padding-top:0px!important;padding-bottom:0px!important;padding-top:0px;padding-bottom:0px}.et-db #et-boc .et-l .et_pb_image_0_tb_footer{margin-bottom:20px!important;text-align:left;margin-left:0}.et-db #et-boc .et-l .et_pb_text_0_tb_footer.et_pb_text,.et-db #et-boc .et-l .et_pb_text_5_tb_footer.et_pb_text,.et-db #et-boc .et-l .et_pb_text_7_tb_footer.et_pb_text{color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_0_tb_footer{font-size:18px;margin-bottom:30px!important}.et-db #et-boc .et-l .et_pb_text_1_tb_footer h5{font-family:'Montserrat',Helvetica,Arial,Lucida,sans-serif;font-weight:600;font-size:25px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_1_tb_footer{margin-bottom:15px!important}.et-db #et-boc .et-l .et_pb_social_media_follow_0_tb_footer li a.icon:before{font-size:20px;line-height:40px;height:40px;width:40px}.et-db #et-boc .et-l .et_pb_social_media_follow_0_tb_footer li a.icon{height:40px;width:40px}.et-db #et-boc .et-l .et_pb_text_4_tb_footer h4,.et-db #et-boc .et-l .et_pb_text_2_tb_footer h4,.et-db #et-boc .et-l .et_pb_text_3_tb_footer h4{font-weight:600;font-size:25px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_text_3_tb_footer,.et-db #et-boc .et-l .et_pb_text_2_tb_footer,.et-db #et-boc .et-l .et_pb_text_4_tb_footer{margin-bottom:20px!important}.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area li,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area li:before,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area a,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area li,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area li:before,.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area a{font-size:18px;color:#FFFFFF!important}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_text_5_tb_footer{line-height:1.4em;font-size:18px;line-height:1.4em;margin-bottom:30px!important}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:0px!important;padding-top:0px}.et-db #et-boc .et-l .et_pb_text_7_tb_footer{font-size:18px}@media only screen and (max-width:980px){.et-db #et-boc .et-l .et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}@media only screen and (max-width:767px){.et-db #et-boc .et-l .et_pb_image_0_tb_footer .et_pb_image_wrap img{width:auto}.et-db #et-boc .et-l .et_pb_sidebar_0_tb_footer.et_pb_widget_area,.et-db #et-boc .et-l .et_pb_sidebar_1_tb_footer.et_pb_widget_area{border-right-color:RGBA(255,255,255,0)}.et-db #et-boc .et-l .et_pb_row_1_tb_footer.et_pb_row{padding-top:20px!important;padding-top:20px!important}}</style>
<div class="container">
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
</div>
<div class="archive tax-product_cat theme-Divi et-tb-has-template et-tb-has-footer woocommerce woocommerce-page woocommerce-js et_button_no_icon et_pb_button_helper_class et_fixed_nav et_show_nav et_secondary_nav_enabled et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_left et_cover_background et_pb_gutter windows et_pb_gutters3 et_left_sidebar et_divi_theme et-db dokan-theme-Divi customize-support chrome">
<div id="main-content">
  <div class="container">
     <div id="content-area" class="clearfix">
        <div id="left-area">
           <nav class="woocommerce-breadcrumb"><a href="">Home</a>&nbsp;&#47;&nbsp;{{$title}}</nav>
           <header class="woocommerce-products-header">
              <h1 class="woocommerce-products-header__title page-title">{{$title}}</h1>
           </header>
           <div class="woocommerce-notices-wrapper"></div>
           <p class="woocommerce-result-count">
              Showing all {{$productCount?? 0}} results
           </p>
           {{-- <form class="woocommerce-ordering" method="get">
              <select name="orderby" class="orderby" aria-label="Shop order">
                 <option value="menu_order" selected>Default sorting</option>
                 <option value="popularity">Sort by popularity</option>
                 <option value="rating">Sort by average rating</option>
                 <option value="date">Sort by latest</option>
                 <option value="price">Sort by price: low to high</option>
                 <option value="price-desc">Sort by price: high to low</option>
              </select>
              <input type="hidden" name="paged" value="1">
           </form> --}}
           <ul class="products columns-3" style="display:flex;flex-wrap:wrap;">
            @forelse ($products as $product)

            <li class="product type-product post-179 status-publish first instock product_cat-business-licenses-for-sales product_cat-cartridges-vapes product_cat-clones-teens product_cat-concentrates product_cat-distillate product_cat-edibles product_cat-equipment-for-sale product_cat-flowers product_cat-prerolls product_cat-trim-fresh-frozen product_cat-white-label has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <a href="{{ route('shop.showProduct', $product->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <span class="et_shop_image"><img width="51" height="53" src="{{ productImage($product->product_image) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy"><span class="et_overlay"></span></span>
                    <h2 class="woocommerce-loop-product__title">{{$product->product_name}}</h2>
                    {{-- <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>{{$product->product_current_price}}</bdi></span></span> --}}
                </a>
                @if(Auth::check())
                        <a href="javascript:void(0)" data-product="{{ $product->id }}" @if(isset($product->whishlist)) data-wishlist='{{ $product->whishlist->id }}' @endif data-customer="{{ Auth::id() ?? 0 }}" class="grey @if(!isset($product->whishlist)) add_to_wishlist @else remove_to_wishlist wishlist-added @endif">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    @endif
            </li>
                @empty
                    <div style="text-align: left">Category has No Products found</div>
                @endforelse
           </ul>
        </div>
        <div id="sidebar">
           <div id="block-2" class="et_pb_widget widget_block widget_search">
              <form role="search" method="get" action="/" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
                 <label for="wp-block-search__input-1" class="wp-block-search__label">Search</label>
                 <div class="wp-block-search__inside-wrapper ">
                    <input type="search" id="wp-block-search__input-1" class="wp-block-search__input " name="s" value="" placeholder="" required><button type="submit" class="wp-block-search__button  ">Search</button>
                 </div>
              </form>
           </div>
           <div id="block-3" class="et_pb_widget widget_block">
              <div class="wp-container-62b360594849d wp-block-group">
                 <div class="wp-block-group__inner-container">
                    <h2>Recent Posts</h2>
                    <ul class="wp-block-latest-posts__list wp-block-latest-posts">
                       <li><a href="/2022/03/22/hello-world/">Hello world!</a></li>
                    </ul>
                 </div>
              </div>
           </div>
           <div id="block-4" class="et_pb_widget widget_block">
              <div class="wp-container-62b3605948af9 wp-block-group">
                 <div class="wp-block-group__inner-container">
                    <h2>Recent Comments</h2>
                    <ol class="wp-block-latest-comments">
                       <li class="wp-block-latest-comments__comment">
                          <article>
                             <footer class="wp-block-latest-comments__comment-meta"><a class="wp-block-latest-comments__comment-author" href="https://wordpress.org/">A WordPress Commenter</a> on <a class="wp-block-latest-comments__comment-link" href="/2022/03/22/hello-world/#comment-1">Hello world!</a></footer>
                          </article>
                       </li>
                    </ol>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>





@endsection


@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
{{--    <script src="{{ asset('js/algolia.js') }}"></script>--}}
@endsection
