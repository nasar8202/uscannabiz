@extends('front.layout.app')

@section('title', 'Products')

@section('content')
    <style type="text/css">
        .et_pb_section_0_tb_footer.et_pb_section {
            padding-bottom: 20px;
            background-color: #0D4400 !important
        }
        .w-100{
            width:100% !important;
        }

        .et_pb_row_0_tb_footer.et_pb_row {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
            padding-top: 0px;
            padding-bottom: 0px
        }

        .et_pb_image_0_tb_footer {
            margin-bottom: 20px !important;
            text-align: left;
            margin-left: 0
        }

        .et_pb_text_0_tb_footer.et_pb_text,
        .et_pb_text_5_tb_footer.et_pb_text,
        .et_pb_text_7_tb_footer.et_pb_text {
            color: #FFFFFF !important
        }

        .et_pb_text_0_tb_footer {
            font-size: 18px;
            margin-bottom: 30px !important
        }

        .et_pb_text_1_tb_footer h5 {
            font-family: 'Montserrat', Helvetica, Arial, Lucida, sans-serif;
            font-weight: 600;
            font-size: 25px;
            color: #FFFFFF !important
        }

        .et_pb_text_1_tb_footer {
            margin-bottom: 15px !important
        }

        .et_pb_social_media_follow_0_tb_footer li a.icon:before {
            font-size: 20px;
            line-height: 40px;
            height: 40px;
            width: 40px
        }

        .et_pb_social_media_follow_0_tb_footer li a.icon {
            height: 40px;
            width: 40px
        }

        .et_pb_text_4_tb_footer h4,
        .et_pb_text_2_tb_footer h4,
        .et_pb_text_3_tb_footer h4 {
            font-weight: 600;
            font-size: 25px;
            color: #FFFFFF !important
        }

        .et_pb_text_3_tb_footer,
        .et_pb_text_2_tb_footer,
        .et_pb_text_4_tb_footer {
            margin-bottom: 20px !important
        }

        .et_pb_sidebar_1_tb_footer.et_pb_widget_area,
        .et_pb_sidebar_1_tb_footer.et_pb_widget_area li,
        .et_pb_sidebar_1_tb_footer.et_pb_widget_area li:before,
        .et_pb_sidebar_1_tb_footer.et_pb_widget_area a,
        .et_pb_sidebar_0_tb_footer.et_pb_widget_area,
        .et_pb_sidebar_0_tb_footer.et_pb_widget_area li,
        .et_pb_sidebar_0_tb_footer.et_pb_widget_area li:before,
        .et_pb_sidebar_0_tb_footer.et_pb_widget_area a {
            font-size: 18px;
            color: #FFFFFF !important
        }

        .et_pb_sidebar_0_tb_footer.et_pb_widget_area,
        .et_pb_sidebar_1_tb_footer.et_pb_widget_area {
            border-right-color: RGBA(255, 255, 255, 0)
        }

        .et_pb_text_5_tb_footer {
            line-height: 1.4em;
            font-size: 18px;
            line-height: 1.4em;
            margin-bottom: 30px !important
        }

        .et_pb_row_1_tb_footer.et_pb_row {
            padding-top: 0px !important;
            padding-top: 0px
        }

        .et_pb_text_7_tb_footer {
            font-size: 18px
        }

        @media only screen and (max-width:980px) {
            .et_pb_image_0_tb_footer .et_pb_image_wrap img {
                width: auto
            }

            .et_pb_sidebar_0_tb_footer.et_pb_widget_area,
            .et_pb_sidebar_1_tb_footer.et_pb_widget_area {
                border-right-color: RGBA(255, 255, 255, 0)
            }

            .et_pb_row_1_tb_footer.et_pb_row {
                padding-top: 20px !important;
                padding-top: 20px !important
            }
        }

        @media only screen and (max-width:767px) {
            .et_pb_image_0_tb_footer .et_pb_image_wrap img {
                width: auto
            }

            .et_pb_sidebar_0_tb_footer.et_pb_widget_area,
            .et_pb_sidebar_1_tb_footer.et_pb_widget_area {
                border-right-color: RGBA(255, 255, 255, 0)
            }

            .et_pb_row_1_tb_footer.et_pb_row {
                padding-top: 20px !important;
                padding-top: 20px !important
            }
        }

        .et_pb_section_0.et_pb_section {
            padding-top: 0px
        }

        .et_pb_row_0.et_pb_row {
            padding-top: 0px !important;
            padding-top: 0px
        }

        .et_pb_text_0 h2 {
            font-weight: 600;
            font-size: 14px;
            color: #FFFFFF !important;
            text-align: center
        }

        .et_pb_text_0 {
            background-color: #0D4400;
            border-radius: 31px 31px 31px 31px;
            overflow: hidden;
            padding-top: 15px !important;
            padding-bottom: 5px !important;
            margin-top: 30px !important;
            margin-right: 10px !important;
            margin-bottom: 20px !important
        }

        .et_pb_sidebar_0.et_pb_widget_area {
            border-top-color: RGBA(255, 255, 255, 0);
            border-right-color: RGBA(255, 255, 255, 0);
            border-left-color: RGBA(255, 255, 255, 0)
        }

        .et_pb_sidebar_0 {
            padding-top: 10px
        }

        .et_pb_text_1 h1 {
            font-weight: 600;
            font-size: 39px;
            color: #FFFFFF !important
        }

        .et_pb_text_1 {
            background-image: url(assets/uploads/2022/03/shutterstock_1877216707.jpg);
            padding-top: 100px !important;
            padding-right: 30px !important;
            padding-bottom: 100px !important;
            padding-left: 30px !important;
            margin-bottom: 50px !important
        }

        .et_pb_code_0 {
            padding-right: 15px;
            padding-left: 15px
        }

        .et_pb_text_2 h3 {
            font-weight: 600;
            font-size: 20px;
            color: #000000 !important;
            text-align: center
        }

        .et_pb_text_2 {
            padding-top: 15px !important
        }

        .et_pb_column_0 {
            border-width: 1px;
            border-color: rgba(112, 112, 112, 0.49);
            padding-right: 15px;
            padding-left: 15px
        }

        .et_pb_column_1 {
            border-right-width: 1px;
            border-right-color: rgba(112, 112, 112, 0.49)
        }

        @media only screen and (max-width:980px) {
            .et_pb_sidebar_0.et_pb_widget_area {
                border-top-color: RGBA(255, 255, 255, 0);
                border-right-color: RGBA(255, 255, 255, 0);
                border-left-color: RGBA(255, 255, 255, 0)
            }

            .et_pb_text_1 h1 {
                font-size: 30px
            }

            .et_pb_text_1 {
                background-position: right 0px center;
                background-color: initial
            }

            .et_pb_text_2 h3 {
                font-size: 18px
            }

            .et_pb_column_1 {
                border-right-width: 0px;
                border-right-color: rgba(112, 112, 112, 0.49)
            }
        }

        @media only screen and (max-width:767px) {
            .et_pb_sidebar_0.et_pb_widget_area {
                border-top-color: RGBA(255, 255, 255, 0);
                border-right-color: RGBA(255, 255, 255, 0);
                border-left-color: RGBA(255, 255, 255, 0)
            }

            .et_pb_text_1 h1 {
                font-size: 20px
            }

            .et_pb_text_2 h3 {
                font-size: 16px
            }

            .et_pb_column_1 {
                border-right-width: 0px;
                border-right-color: rgba(112, 112, 112, 0.49)
            }
        }
    </style>
    <div id="main-content">
        <article id="post-34" class="post-34 page type-page status-publish hentry">
            <div class="entry-content">
                <div class="et-l et-l--post">
                    <div class="et_builder_inner_content et_pb_gutters3">
                        <div class="et_pb_section et_pb_section_0 sec-1 et_section_regular">
                            <div class="et_pb_row et_pb_row_0 et_pb_gutters1">
                                <div
                                    class="et_pb_with_border et_pb_column_1_5 et_pb_column et_pb_column_0  et_pb_css_mix_blend_mode_passthrough">
                                    <div
                                        class="et_pb_module et_pb_text et_pb_text_0  et_pb_text_align_left et_pb_bg_layout_light">
                                        <div class="et_pb_text_inner">
                                            <h2>All Categories</h2>
                                        </div>
                                    </div>
                                    <div
                                        class="et_pb_with_border et_pb_module et_pb_sidebar_0 et_pb_widget_area clearfix et_pb_widget_area_left et_pb_bg_layout_light">
                                        <div id="block-9" class="et_pb_widget widget_block">
                                            <div class="wp-container-62b3603e50735 wp-block-group">
                                                <div class="wp-block-group__inner-container">
                                                    <div data-block-name="woocommerce/product-categories"
                                                        data-has-empty="true"
                                                        class="wp-block-woocommerce-product-categories wc-block-product-categories is-list ">
                                                        <ul
                                                            class="wc-block-product-categories-list wc-block-product-categories-list--depth-0">
                                                            {{-- @foreach ($categories as $category)
                                                            @php
                                                                $parent =  App\Models\Category::where('id',$category->parent_id)->first();
                                                                // dd($parent);
                                                            @endphp
                                                            @if($category->parent_id != 0)
                                                            <li class="wc-block-product-categories-list-item">
                                                                <a style="" href="javascript:void(0)">{{$parent->name}}</a>
                                                            <span class="wc-block-product-categories-list-item-count">
                                                                <span aria-hidden="true">7</span><span class="screen-reader-text">7 products</span>
                                                            </span>
                                                            <ul class="wc-block-product-categories-list wc-block-product-categories-list--depth-1">
                                                                <li class="wc-block-product-categories-list-item">
                                                                    <a style="" href="{{ route('productCategory', ['slug' => $category->category_slug,'id'=>$category->id]) }}">{{ $category->name }}</a>
                                                                    <span class="wc-block-product-categories-list-item-count"><span aria-hidden="true">2</span>
                                                                </li>
                                                            </ul>				
                                                            </li>
                                                            @else
                                                            if($category->id == $parent->parent_id)
                                                                <li
                                                                    class="wc-block-product-categories-list-item {{ setActiveCategory($category->slug) }}">
                                                                    <a
                                                                        href="{{ route('productCategory', ['slug' => $category->category_slug,'id'=>$category->id]) }}">{{ $category->name }}</a>
                                                                </li>
                                                            @endif
                                                            @endforeach --}}
                                                            @php
                                                            $p_categories = App\Models\Category::where(['parent_id'=>0,'status'=>1])->get();
                                                            @endphp
                                                        @foreach ($p_categories as $category)
                                                        @php
                                                            $p_categories_sub = App\Models\Category::where(['parent_id'=>$category->id,'status'=>1])->first();
                                                        @endphp
                                                        {{-- @dd($p_categories_sub) --}}
                                                        @if($p_categories_sub)
                                                        <li class="wc-block-product-categories-list-item">
                                                            <a style="" href="javascript:void(0)">{{$category->name}}</a>
                                                            <span class="wc-block-product-categories-list-item-count">
                                                                <span aria-hidden="true">7</span><span class="screen-reader-text">7 products</span>
                                                            </span>
                                                            <ul class="wc-block-product-categories-list wc-block-product-categories-list--depth-1">
                                                                @php
                                                                $p_categories_main = App\Models\Category::where(['parent_id'=>$category->id,'status'=>1])->get();
                                                            @endphp
                                                            @foreach ($p_categories_main as $sub_cat)
                                                            <li class="wc-block-product-categories-list-item {{ setActiveCategory($sub_cat->slug) }}">
                                                                <a style="" href="{{ route('productCategory', ['slug' => $sub_cat->category_slug,'id'=>$sub_cat->id]) }}">{{ $sub_cat->name }}</a>
                                                                <span class="wc-block-product-categories-list-item-count"><span aria-hidden="true">2</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>				
                                                        </li>
                                                        @else
                                                            <li
                                                                class="wc-block-product-categories-list-item {{ setActiveCategory($category->slug) }}">
                                                                <a
                                                                    href="{{ route('productCategory', ['slug' => $category->category_slug,'id'=>$category->id]) }}">{{ $category->name }}</a>
                                                            </li>
                                                        @endif
                                                        @endforeach
                                                            

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="et_pb_with_border et_pb_column_3_5 et_pb_column et_pb_column_1  et_pb_css_mix_blend_mode_passthrough">
                                    <div
                                        class="et_pb_module et_pb_text et_pb_text_1 f-text  et_pb_text_align_left et_pb_bg_layout_light">
                                        <div class="et_pb_text_inner">
                                            <h1>Featured Products</h1>
                                        </div>
                                    </div>
                                    <div class="et_pb_module et_pb_code et_pb_code_0 main-cate">
                                        <div class="et_pb_code_inner">
                                            <div class="woocommerce columns-4">
                                                <ul class="products columns-4" style="display:flex;flex-wrap:wrap;">
                                            @forelse ($categories_for_div as $category)

                                                    <li class="product-category product first">
                                                        
                                                        @if($category->name == 'Seeds')
                                                           <a class="width-100"  href="{{ route('productCategory', ['slug' => $category->category_slug,'id'=>$category->id]) }}">
                                                            <img src="{{asset('uploads/category').'/'.$category->category_image}}"  srcset="{{asset('uploads/category').'/'.$category->category_image}} 300w, {{asset('uploads/category').'/'.$category->category_image}} 150w, {{asset('uploads/category').'/'.$category->category_image}} 100w">
                                                            <h2 class="woocommerce-loop-category__title">
                                                                {{ $category->name }} <mark class="count">(6)</mark>
                                                            </h2>
                                                        </a>
                                                        @else
                                                         <a  href="{{ route('productCategory', ['slug' => $category->category_slug,'id'=>$category->id]) }}">
                                                            <img src="{{asset('uploads/category').'/'.$category->category_image}}"  srcset="{{asset('uploads/category').'/'.$category->category_image}} 300w, {{asset('uploads/category').'/'.$category->category_image}} 150w, {{asset('uploads/category').'/'.$category->category_image}} 100w">
                                                            <h2 class="woocommerce-loop-category__title">
                                                                {{ $category->name }} <mark class="count">(6)</mark>
                                                            </h2>
                                                        </a> 
                                                        @endif
                                                    </li>
                                            @empty
                                                <div style="text-align: left">No items found</div>
                                            @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                     </div>

                                </div>
                                <div
                                    class="et_pb_column et_pb_column_1_5 et_pb_column_2  et_pb_css_mix_blend_mode_passthrough et-last-child">
                                    <div
                                        class="et_pb_module et_pb_text et_pb_text_2  et_pb_text_align_left et_pb_bg_layout_light">
                                        <div class="et_pb_text_inner">
                                            <h3>Featured Products</h3>
                                        </div>
                                    </div>
                                    <div class="et_pb_module et_pb_code et_pb_code_1 recent-pro">
                                        <ul class="products columns-4" style="display:flex;flex-wrap:wrap;">
                                            @forelse ($producttype as $type)

                                                    <li class="product-category product first">
                                                        <a href="{{ route('shop.showProduct', $type->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                            <span class="et_shop_image"><img width="51" height="53" src="{{asset('uploads/products').'/'.$type->product_image}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy"><span class="et_overlay"></span></span>
                                                            <h2 class="woocommerce-loop-product__title">{{$type->product_name}}</h2>
                                                        </a>
                                                    </li>
                                            @empty
                                                <div style="text-align: left">No items found</div>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>



@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    {{-- <script src="{{ asset('js/algolia.js') }}"></script> --}}
    
@endsection
