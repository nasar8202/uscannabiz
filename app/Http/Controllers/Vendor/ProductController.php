<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;

use App\Models\Category;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductMetaData;
use App\Models\RelatedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class ProductController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $vendor_id = Auth::user()->id;

        $product = DB::table('products')->where('vender_id',$vendor_id)->get();

        return view('vendor.product.index',compact(['category',$category ,'product',$product]));
    }
    public function addProductForm()
    {
        $categories = Category::get();
        $products = Product::whereStatus(1)->get();
        return view('Vendor.product.addProductForm',compact('categories','products'));
    }
    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), array(

            'product_name' => 'required',
            'product_sku' => 'required|unique:products,sku,',
            'product_slug' => 'required|unique:products,slug,',
            'current_price' => 'required|numeric',
            'description' => 'required',
            'product_image_first' => 'required',
            // 'manufacturer' => 'required',
        ));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //image uploading
            DB::beginTransaction();
            try{
                if ($request->file('product_image_first')) {
                    $product_image_first = time() . '_' . $request->file('product_image_first')->getClientOriginalName();
                    //            $product_image_first_path = $request->file('product_image_first')->storeAs('products', $product_image_first);
                    $request->file('product_image_first')->move(public_path() . '/uploads/products/', $product_image_first);
                } else {
                    $product_image_first = null;
                }

                $product = Product::create([
                    'category_id' => $request->get('main_category'),
                    'product_name' => $request->get('product_name'),
                    'sku' => $request->get('product_sku'),
                    'slug' => $request->get('product_slug'),
                    'product_current_price' => $request->get('current_price'),
                    'product_sale' => $request->get('product_sale') ?? 'no',
                    'product_sale_percentage' => $request->get('product_sale_percentage') ?? 0,
                    'product_stock' => $request->get('product_stock') ?? 'no',
                    'product_qty' => $request->get('product_stock_qty') ?? '0',
                    'product_type' => $request->get('product_featured'),
                    'length' => 11,
                    'width' => 11,
                    'height' => 1,
                    'weight' => 2,
                    'description' => $request->get('description'),
                    'status' => $request->get('status') ?? 0,
                    'product_image' => $product_image_first,
                    'vender_id' => Auth::user()->id,

                ]);

                if ($request->get('meta-title') !== null && $request->get('meta-description') !== null && $request->get('meta-keywords') !== null) {
                    ProductMetaData::create([
                        'product_id' => $product->id,
                        'meta_tag_title' => $request->get('meta-title'),
                        'meta_tag_description' => $request->get('meta-description'),
                        'meta_tag_keywords' => $request->get('meta-keywords'),
                        'status' => 1,
                    ]);
                }

                // if ($request->file('product_image')) {

                //     foreach ($request->file('product_image') as $key => $product_image) {
                //         $product_image_ad = time() . '_' . $product_image->getClientOriginalName();
                //         $product_image_ad_path = $product_image->storeAs('products', $product_image_ad);
                //         $product_image->move(public_path() . '/uploads/products/', $product_image_ad);

                //         ProductImage::create([
                //             'products_id' => $product->id,
                //             'product_images' => $product_image_ad
                //         ]);
                //     }
                // }

                // Related Products
                if (!empty($request->get('related_prod_id'))) {
                    foreach ($request->get('related_prod_id') as $relatedProduct) {
                        RelatedProduct::create([
                            'product_id' => $product->id,
                            'related_id' => $relatedProduct
                        ]);
                    }
                }


            }
            catch(\Illuminate\Database\QueryException $e)
            {
                // back to form with errors
                DB::rollback();
                return Redirect()->back()
                    ->with('error',$e->getMessage() )
                    ->withInput();

            }catch(\Exception $e)
            {
                DB::rollback();
                return Redirect()->back()
                    ->with('error',$e->getMessage() )
                    ->withInput();
            }
            DB::commit();

        return back()->with(['success' => 'Product Added Successfully']);



        // $product = new Product;
        // $product->category_id = $request->input('main_category');
        // $product->product_name = $request->input('product_name');
        // $product->product_current_price = $request->input('current_price');
        // $product->sku = $request->input('product_sku');
        // $product->slug = $request->input('product_slug');
        // $product->product_sale_percentage = $request->input('product_sale_percentage');
        // $product->product_sale = $request->input('product_sale');
        // $product->product_stock = $request->input('product_stock');
        // $product->product_qty = $request->input('product_stock_qty');
        // $product->status = $request->input('status');
        // $product->description = $request->input('description');
        // $product->save();
        // $product_id = $product->id;
        // if($product){

        //     $meta->product_id = $product_id;
        //     $meta->meta_tag_title = $product_id;


        // }

    }

    public function checkProductSkuVendor(Request $request)
    {

        $sku = $request->sku;

        $product_sku = Product::where('sku', $sku)->count();

        return response()->json([
            'product_sku' => $product_sku
        ]);
    }
    public function vendorAddProductForm(Request $request,$id)
    {
        $data = Product::find($id);

        return view('front.shop.vendorAddProductForm',compact(['data',$data ]));
    }
    public function destroyProduct($id)
    {

        $product = DB::table('products')->where('id',$id)->delete();
        $meta = DB::table('products_meta_data')->where('product_id',$id)->delete();
        if($product){


        return back()->with(['success' => 'Product Deleted Successfully']);
        }
        else{

            return back()->with(['error' => 'Something Error']);
        }

    }
    public function editProduct($id)
    {
       $product = Product::where('id',$id)->first();
       $meta = ProductMetaData::where('product_id',$id)->first();
       $relatedProducts = Product::whereStatus(1)->get();
        $categories = Category::get();
        return view('Vendor.product.editProductForm',compact('categories','product','relatedProducts','meta'));



    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        //image uploading

        if ($request->file('product_image_first')) {
            $product_image_first = time() . '_' . $request->product_image_first->getClientOriginalName();
            //            $product_image_first_path = $request->file('product_image_first')->storeAs('products', $product_image_first);
            $request->file('product_image_first')->move(public_path() . '/uploads/products/', $product_image_first);
            $product->product_image = $product_image_first;
        } else {
            $product_image_first = null;
        }

        $product->category_id  = $request->get('main_category');
        $product->sub_category_id = $request->get('sub_category');
        $product->product_name = $request->get('product_name');
        $product->description = $request->get('description');
        $product->sku = $request->get('product_sku');
        $product->slug = $request->get('product_slug');
        $product->product_current_price = $request->get('current_price');
        $product->product_sale = $request->get('product_sale') ?? 'no';
        $product->product_sale_percentage = $request->get('product_sale_percentage') ?? 0;
        $product->product_stock = $request->get('product_stock') ?? 'no';
        $product->product_qty = $request->get('product_stock_qty');
        $product->product_type = $request->get('product_featured');
        $product->length = 145;
        $product->width = 12;
        $product->height = 12;
        $product->weight = 11;
        
        $product->vender_id = Auth::user()->id;
        $product->save();

        ProductMetaData::updateOrCreate([
            'product_id' => $product->id,
        ], [
            'product_id' => $product->id,
            'meta_tag_title' => $request->get('meta-title'),
            'meta_tag_description' => $request->get('meta-description'),
            'meta_tag_keywords' => $request->get('meta-keywords'),
            'status' => 1,
        ]);



        if (!empty($request->get('related_prod_id'))) {
            foreach ($request->get('related_prod_id') as $relatedProduct) {
                RelatedProduct::updateOrCreate([
                    'product_id' => $product->id,
                    'related_id' => $relatedProduct
                ]);
            }
        }

    return back()->with(['success' => 'Product Updated Successfully']);


    }
}
