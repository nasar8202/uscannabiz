<div class="et_pb_module et_pb_wc_related_products et_pb_wc_related_products_0_tb_body et_pb_bg_layout_">
    <div class="et_pb_module_inner">
       <section class="related products">
          <h2>Related products</h2>
          @foreach ($mightAlsoLike as $product)
          <ul class="products columns-4">
             <li class="et_pb_post product type-product post-177 status-publish first instock product_cat-flowers product_cat-distillate product_cat-trim-fresh-frozen product_cat-clones-teens has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <a href="{{ route('shop.showProduct', $product->slug ?? $product->products[0]->slug) }}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                   <span class="et_shop_image"><img width="51" height="53" src="{{ productImage($product->product_image ?? $product->products[0]->product_image) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy"><span class="et_overlay"></span></span>
                   <h2 class="woocommerce-loop-product__title">{{ $product->product_name ?? $product->products[0]->product_name }}</h2>
                   <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>{{ $product->product_current_price ?? $product->products[0]->product_current_price }}</bdi></span></span>
                </a>
             </li>

          </ul>
          @endforeach
       </section>
    </div>
 </div>

