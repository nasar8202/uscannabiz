<?php

use App\Models\NewsLetter;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Admin\VendorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//ROOT PATH




Route::get('/', 'Front\FrontController@index')->name('homepage');
// login register front
Route::post('/register', 'Front\FrontController@Register')->name('register');
Route::get('/my-account', 'Front\FrontController@loginRegisterVendor')->name('myAccount');
Route::get('/reset', 'Front\FrontController@resetPasswordLink')->name('resetPasswordLink');
Route::post('/registerVendorAndCustomer', 'Front\FrontController@registerVendorAndCustomer')->name('registerVendorAndCustomer');
Route::get('vendor-add-product-form/{id}', 'Vendor\ProductController@vendorAddProductForm')->name('vendorAddProductForm');
Route::view('/thanks', 'front.thanks')->name('order_thanks');
Route::post('/vendor-request', 'Vendor\VendorRequestController@store')->name('vendorRequest_shop');
Route::get('/wishlist', 'Front\ShopController@view_wishlist')->name('shop.view_wishlist');
Route::get('/shop', 'Front\ShopController@index')->name('shop.index');
Route::get('/shop/{slug}', 'Front\ShopController@show')->name('shop.show');
Route::get('/shop/{slug}', 'Front\ShopController@show')->name('shop.showProduct');
Route::post('shop/add-wishlist', 'Front\ShopController@add_wishlist')->name('shop.wishlist');


Route::get('/checkProductPrice', 'Front\ShopController@checkProductPrice')->name('shop.checkProductPrice');
Route::post('/product/review', 'Front\ShopController@addReview')->name('shop.addReview');

Route::get('/product-category/{slug}/{id}', 'Front\ShopController@productCategory')->name('productCategory');


Route::get('/search-products', 'Front\ShopController@search')->name('shop.search-products');
Route::get('/blogs', 'Front\BlogController@index')->name('blogs');
Route::get('/blog-details/{id}', 'Front\BlogController@show')->name('blog-details');


Route::post('/news-letter', 'Front\FrontController@subscribeNewsletter')->name('newsletter');
Route::get('/contact-us', 'Front\ContactUsController@index')->name('contactUs');
Route::post('/submit-contact', 'Front\ContactUsController@submitContact')->name('submitContact');
//ADMIN LOGIN
Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->middleware('guest');

