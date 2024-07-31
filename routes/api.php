<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\{
    UserController,
    CategoryController,
    ReviewController,
    CartController,
    WishlistController,
    GiftCardController,
    ActivityController,
    ContactController,
    BookingController,
    BlogController,
    OrderController,
    HelpController,
    StripePaymentController,
    SettingController,
};
use App\Http\Controllers\Admin\{
    MenuController,
 };
use App\Http\Controllers\Api\Auth\{
   ForgotPasswordController,
};


Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
Route::post('verify-otp', [ForgotPasswordController::class, 'verifyOTP']);
Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword']);

 /*Contact us*/
 Route::get('all/menus',[MenuController::class, 'allMenus']);
 /*Setting*/
 Route::get('contact/us',[SettingController::class, 'ContactUs']);
 Route::get('find/us',[SettingController::class, 'findUs']);
 Route::get('home/image',[SettingController::class, 'homeImage']);
 Route::get('about/image',[SettingController::class, 'aboutImage']);
 Route::get('guidelines/image',[SettingController::class, 'guidelinesImage']);
 Route::get('termsConditions/image',[SettingController::class, 'termsConditionsImage']);
 Route::get('privacyPolicy/image',[SettingController::class, 'privacyPolicyImage']);
 Route::get('blog/page/image',[SettingController::class, 'blogImage']);

Route::get('show/blogs',      [BlogController::class, 'index']);
Route::get('show/blog/{id}',  [BlogController::class, 'show']);
Route::post('/user/register', [UserController::class, 'register'])->name('user.register');
Route::post('/user/login',    [UserController::class, 'login'])->name('user.login');

/* activity and category routes */
Route::get('/all_category',         [CategoryController::class, 'index'])->name('get_category');
Route::get('/category/{id}',         [CategoryController::class, 'show'])->name('category');
Route::get('/category-activity/{id}',    [CategoryController::class, 'getCategoryActivity'])->name('category-activity');
Route::get('/all_activity',         [ActivityController::class, 'index'])->name('all_activity');
Route::get('/single_activity/{id}', [ActivityController::class, 'show'])->name('single_activity');
Route::get('/activity/{slug}', [ActivityController::class, 'showBySlug']);

/* contact-us and booking route */
Route::post('/contact_us', [ContactController::class, 'contact_us'])->name('contact_us');

 /* Helps Routes */
 Route::post('/helps', [HelpController::class, 'helpGet']);

  /* Booking Routes */
 Route::post('/booking', [OrderController::class, 'orderDetailStore']);
 Route::post('status/booking/{id}', [OrderController::class, 'updateStatus']);
 Route::post('/send/giftCard', [GiftCardController::class, 'sendGift']);
 //stripe payment api
Route::post('/stripe',[StripePaymentController::class,'createPaymentIntent']);

 //apply voucher
Route::post('user/apply/voucher', [GiftCardController::class, 'applyVoucher'])->name('user.voucher');
 //expire voucher
 Route::post('user/expire/voucher', [GiftCardController::class, 'expireVoucher'])->name('user.voucher');

Route::middleware(['auth:sanctum'])->prefix('user')->group( function () {

    Route::post('/update/profile',  [UserController::class, 'update_profile']);
    Route::post('/update/password', [UserController::class, 'update_password']);


    /* activity review */
    Route::post('/add/review',           [ReviewController::class, 'store'])->name('user.add_review');
    Route::put('/update/review/{id}',    [ReviewController::class, 'update'])->name('user.update_review');
    Route::delete('/delete/review/{id}', [ReviewController::class, 'delete'])->name('user.delete_review');

    /* Cart */
    Route::post('/cart',        [CartController::class, 'addToCart']);
    Route::get('/cart',         [CartController::class, 'showCart']);
    Route::post('/cart/{id}',   [CartController::class, 'updateCart']);
    Route::delete('/cart/{id}', [CartController::class, 'removeFromCart']);
    Route::delete('/cart',      [CartController::class, 'clearCart']);


    /* wishlist */
    Route::post('/wishlist',                 [WishlistController::class, 'addToWishlist']);
    Route::get('/wishlist',                  [WishlistController::class, 'showWishlist']);
    Route::delete('/wishlist/{activity_id}', [WishlistController::class, 'removeFromWishlist']);
    Route::delete('/wishlist',               [WishlistController::class, 'clearWishlist']);

    /* Gift Card Routes */
    Route::post('/send/giftCard', [GiftCardController::class, 'sendGift'])->name('user.sendGift');

    /* Booking Routes */
    Route::post('/booking', [OrderController::class, 'orderDetailStore']);
    Route::get('/bookings', [OrderController::class, 'index']);
    Route::put('/booking/{id}', [OrderController::class, 'update']);
    Route::put('cancel/booking/{id}', [OrderController::class, 'cancel']);
});