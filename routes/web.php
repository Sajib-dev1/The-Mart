<?php

use App\Http\Controllers\AboutBanController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChackoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncruadController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PassresetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RollController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\VariationController;
use Illuminate\Support\Facades\Route;

//frontend part
Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');
Route::get('/faq',[FrontendController::class,'faq'])->name('faq');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::post('/getsize',[FrontendController::class,'getsize']);
Route::post('/getquantity',[FrontendController::class,'getquantity']);
Route::get('/product/single/{slug}',[FrontendController::class,'product_single'])->name('product.single');
Route::get('/resent/view',[FrontendController::class,'resent_view'])->name('resent.view');

//incruad page
Route::get('/subcategories/{id}',[IncruadController::class,'subcategories'])->name('subcategories');
Route::get('/ban_product/{id}',[IncruadController::class,'ban_product'])->name('ban_product');
Route::get('/categories/{id}',[IncruadController::class,'categories'])->name('categories');
Route::get('/upcomming/shop/{id}',[IncruadController::class,'upcomming_shop'])->name('upcomming.shop');
Route::get('/tag/product/{id}',[IncruadController::class,'tag_product'])->name('tag.product');
Route::get('/new_offer/{id}',[IncruadController::class,'new_offer'])->name('new_offer');
Route::get('/offer/{id}',[IncruadController::class,'offer'])->name('offer');
Route::get('/product/all/item',[IncruadController::class,'product_all_item'])->name('product.all.item');
Route::get('/sub/product/name/{id}',[IncruadController::class,'sub_product_name'])->name('sub.product.name');

//customer login
Route::get('/customer/login',[CustomerAuthController::class,'customer_login'])->name('customer.login');
Route::get('/customer/register',[CustomerAuthController::class,'customer_register'])->name('customer.register');
Route::post('/customer/login',[CustomerAuthController::class,'customer_logged'])->name('customer.logged');
Route::post('/customer/register',[CustomerAuthController::class,'customer_store'])->name('customer.store');
Route::get('/customer/email/varify/{token}',[CustomerAuthController::class,'customer_email_varify'])->name('customer.email.varify');
Route::get('/email/varification/reset',[CustomerAuthController::class,'email_varification_reset'])->name('email.varification.reset');
Route::post('/email/varification/reset',[CustomerAuthController::class,'email_resed_request'])->name('email.resed.request');
Route::get('/reload-captcha', [CustomerAuthController::class, 'reloadCaptcha']);

//customer profile
Route::middleware(['customer'])->group(function (){
Route::get('/customer/profile',[CustomerController::class,'customer_profile'])->name('customer.profile');
Route::get('/customer/logout',[CustomerController::class,'customer_logout'])->name('customer.logout');
Route::get('/customer/edit/profile',[CustomerController::class,'customer_edit_profile'])->name('customer.edit.profile');
Route::post('/customer/edit/profile',[CustomerController::class,'customer_update_profile'])->name('customer.update.profile');
Route::get('/cusomer/password',[CustomerController::class,'cusomer_password'])->name('cusomer.password');
Route::post('/customer/password',[CustomerController::class,'customer_update_password'])->name('customer.update.password');
Route::get('/cusomer/wishlist',[CustomerController::class,'cusomer_wishlist'])->name('cusomer.wishlist');
Route::get('/cusomer/order',[CustomerController::class,'cusomer_order'])->name('cusomer.order');
Route::get('/download/invoice/{id}',[CustomerController::class,'download_invoice'])->name('download.invoice');
});

//customer forget password
Route::get('/forgot/password',[PassresetController::class,'forgot_password'])->name('forgot.password');
Route::post('/password/reset/request',[PassresetController::class,'password_reset_request'])->name('password.reset.request');
Route::get('/password/reset/form/{token}',[PassresetController::class,'password_reset_form'])->name('password.reset.form');
Route::post('/password/reset/form/{token}',[PassresetController::class,'password_reset_confirm'])->name('password.reset.confirm');

//customer order
Route::middleware(['customer'])->group(function (){
    Route::get('/cancel/order/{id}',[OrdersController::class,'cancel_order'])->name('cancel.order');
    Route::post('/cancel/order/store',[OrdersController::class,'cancel_order_store'])->name('cancel.order.store');
    Route::post('/cancel/order/retun',[OrdersController::class,'cancel_order_retun'])->name('cancel.order.retun');
    Route::get('/return/product/{id}',[OrdersController::class,'return_product'])->name('return.product');
    Route::post('/return/product/store',[OrdersController::class,'return_product_store'])->name('return.product.store');
});