Route::get('/cart', 'Front\CartController@index')->name('cart.index');
Route::patch('/cart/update/{product}', 'Front\CartController@update')->name('cart.update');
Route::post('/cart/store/{product}', 'Front\CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'Front\CartController@destroy')->name('cart.destroy');
//checkout
Route::get('/checkout', 'Front\CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout/checkout', 'Front\CheckoutController@checkout')->name('checkout.checkout');
Route::get('/checkout/success', 'Front\CheckoutController@success')->name('checkout.success');
Route::get('/guestCheckout', 'Front\CheckoutController@index')->name('guestCheckout.index');
Route::post('/stripeCharge', 'Front\PaymentController@stripeCharge')->name('stripeCharge');
Route::post('/paypalCharge', 'Front\PaymentController@paypalCharge')->name('paypalCharge');
Route::post('/authorizeCharge','Front\PaymentController@authorizeCharge')->name('authorizeCharge');
Route::get('/checkout/apply-coupon', 'Front\CouponsController@applyCoupon')->name('checkout.coupon');
Route::get('/about-us', 'Front\ContactUsController@aboutUs')->name('aboutUs');
Route::get('/faq', 'Front\ContactUsController@faq')->name('faq');


Route::middleware(['user'])->prefix('user')->group(function () {
    Route::get('/dashboard', 'User\UserController@dashboard')->name('dashboard');

    Route::get('edit-account/', 'User\UserController@editUserAccount')->name('edit-account');

    Route::post('update-account/{id}', 'User\UserController@updateUserAccount')->name('update-account');

    Route::get('/getVendor', 'User\UserController@getVendor')->name('getVendor');
    Route::get('/my-orders', 'User\UserController@MyOrders')->name('MyOrders');
    Route::get('/order/{id}', 'User\UserController@show')->name('order');
    //WishList
    Route::get('/getOrderDetail/{id}', 'User\UserController@getOrderDetail')->name('getOrderDetail');
    Route::post('/add-wishlist', 'User\UserController@add_wishlist')->name('user.wishlist');
    Route::get('/wishlist', 'User\UserController@view_wishlist')->name('user.view_wishlist');

    //Account Info Update
    Route::post('/updateAccountInformation', 'User\UserController@updateAccountInformation')->name('updateAccountInformation');
    Route::post('/addCustomerAddress', 'User\UserController@addCustomerAddress')->name('addCustomerAddress');
    Route::post('/updateCustomerAddress', 'User\UserController@updateCustomerAddress')->name('updateCustomerAddress');
    Route::get('/getAddressDetail/{id}', 'User\UserController@getAddressDetail')->name('getAddressDetail');

    Route::get('/getCountries', 'User\UserController@getCountries')->name('getCountries');
    Route::get('/getStates/countryId/{id}', 'User\UserController@getStates')->name('getStates');
    Route::get('/getCities/stateId/{id}', 'User\UserController@getCities')->name('getCities');

});
Route::namespace('Vendor')->prefix('/vendor')->middleware('vendor')->group(function () {
    //Dashboard
    Route::get('assignbroker', 'VendorController@assignbroker')->name('assignbroker');
    Route::get('vendor_remove_broker/{id}', 'VendorController@vendor_remove_broker')->name('vendor_remove_broker');
    Route::get('export', 'VendorController@export')->name('export');
    Route::get('dashboard', 'VendorController@dashboard')->name('dashboard');
    Route::get('/order', 'VendorController@order')->name('vendor_order');
    Route::get('/brokers', 'VendorController@show_broker')->name('show_brokers');
    Route::get('/inventory', 'VendorController@show_inventory')->name('show_inventory');

    Route::get('/show_brokers_yajra', 'VendorController@show_brokers_yajra')->name('show_brokers_yajra');

    Route::get('/assign_brokers/{id}', 'VendorController@assigned_broker')->name('assigned_broker');
    Route::get('/assign_brokers/cancle/{id}', 'VendorController@assigned_broker_cancle')->name('assigned_broker.cancle');
    Route::get('product', 'ProductController@index')->name('product');
    Route::get('/product/filter', 'ProductController@filter')->name('product_filter');
    Route::get('/product/search', 'ProductController@search')->name('product_filter_search');
    Route::get('new-product', 'ProductController@addProductForm')->name('productForm');
    Route::post('new-product/add', 'ProductController@addProduct')->name('add_product');
    Route::get('delete-product/{id}', 'ProductController@destroyProduct')->name('deleteProduct');
    Route::get('delete-product-bulk', 'ProductController@destroyProductBulk')->name('deleteProductbulk');
    Route::get('edit-products/{id}', 'ProductController@editProduct')->name('editProduct');
    Route::post('update-products/{id}', 'ProductController@updateProduct')->name('updateProduct');
    Route::get('editVendor', 'VendorController@vendorEdit')->name('editVendor');
    Route::post('updateVendor/{id}', 'VendorController@vendorUpdate')->name('updateVendor');

    Route::get('/checkProductSkuVendor', 'ProductController@checkProductSkuVendor')->name('checkProductSkuVendor');



});

Route::namespace('Admin')->prefix('/admin')->middleware('admin')->group(function () {
    //Dashboard
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    //vendor request

    Route::get('brokerAssignToVendor/{id}/{vendor_id}', 'VendorController@brokerAssignToVendor')->name('brokerAssignToVendor');
    Route::get('brokerCancleToVendor/{id}/{vendor_id}', 'VendorController@brokerCancleToVendor')->name('brokerCancleToVendor');
    Route::get('/vendorRequest', 'VendorController@vendorRequest')->name('vendorRequest');
    Route::get('vendorshow/{id}', 'VendorController@show')->name('vendorshow');
    Route::get('customerRequest', 'CustomersController@customerRequest')->name('customerRequest');
    Route::get('customerStatusAccept/{id}', 'CustomersController@customerStatusAccept')->name('customerStatusAccept');
    Route::get('customerStatusReject/{id}', 'CustomersController@customerStatusReject')->name('customerStatusReject');
    Route::get('/show_vendor_request/{id}', 'VendorController@show_vendor_request')->name('show_vendor_request');

    //category
    Route::get('/category', 'Categories@index')->name('category');

    Route::get('/requestProduct', 'ProductController@requestProduct')->name('product.requestProduct');
    Route::get('productStatusAccept/{id}', 'ProductController@productStatusAccept')->name('productStatusAccept');

    Route::match(['get', 'post'], '/add-category', 'Categories@addCategory')->name('admin.add-category');
    Route::match(['get', 'post'], '/category-edit/{id}', 'Categories@edit')->name('admin.edit-category');
    Route::get('/category-view/{id}', 'Categories@show')->name('category-view');
    Route::delete('/category/destroy/{id}', 'Categories@destroy');

    //setting
    Route::match(['get', 'post'], '/settings', 'SettingController@index')->name('settings');

    //paymentGatway
    Route::match(['get', 'post'], '/paymentgatway', 'PaymentGatewayController@index')->name('paymentgatway');
    Route::match(['get', 'post'], '/emailsetting', 'EmailSettingController@index')->name('emailsetting');

    //PRODUCT
    Route::get('/getSubCategories', 'ProductController@getSubCategories')->name('getSubCategories');
    Route::get('/getOptionValues', 'ProductController@getOptionValues')->name('getOptionValues');
    Route::get('/checkProductSku', 'ProductController@checkProductSku')->name('checkProductSku');
    Route::get('/checkProductSlug', 'ProductController@checkProductSlug')->name('checkProductSlug');
    Route::get('/product/changeProductStatus/{id}', 'ProductController@changeProductStatus')->name('changeProductStatus');
    Route::resource('/product', 'ProductController');



    //ORDER
    Route::get('/order', 'OrderController@index')->name('order.index');
    Route::get('/order/broker/{id}/{request_id}/{order_id}', 'OrderController@brokershow')->name('order.broker.show');
    Route::get('/order/broker/{id}/{request_id}', 'OrderController@brokershow_without_orderid')->name('order.broker.show.woi');
    Route::get('/order/{id}', 'OrderController@show')->name('order.show');
    Route::get('/order/changeOrderStatus/{id}', 'OrderController@changeOrderStatus')->name('order.changeOrderStatus');
    Route::delete('/order/destroy/{id}', 'OrderController@destroy')->name('order.destroy');
    Route::delete('/order/destroyBoth/{id}/{id2}', 'OrderController@destroyBoth')->name('order.destroyBoth');
    Route::post('submit-request', 'OrderController@broker_price')->name('submit-request');
    Route::post('submit-request-update', 'OrderController@broker_price_update')->name('submit-request-update');


    //REVIEW
    Route::get('/review', 'ReviewController@index')->name('review.index');
    Route::get('/review/{id}', 'ReviewController@show')->name('review.show');
    Route::match(['get', 'post'], '/review/edit/{id}', 'ReviewController@edit')->name('review.edit');
    Route::delete('/review/destroy/{id}', 'ReviewController@destroy');

    Route::get('/faq', 'FaqController@index')->name('faq.index');
    Route::get('/faq/create', 'FaqController@create')->name('faq.create');
    Route::post('/faq/store', 'FaqController@store')->name('faq.store');
    Route::get('/faq/edit/{id}', 'FaqController@edit')->name('faq.edit');
    Route::post('/faq/update/{id}', 'FaqController@update')->name('faq.update');
    Route::delete('/faq/destroy/{id}', 'FaqController@destroy')->name('faq.destroy');


    // testimonial
    Route::get('/testimonial/changeBlogStatus/{id}', 'TestimonialController@changeBlogStatus')->name('changeBlogStatus');
    Route::get('/testimonial', 'TestimonialController@index')->name('testimonial.index');
    Route::get('/testimonial/create', 'TestimonialController@create')->name('testimonial.create');
    Route::post('/testimonial/store', 'TestimonialController@store')->name('testimonial.store');
    Route::get('/testimonial/edit/{id}', 'TestimonialController@edit')->name('testimonial.edit');
    Route::post('/testimonial/update/{id}', 'TestimonialController@update')->name('testimonial.update');
    Route::delete('/testimonial/destroy/{id}', 'TestimonialController@destroy')->name('testimonial.destroy');

    //Manufacturer
    Route::get('/manufacturer', 'ManufacturerController@index')->name('manufacturer.index');
    Route::match(['get', 'post'], '/manufacturer/create', 'ManufacturerController@create')->name('manufacturer.create');
    Route::get('/manufacturer/{id}', 'ManufacturerController@show')->name('manufacturer.show');
    Route::match(['get', 'post'], '/manufacturer/edit/{id}', 'ManufacturerController@edit')->name('manufacturer.edit');
    Route::post('/manufacturer/changeStatus/{id}', 'ManufacturerController@changeStatus')->name('manufacturer.changeStatus');
    Route::delete('/manufacturer/destroy/{id}', 'ManufacturerController@destroy');


    Route::resource('/customers', 'CustomersController');
    // Route::get('/customers/vendor', 'CustomersController@vendor')->name('customers.vendor');
    Route::delete('/customers/destroy/{id}', 'CustomersController@destroy')->name('customers.destroy');
    Route::post('/updatecustomers', 'CustomersController@update')->name('customers.update');
    Route::view('Addbroker','admin.customers.add' );


    Route::resource('/Vendor', 'VendorController');
    Route::get('/vendor/changeVendorStatus/', 'VendorController@changeVendorStatus')->name('changeVendorStatus');

    Route::get('/catalog/attribute-groups', 'AttributeGroupController@show')->name('catalog.attributeGroups');
    Route::match(['get', 'post'], '/catalog/add-attribute-group', 'AttributeGroupController@add')->name('catalog.addAttributeGroup');
    Route::match(['get', 'post'], '/catalog/edit-attribute-group/{id}', 'AttributeGroupController@edit')->name('catalog.editAttributeGroup');
    Route::delete('/catalog/destroy-attribute-group/{id}', 'AttributeGroupController@destroy')->name('catalog.destroyAttributeGroup');

    Route::get('/catalog/attributes', 'AttributeController@show')->name('catalog.attributes');
    Route::match(['get', 'post'], '/catalog/add-attribute', 'AttributeController@add')->name('catalog.addAttributes');
    Route::match(['get', 'post'], '/catalog/edit-attribute/{id}', 'AttributeController@edit')->name('catalog.editAttribute');
    Route::delete('/catalog/destroy-attribute/{id}', 'AttributeController@destroy')->name('catalog.destroyAttribute');

    //New Attributes Routes
    Route::get('/catalog/attribute', 'AttributeController@index')->name('attribute.index');
    Route::match(['get', 'post'], '/catalog/addAttributeGroup', 'AttributeController@addAttributeGroup')->name('attribute.addAttributeGroup');
    Route::match(['get', 'post'], '/catalog/addAttributes', 'AttributeController@addAttributes')->name('attribute.addAttributes');
    Route::match(['get', 'post'], '/catalog/edit-attributes/{type}/{id}', 'AttributeController@editAttributes')->name('attribute.editAttributes');
    Route::delete('/catalog/destroy-attributes/{type}/{id}', 'AttributeController@destroyAttributes')->name('attribute.destroyAttributes');
    //End New Attributes Routes

    //New Options Routes
    Route::get('/catalog/option', 'OptionsController@index')->name('option.index');
    Route::match(['get', 'post'], '/catalog/addOptions', 'OptionsController@addOptions')->name('option.addOptions');
    Route::match(['get', 'post'], '/catalog/addOptionsValues', 'OptionsController@addOptionsValues')->name('option.addOptionsValues');
    Route::match(['get', 'post'], '/catalog/edit-options/{type}/{id}', 'OptionsController@editOptions')->name('option.editOptions');
    Route::delete('/catalog/destroy-options/{type}/{id}', 'OptionsController@destroyOptions')->name('option.destroyOptions');
    //End New Options Routes

    Route::get('/catalog/options', 'OptionsController@show')->name('catalog.options');
    Route::match(['get', 'post'], '/catalog/add-option', 'OptionsController@add')->name('catalog.addOption');
    Route::match(['get', 'post'], '/catalog/edit-option/{id}', 'OptionsController@edit')->name('catalog.editOption');
    Route::delete('/catalog/destroy-option/{id}', 'OptionsController@destroy')->name('catalog.destroyOption');

    Route::get('/catalog/option-values', 'OptionValuesController@show')->name('catalog.optionValues');
    Route::match(['get', 'post'], '/catalog/add-option-value', 'OptionValuesController@add')->name('catalog.addOptionValue');
    Route::match(['get', 'post'], '/catalog/edit-option-value/{id}', 'OptionValuesController@edit')->name('catalog.editOptionValue');
    Route::delete('/catalog/destroy-option-value/{id}', 'OptionValuesController@destroy')->name('catalog.destroyOptionValue');



    //NewsLetter
    Route::get('/newsletter', 'NewsLetterController@index')->name('newsletter.index');
    Route::post('/newsletter/edit/{id}', 'NewsLetterController@edit')->name('newsletter.edit');
    Route::delete('/newsletter/destroy/{id}', 'NewsLetterController@destroy');
    Route::get('/sendnewsletter', 'NewsLetterController@sendNewsLetter')->name('sendnewsletter');
    Route::post('/sendnewsletteremail', 'NewsLetterController@sendNewsLetterEmail')->name('sendnewsletteremail');
    //Route::delete('customers/delete/{id}','CustomersController@destroy');

    //Shipping Rate
    Route::get('/shipping', 'ShippingRateController@index')->name('shipping.index');
    Route::match(['get', 'post'], '/shipping/create', 'ShippingRateController@create')->name('shipping.create');
    Route::get('/shipping/{id}', 'ShippingRateController@show')->name('shipping.show');
    Route::match(['get', 'post'], '/shipping/edit/{id}', 'ShippingRateController@edit')->name('shipping.edit');
    Route::post('/shipping/changeStatus/{id}', 'ShippingRateController@changeStatus')->name('shipping.changeStatus');
    Route::delete('/shipping/destroy/{id}', 'ShippingRateController@destroy');

    //Blogs
    Route::get('/blog/changeBlogStatus/{id}', 'BlogController@changeBlogStatus')->name('changeBlogStatus');
    Route::resource('/blog', 'BlogController');

    Route::get('/coupons', 'CouponController@index')->name('coupons.index');
    Route::match(['get', 'post'], '/coupon/create', 'CouponController@create')->name('coupons.create');
    Route::get('/coupon/{id}', 'CouponController@show')->name('coupons.show');
    Route::match(['get', 'post'], '/coupon/edit/{id}', 'CouponController@edit')->name('coupons.edit');
    Route::post('/coupons/changeStatus/{id}', 'CouponController@changeStatus')->name('coupons.changeStatus');
    Route::delete('/coupons/destroy/{id}', 'CouponController@destroy')->name('coupon.destroy');
    //Collection
    Route::delete('/collection/destroy/{id}', 'CollectionController@destroy');
    Route::resource('/collection', 'CollectionController');

    //Collection Products
    Route::get('/collectionProducts','CollectionProductController@index')->name('collectionProducts.index');
    Route::get('/collectionProducts/create','CollectionProductController@create')->name('collectionProducts.create');
    Route::post('/collectionProducts/store','CollectionProductController@store')->name('collectionProducts.store');
    Route::get('/collectionProducts/edit/{id}','CollectionProductController@edit')->name('collectionProducts.edit');
    Route::post('/collectionProducts/update/{id}','CollectionProductController@update')->name('collectionProducts.update');
    Route::get('/collectionProducts/show/{id}','CollectionProductController@show')->name('collectionProducts.show');
    Route::delete('/collectionProducts/destroy/{id}', 'CollectionProductController@destroy');
    //
    route::get('/changePassword', 'SettingController@changePassword');
    route::post('/updateAdminPassword', 'SettingController@updateAdminPassword');

    /*  Shipping Services   */
    Route::match(['get', 'post'],'shipping-services', 'ShippingServiceController@index')->name('shippingServices');
});

/*  USPS routes start */
Route::get('/getUspsShippingRate', 'Front\UspsController@getUspsShippingRate')->name('getUspsShippingRate');
/*  USPS routes end */



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
