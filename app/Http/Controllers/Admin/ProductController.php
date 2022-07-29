<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\Category;
use App\Models\CollectionProduct;
use App\Models\CustomerWishlist;
use App\Models\Manufacturer;
use App\Models\Option;
use App\Models\OptionProduct;
use App\Models\OptionValue;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\User;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\ProductMetaData;
use App\Models\RelatedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use App\Notifications\ProductApprovedNotificaton;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (request()->ajax()) {
                return datatables()->of(Product::with('category')->where('approvel_admin_status',1)->orderBy('created_at','desc')->get())
                    ->addIndexColumn()
                    ->addColumn('category_id', function ($data) {
                        return $data->category->name ?? '';
                    })
                    ->addColumn('product_current_price', function ($data) {
                        return $data->product_current_price ?? '';
                    })
                    ->addColumn('status', function ($data) {
                        if ($data->status == 0) {
                            return '<label class="switch"><input type="checkbox"  data-id="' . $data->id . '" data-val="1"  id="status-switch"><span class="slider round"></span></label>';
                        } else {
                            return '<label class="switch"><input type="checkbox" checked data-id="' . $data->id . '" data-val="0"  id="status-switch"><span class="slider round"></span></label>';
                        }
                    })
                    ->addColumn('action', function ($data) {
                        return '<a title="View" href="product/' . $data->id . '" class="btn btn-dark btn-sm"><i class="fas fa-eye"></i></a><button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    })->rawColumns(['status', 'category_id', 'action'])->make(true);
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', 'SomeThing Went Wrong baby');
        }
        return view('admin.product.index');
    }
    public function requestProduct()
    {
        try {
            if (request()->ajax()) {
                return datatables()->of(Product::with('category')->where('approvel_admin_status',0)->orderBy('created_at','desc')->get())
                ->addIndexColumn()
                 ->addColumn('category_id', function ($data) {
                    return $data->category->name ?? '';
                })
                    ->addColumn('action', function ($data) {
                        return '<a title="Approve" href="productStatusAccept/' . $data->id . '"
                        class="btn btn-success btn-sm">Approve &nbsp;<i class="fa fa-check"></i></a>&nbsp;';
                    })->rawColumns([ 'action','category_id'])->make(true);
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', 'SomeThing Went Wrong baby');
        }
        return view('admin.product.product-request');
    }

    public function productStatusAccept($id)
    {

       // $customer =User::join('products','users.id','=','products.vender_id')->select('products.approvel_admin_status','users.email')->where('products.id',$id)->first();

        $customer =Product::where('id',$id)->first();
        $customer->approvel_admin_status = 1;
        $customer->save();
        $user = User::where('id',$customer->vender_id)->first();

// dd($user);
            if($customer->approvel_admin_status = 1)
            {
                $user->notify(new ProductApprovedNotificaton());
            }

            return back()->with('success','Product Approved Successfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainCategories = Category::where('status', 1)->where('parent_id', 0)->get();
        $attributeGroups = AttributeGroup::with('attributes')->get();
        $options = Option::where('status', 1)->get();
        $products = Product::whereStatus(1)->get();
        $manufacturers = Manufacturer::whereStatus(1)->get();

        return view('admin.product.create', compact('mainCategories', 'attributeGroups', 'options', 'products', 'manufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), array(
            'main_category' => 'required',
            'product_name' => 'required',
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
                $timestamp = mt_rand(1, time());
                $product = Product::create([
                    'category_id' => $request->get('main_category'),
                    'sub_category_id' => $request->get('sub_category'),
                    'product_name' => $request->get('product_name'),
                    'sku' => $timestamp." ".$request->get('product_name'),
                    'slug' => $request->get('product_slug'),
                    'product_current_price' => $request->get('current_price'),
                    'product_sale' => $request->get('product_sale') ?? 'no',
                    'product_sale_percentage' => $request->get('product_sale_percentage') ?? 0,
                    'product_stock' => $request->get('product_stock') ?? 'no',
                    'product_qty' => $request->get('product_stock_qty') ?? '0',
                    'product_type' => $request->get('product_featured'),
                    'length' => $request->get('length'),
                    'width' => $request->get('width'),
                    'height' => $request->get('height'),
                    'weight' => $request->get('weight'),
                    'description' => $request->get('description'),
                    'status' => $request->get('status') ?? 0,
                    'product_image' => $product_image_first,
                    'manufacturer_id' => $request->input('manufacturer') ? $request->input('manufacturer') : 0,
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

                if ($request->file('product_image')) {

                    foreach ($request->file('product_image') as $key => $product_image) {
                        $product_image_ad = time() . '_' . $product_image->getClientOriginalName();
                        $product_image_ad_path = $product_image->storeAs('products', $product_image_ad);
                        $product_image->move(public_path() . '/uploads/products/', $product_image_ad);

                        ProductImage::create([
                            'products_id' => $product->id,
                            'product_images' => $product_image_ad
                        ]);
                    }
                }

                //Attributes
                if (!empty($request->get('attribute'))) {
                    foreach ($request->get('attribute') as $keyA => $attributes) {
                        ProductAttribute::create([
                            'product_id' => $product->id,
                            'attribute_id' => $attributes,
                            'value' => $request->get('attribute_value')[$keyA],
                        ]);
                    }
                }

                //Options
                if (!empty($request->get('option_id'))) {
                    foreach ($request->get('option_id') as $keyO => $options) {
                        OptionProduct::create([
                            'product_id' => $product->id,
                            'option_id' => $options,
                            'option_val_id' => $request->get('option_value_id')[$keyO],
                            'price' => $request->get('option_value_price')[$keyO],
                            'qty' => $request->get('option_value_qty')[$keyO]
                        ]);
                    }
                }
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

        return redirect('/admin/product')->with(['success' => 'Product Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->with('product_meta_data', 'product_images', 'products_options', 'products_options.option_val', 'products_attributes', 'products_attributes.attribute')->firstOrFail();
        //        dd($product);
        $product = Product::where('id', $id)->with('product_meta_data', 'product_images', 'products_options', 'products_attributes', 'products_attributes.attribute', 'manufacturer')->firstOrFail();
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->with('product_meta_data', 'product_images', 'products_attributes', 'products_options', 'products_options.option_val')->firstOrFail();
        $mainCategories = Category::where('status', 1)->where('parent_id', 0)->get();
        $subCategories = Category::where('status', 1)->where('parent_id', $product->category_id)->get();
        $attributeGroups = AttributeGroup::with('attributes')->get();
        $options = Option::where('status', 1)->get();
        $option_values = OptionValue::where('status', 1)->get();
        $relatedProducts = RelatedProduct::with('products')->where('product_id', $id)->get();
        $products = Product::whereStatus(1)->where('id', '!=', $id)->get();
        $manufacturers = Manufacturer::whereStatus(1)->get();

        return view('admin.product.edit', compact('product', 'mainCategories','subCategories', 'attributeGroups', 'options', 'relatedProducts', 'products', 'option_values', 'manufacturers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, array(
            'main_category' => 'required',
            'product_name' => 'required',
            'product_slug' => 'required|unique:products,slug,' . $id,
            'current_price' => 'required|numeric',
            'description' => 'required',
            'manufacturer' => 'required',
            'meta-title' => 'required',
            'meta-description' => 'required',
            'meta-keywords' => 'required',

            //'attribute_id' => 'required|exists:attribute',
            //'attribute_value' => 'required|exists:attribute',

        ));

        $product = Product::where('id', $id)->first();

        //image uploading

        if ($request->file('product_image_first')) {
            $product_image_first = time() . '_' . $request->product_image_first->getClientOriginalName();
            //            $product_image_first_path = $request->file('product_image_first')->storeAs('products', $product_image_first);
            $request->file('product_image_first')->move(public_path() . '/uploads/products/', $product_image_first);
            $product->product_image = $product_image_first;
        } else {

            $product_image_first = null;

            $timestamp = mt_rand(1, time());
        }

        $product->category_id  = $request->get('main_category');
        $product->sub_category_id = $request->get('sub_category');
        $product->product_name = $request->get('product_name');
        $product->description = $request->get('description');
        $product->sku = $timestamp." ".$request->get('product_name');
        $product->slug = $request->get('product_slug');
        $product->product_current_price = $request->get('current_price');
        $product->product_sale = $request->get('product_sale') ?? 'no';
        $product->product_sale_percentage = $request->get('product_sale_percentage') ?? 0;
        $product->product_stock = $request->get('product_stock') ?? 'no';
        $product->product_qty = $request->get('product_stock_qty');
        $product->product_type = $request->get('product_featured');
        $product->length = $request->get('length');
        $product->width = $request->get('width');
        $product->height = $request->get('height');
        $product->weight = $request->get('weight');
        $product->status = $request->get('status') ?? 0;
        $product->vender_id = Auth::user()->id;
        $product->manufacturer_id =  $request->input('manufacturer') ? $request->input('manufacturer') : 0;
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

        /* Removing additional images other than ids */
        if (!empty($request->input('saved_images'))) {
            $savedImages = ProductImage::where('product_id', $id)->whereNotIn('id', $request->input('saved_images'))->get();
            if (count($savedImages) > 0) {
                foreach ($savedImages as $image) {
                    $image->delete();
                }
            }
        }else{
            $savedImages = ProductImage::where('product_id', $id)->get();
            if (count($savedImages) > 0) {
                foreach ($savedImages as $image) {
                    $image->delete();
                }
            }
        }
        /* Add additional images */
        if ($request->file('product_image')) {
            foreach ($request->file('product_image') as $key => $product_image) {
                $product_image_ad = time() . '_' . $product_image->getClientOriginalName();
                //                $product_image_ad_path = $product_image->storeAs('products', $product_image_ad);
                $product_image->move(public_path() . '/uploads/products/', $product_image_ad);

                ProductImage::create([
                    'product_id' => $product->id,
                    'product_images' => $product_image_ad,
                ]);
            }
        }
        //Attributes
        ProductAttribute::where('product_id', $id)->delete();
        if (!empty($request->get('attribute'))) {
            foreach ($request->get('attribute') as $keyA => $attributes) {
                ProductAttribute::create([
                    'product_id' => $product->id,
                    'attribute_id' => $attributes,
                    'value' => $request->get('attribute_value')[$keyA],
                ]);
            }
        }

        //Options
        OptionProduct::where('product_id', $id)->delete();
        if (!empty($request->get('option_id'))) {
            foreach ($request->get('option_id') as $keyO => $options) {
                OptionProduct::create([
                    'product_id' => $id,
                    'option_id' => $options,
                    'option_val_id' => $request->get('option_value_id')[$keyO] ?? 0,
                    'price' => $request->get('option_value_price')[$keyO] ?? 0,
                    'qty' => $request->get('option_value_qty')[$keyO] ?? 0
                ]);
            }
        }

        // Related Products
        RelatedProduct::where('product_id', $id)->delete();
        if (!empty($request->get('related_prod_id'))) {
            foreach (array_unique($request->get('related_prod_id')) as $relatedProduct) {
                RelatedProduct::create([
                    'product_id' => $id,
                    'related_id' => $relatedProduct
                ]);
            }
        }

        return redirect()->back()->with(['success' => 'Product Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = OrderItem::where('product_id', $id)->count();
        if ($check > 0) {
            echo 0;
            return;
        }
        // $collectionCheck = CollectionProduct::where('product_id', $id)->count();
        // if ($collectionCheck > 0) {
        //     echo 2;
        //     return;
        // }
        $content = Product::find($id);
        CustomerWishlist::where('product_id', $id)->delete();
        $content->delete(); //
        echo 1;
    }

    public function getSubCategories(Request $request)
    {

        $parent_id = $request->cat_id;

        $subcategories = Category::where('parent_id', $parent_id)->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

    public function checkProductSku(Request $request)
    {

        $sku = $request->sku;

        $product_sku = Product::where('sku', $sku)->count();

        return response()->json([
            'product_sku' => $product_sku
        ]);
    }

    public function checkProductSlug(Request $request)
    {
        $slug = $request->slug;

        $product_slug = Product::where('slug', $slug)->count();

        return response()->json([
            'product_slug' => $product_slug
        ]);
    }

    public function changeProductStatus(Request $request, $id)
    {

        $product = Product::where('id', $id);

        if ($product->count() > 0) {
            $product->update(['status' => $request->val]);
            return 1;
        }
    }

    public function getOptionValues(Request $request)
    {
        $option_id = $request->option_id;

        $OptionValue = OptionValue::where('option_id', $option_id)->get();
        return response()->json([
            'OptionValues' => $OptionValue
        ]);
    }
}