//cart page
Route::middleware(['customer'])->group(function (){
    Route::get('/cart',[CartController::class,'cart'])->name('cart');
    Route::post('/cart',[CartController::class,'cart_store'])->name('cart.store');
    Route::get('/cart/remove/{id}',[CartController::class,'cart_remove'])->name('cart.remove');
    Route::get('/wishlist/remove/{id}',[CartController::class,'wishlist_remove'])->name('wishlist.remove');
    Route::get('/wishlist',[CartController::class,'wishlist'])->name('wishlist');
    Route::post('/cart/update',[CartController::class,'cart_update'])->name('cart.update');
});

//chackout
Route::middleware(['customer'])->group(function (){
    Route::get('/cart/checkout',[ChackoutController::class,'checkout'])->name('checkout');
    Route::post('/getcity',[ChackoutController::class,'getcity']);
    Route::post('/checkout/store',[ChackoutController::class,'checkout_store'])->name('checkout.store');
    Route::get('/order/success',[ChackoutController::class,'order_success'])->name('order.success');
});

//review & star
Route::post('/review/store/{id}',[FrontendController::class,'review_store'])->name('review.store');

/**===================================================
 *               Backend route
 * ===================================================
 */
//dashboard part
Route::get('/dashboard',[HomeController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/data/history',[HistoryController::class,'data_history'])->middleware(['auth', 'verified'])->name('data.history');
Route::get('/roll/manage',[RollController::class,'roll_manage'])->middleware(['auth', 'verified'])->name('roll.manage');
Route::post('/roll/manage',[RollController::class,'permition_store'])->middleware(['auth', 'verified'])->name('permition.store');
Route::post('/rol/store',[RollController::class,'rol_store'])->middleware(['auth', 'verified'])->name('rol.store');
Route::get('/role/delete/{id}',[RollController::class,'role_delete'])->middleware(['auth', 'verified'])->name('role.delete');
Route::get('/role/edit/{id}',[RollController::class,'role_edit'])->middleware(['auth', 'verified'])->name('role.edit');
Route::post('/role/edit/{id}',[RollController::class,'role_update'])->middleware(['auth', 'verified'])->name('role.update');
Route::post('/assain/role',[RollController::class,'assain_role'])->middleware(['auth', 'verified'])->name('assain.role');
Route::get('/role/remove/{id}',[RollController::class,'role_remove'])->middleware(['auth', 'verified'])->name('role.remove');

//user profile 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'user_profile'])->name('user.profile');
    Route::get('/users/list', [UserProfileController::class, 'users_list'])->name('users.list');
    Route::post('/profile', [UserProfileController::class, 'profile_photo_update'])->name('profile.photo.update');
    Route::post('/profile/info', [UserProfileController::class, 'profile_information'])->name('profile.information');
    Route::post('/profile/password', [UserProfileController::class, 'profile_password'])->name('profile.password');
    Route::get('/user', [UserProfileController::class, 'user'])->name('user');
    Route::post('/user', [UserProfileController::class, 'user_store'])->name('user.store');
    Route::get('/user/delete/{id}', [UserProfileController::class, 'user_delete'])->name('user.delete');
});

require __DIR__.'/auth.php';

//Category
Route::middleware('auth')->group(function () {
    Route::get('/Add/category', [CategoryController::class, 'category_add'])->name('category.add');
    Route::post('/Add/category', [CategoryController::class, 'category_store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'category_edit'])->name('category.edit');
    Route::post('/category/edit/{id}', [CategoryController::class, 'category_update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'category_delete'])->name('category.delete');
    Route::get('/trash/category', [CategoryController::class, 'trash_category'])->name('trash.category');
    Route::get('/trash/category/delete/{id}', [CategoryController::class, 'trash_category_delete'])->name('trash.category.delete');
    Route::get('/category/restore/{id}', [CategoryController::class, 'category_restore'])->name('category.restore');
});

//Subcategory
Route::middleware('auth')->group(function () {
    Route::get('/Add/subcategory', [SubcategoryController::class, 'subcategory_add'])->name('subcategory.add');
    Route::post('/Add/subcategory', [SubcategoryController::class, 'subcategory_store'])->name('subcategory.store');
    Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'subcategory_edit'])->name('subcategory.edit');
    Route::post('/subcategory/edit/{id}', [SubcategoryController::class, 'subcategory_update'])->name('subcategory.update');
    Route::get('/subcategory/delete/{id}', [SubcategoryController::class, 'subcategory_delete'])->name('subcategory.delete');
    Route::get('/trash/subcategory', [SubcategoryController::class, 'trash_subcategory'])->name('trash.subcategory');
    Route::get('/trash/subcategory/delete/{id}', [SubcategoryController::class, 'trash_subcategory_delete'])->name('trash.subcategory.delete');
    Route::get('/category/subcategory/{id}', [SubcategoryController::class, 'subcategory_restore'])->name('subcategory.restore');
});

//Brand
Route::middleware('auth')->group(function () {
    Route::get('/brand', [BrandController::class, 'brand_add'])->name('brand.add');
    Route::post('/brand', [BrandController::class, 'brand_store'])->name('brand.store');
    Route::get('/brand/edit/{id}', [BrandController::class, 'brand_edit'])->name('brand.edit');
    Route::post('/brand/edit/{id}', [BrandController::class, 'brand_update'])->name('brand.update');
    Route::get('/brand/delete/{id}', [BrandController::class, 'brand_delete'])->name('brand.delete');
    Route::get('/trash/brand', [BrandController::class, 'trash_brand'])->name('trash.brand');
    Route::get('/trash/brand/delete/{id}', [BrandController::class, 'trash_brand_delete'])->name('trash.brand.delete');
    Route::get('/brand/restore/{id}', [BrandController::class, 'brand_restore'])->name('brand.restore');
});

//Tag
Route::middleware('auth')->group(function () {
    Route::get('/tag', [TagController::class, 'tag'])->name('tag');
    Route::post('/tag', [TagController::class, 'tag_store'])->name('tag.store');
    Route::get('/tag/edit/{id}', [TagController::class, 'tag_edit'])->name('tag.edit');
    Route::post('/tag/edit/{id}', [TagController::class, 'tag_update'])->name('tag.update');
    Route::get('/tag/delete/{id}', [TagController::class, 'tag_delete'])->name('tag.delete');
});

//Color
Route::middleware('auth')->group(function () {
    Route::get('/color', [VariationController::class, 'color'])->name('color');
    Route::post('/color', [VariationController::class, 'color_store'])->name('color.store');
    Route::get('/color/edit/{id}', [VariationController::class, 'color_edit'])->name('color.edit');
    Route::post('/color/edit/{id}', [VariationController::class, 'color_update'])->name('color.update');
    Route::get('/color/delete/{id}', [VariationController::class, 'color_delete'])->name('color.delete');
});

//size
Route::middleware('auth')->group(function () {
    Route::get('/size', [VariationController::class, 'size'])->name('size');
    Route::post('/size', [VariationController::class, 'size_store'])->name('size.store');
    Route::get('/size/edit/{id}', [VariationController::class, 'size_edit'])->name('size.edit');
    Route::post('/size/edit/{id}', [VariationController::class, 'size_update'])->name('size.update');
    Route::get('/size/delete/{id}', [VariationController::class, 'size_delete'])->name('size.delete');
});

//size
Route::middleware('auth')->group(function () {
    Route::get('/sub/product', [VariationController::class, 'sub_product'])->name('sub.product');
    Route::post('/sub/product', [VariationController::class, 'sub_product_store'])->name('sub.product.store');
    Route::get('/sub/product/edit/{id}', [VariationController::class, 'sub_product_edit'])->name('sub.product.edit');
    Route::post('/sub/product/edit/{id}', [VariationController::class, 'sub_product_update'])->name('sub.product.update');
    Route::get('/sub/product/delete/{id}', [VariationController::class, 'sub_product_delete'])->name('sub.product.delete');
});

//product
Route::middleware('auth')->group(function () {
    Route::get('/product', [ProductController::class, 'product'])->name('product');
    Route::post('/product', [ProductController::class, 'product_store'])->name('product.store');
    Route::post('/getsubcategory', [ProductController::class, 'getsubcategory']);
    Route::post('/getproductstatus', [ProductController::class, 'getproductstatus']);
    Route::post('/getupcommingproductstatus', [ProductController::class, 'getupcommingproductstatus']);
    Route::get('/product/list', [ProductController::class, 'product_list'])->name('product.list');
    Route::get('/product/show/{id}', [ProductController::class, 'product_show'])->name('product.show');
    Route::get('/product/delete/{id}', [ProductController::class, 'product_delete'])->name('product.delete');
    Route::get('/inventory/{id}', [ProductController::class, 'inventory'])->name('inventory');
    Route::post('/inventory/{id}', [ProductController::class, 'inventory_store'])->name('inventory.store');
    Route::get('/inventory/delete/{id}', [ProductController::class, 'inventory_delete'])->name('inventory.delete');
});

/**======================================================= 
 *          Frontend part for backend update
 * =======================================================
 */

//banner part
Route::middleware('auth')->group(function () {
    Route::get('/banner', [BannerController::class, 'banner'])->name('banner');
    Route::post('/banner', [BannerController::class, 'banner_store'])->name('banner.store');
    Route::get('/banner/edit/{id}', [BannerController::class, 'banner_edit'])->name('banner.edit');
    Route::post('/banner/edit/{id}', [BannerController::class, 'banner_update'])->name('banner.update');
    Route::get('/banner/delete/{id}', [BannerController::class, 'banner_delete'])->name('banner.delete');
});

//offer
Route::middleware('auth')->group(function () {
    Route::get('/upcomming', [OfferController::class, 'upcomming'])->name('upcomming');
    Route::post('/upcomming', [OfferController::class, 'upcomming_update'])->name('upcomming.update');
    Route::post('/new_offer/{id}', [OfferController::class, 'newoffer_update'])->name('newoffer.update');
    Route::post('/offer/{id}', [OfferController::class, 'offer_update'])->name('offer.update');
    Route::post('/subscribe/update/{id}', [OfferController::class, 'subscribe_update'])->name('subscribe.update');
    Route::post('/subscriber/store', [OfferController::class, 'subscriber_store'])->name('subscriber.store');
});

//subscriber
Route::middleware('auth')->group(function () {
    Route::get('/subscriber', [SubscriberController::class, 'subscriber'])->name('subscriber');
});

//coupon
Route::middleware('auth')->group(function () {
    Route::get('/coupon',[CouponController::class,'coupon'])->name('coupon');
    Route::get('/coupon/delete/{id}',[CouponController::class,'coupon_delete'])->name('coupon.delete');
    Route::post('/coupon',[CouponController::class,'coupon_store'])->name('coupon.store');
    Route::post('/getcouponctstatus',[CouponController::class,'getcouponctstatus']);
});

//delivery
Route::middleware(['auth'])->group(function () {
    Route::get('/delivery',[DeliveryController::class,'delivery'])->name('delivery');
    Route::post('/delivery',[DeliveryController::class,'delivery_update'])->name('delivery.update');
});

//shopping_cart
Route::middleware(['auth'])->group(function () {
    Route::get('/shopping/cart',[ShoppingController::class,'shopping_cart'])->name('shopping.cart');
    Route::get('/shopping/invoice/{id}',[ShoppingController::class,'shopping_invoice'])->name('shopping.invoice');
});


//customer orders
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/orders',[OrdersController::class,'orders'])->name('orders');
    Route::post('/order/status/update/{id}',[OrdersController::class,'order_status_update'])->name('order.status.update');
    Route::get('/order/cancel/request',[OrdersController::class,'order_cancel_request'])->name('order.cancel.request');
    Route::get('/cancel/order/accept/{id}',[OrdersController::class,'cancel_order_accept'])->name('cancel.order.accept');
    Route::get('/order/return/request',[OrdersController::class,'order_return_request'])->name('order.return.request');
    Route::get('/return/product/accept/{id}',[OrdersController::class,'return_product_accept'])->name('return.product.accept');
});


// SSLCOMMERZ Start

Route::get('/pay', [SslCommerzPaymentController::class, 'index'])->name('sslpay');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

//stripe
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe')->name('stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

/**===================================================
 *                 About route
 * ==================================================
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/aboutban',[AboutBanController::class,'aboutban'])->name('aboutban');
    Route::post('/aboutban/update/{id}',[AboutBanController::class,'aboutban_update'])->name('aboutban.update');
    Route::get('/about/service',[AboutBanController::class,'about_service'])->name('about.service');
    Route::post('/about/service/store',[AboutBanController::class,'about_service_store'])->name('about.service.store');
    Route::get('/about/service/delete/{id}',[AboutBanController::class,'about_service_delete'])->name('about.service.delete');
    Route::get('/about/gallery/part',[AboutBanController::class,'about_gallery_part'])->name('about.gallery.part');
    Route::post('/about/galery/store',[AboutBanController::class,'about_galery_store'])->name('about.galery.store');
    Route::get('/about/gallery/delete/{id}',[AboutBanController::class,'about_gallery_delete'])->name('about.gallery.delete');
});

/**========================================================
 *               Frontend Faq part
 * ========================================================*/
Route::post('/faq',[FaqController::class,'quation_store'])->name('quation.store');






