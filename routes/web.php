<?php
use Illuminate\Support\Facades\Route;
use App\Enums\UserRoleEnums;
use App\Http\Controllers\Admin\{
    AdminController,
    CategoryController,
    SubCategoryController,
    ProfileController,
    ActivityController,
    ContactController,
    PackageController,
    BlogController,
    HelpController,
    OtherExperianceController,
    MostpopularActivityController,
    HomeactivityController,
    BookingController,
    CouponController,
    SettingController,
    MenuController,
    ReviewsController

};
use App\Http\Controllers\Api\User\OrderController;
use App\Http\Controllers\Admin\Setting\{

    HomeController,
    AboutController,
    GuidelinesController,
    PrivacyPolicyController,
    TermsConditionController,
    BlogPageController,

};
use App\Models\Order;
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

/* admin login  */
Route::get('/testpdf', function(){
     $order = Order::find(168);
    
    // Load the view with order data
    $html = view('pdf.order', compact('order'))->render();

    // Generate the PDF
    $pdf = PDF::loadHTML($html);

    // Return the PDF as a stream to view in the browser
    return $pdf->stream('order_details.pdf');
});
Route::get('/',  [AdminController::class, 'index'])->name('admin.loginPage');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/order/{id}/pdf', [OrderController::class, 'generatePdf'])->name('order.pdf');

Route::middleware(['role:admin', 'auth'])->prefix('admin')->group(function () {

    /* admin dashboard */
    Route::get('/dashboard',        [AdminController::class, 'dashboard'])->name('admin.dashboard');

    /* admin profile updates */
    Route::get('/profile',          [ProfileController::class,'Profile'])->name('admin.profile');
    Route::post('/profile/{id}',    [ProfileController::class,'updateProfile'])->name('admin.updateProfile');
    Route::get('/update-password',  [ProfileController::class, 'changePassword'])->name('admin.changePassword');
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('admin.updatePassword');

    /* categories routes */
    Route::resource('categories',    CategoryController::class);
    /* menus routes */
    Route::resource('menus',         MenuController::class);

    /* subcategories routes */
    Route::resource('subcategories', SubCategoryController::class);

    /* packages routes */
    Route::resource('packages',      PackageController::class);
    /* packages routes */
    Route::get('package/{id}',      [PackageController::class,'destroy'])->name('packages-destroy');

    /* Contact Us routes */
    Route::get('/contact_us', [ContactController::class,'index'])->name('admin.contact_us');

    /* help routes */
    Route::get('/helps', [HelpController::class,'index'])->name('admin.helps');



    /*activity images routes */
    Route::resource('activities',              ActivityController::class);
    Route::resource('homeimages',              HomeController::class);
    Route::resource('aboutimages',              AboutController::class);
    Route::resource('otherexperiances',        OtherExperianceController::class);
    Route::resource('mostpopularactivities',   MostpopularActivityController::class);
    Route::resource('homeactivities',          HomeactivityController::class);
    Route::get('/activityimages/{id}',         [ActivityController::class, 'createActivityImages'])->name('admin.activityimages');
    Route::post('/activity-images',            [ActivityController::class, 'storeImages'])->name('admin.activity-images');
    Route::get('/activity-getimages/{id}',     [ActivityController::class, 'getImages'])->name('admin.activity-getimages');
    Route::post('/activity-deleteimages/{id}', [ActivityController::class, 'destroyImages'])->name('admin.activity-deleteimages');
    Route::get('instruction/delete/{id}',[ActivityController::class, 'instructionDestroy'])->name('instruction-destroy');

    /* admin logout */
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    /*Blog*/
    Route::resource('blogs',BlogController::class);
    Route::get('blogs/contents/{blog}',   [BlogController::class, 'viewContents'])->name('blogs.contents');
    Route::get('blogs/faqs/{blog}',       [BlogController::class, 'viewFaqs'])->name('blogs.faqs');
    Route::get('/contents/edit{content}', [BlogController::class, 'editContents'])->name('contents.edit');
    Route::put('/contents/{content}',     [BlogController::class, 'updateContents'])->name('contents.update');
    Route::delete('/contents/{content}',  [BlogController::class, 'destroyContents'])->name('contents.destroy');
    Route::get('/faqs/{faq}/edit',        [BlogController::class, 'editFaqs'])->name('faqs.edit');
    Route::put('/faqs/{faq}',             [BlogController::class, 'updateFaqs'])->name('faqs.update');
    Route::delete('/faqs/{faq}',          [BlogController::class, 'destroyFaqs'])->name('faqs.destroy');
    /*Bookings*/
    Route::get('bookings',          [BookingController::class, 'index'])->name('admin.bookings');
    Route::get('bookings/package/{id}',          [BookingController::class, 'package'])->name('admin.bookings.package');
    Route::post('/send-coupon', [CouponController::class, 'sendCoupon'])->name('admin.couponStore');
    Route::get('/create', [CouponController::class, 'create'])->name('admin.couponCreate');
    Route::get('/index', [CouponController::class, 'index'])->name('admin.couponIndex');
    Route::get('/coupon/delete/{id}', [CouponController::class, 'destroy'])->name('admin.coupondelete');

    /*Setting ContactUs*/
    Route::get('setting/contact/create',[SettingController::class, 'contactUsCreate'])->name('setting.contact.create');
    Route::get('setting/contact',[SettingController::class, 'contactUsIndex'])->name('setting.contact.index');
    Route::get('setting/contact/{id}',[SettingController::class, 'contactUsEdit'])->name('setting.contact.edit');
    Route::post('setting/contact',[SettingController::class, 'contactUsStore'])->name('setting.contact.store');
    Route::put('setting/contact/{id}',[SettingController::class, 'contactUsUpdate'])->name('setting.contact.update');
    Route::get('contact/delete/{id}',[SettingController::class, 'contactUsDestroy'])->name('setting.contact-destroy');
    Route::put('/contacts/{id}/email', [ContactController::class, 'updateStatus'])->name('contacts.contactEmail');

     /*Setting FindUs*/
     Route::get('setting/find/create',[SettingController::class, 'findUsCreate'])->name('setting.find.create');
     Route::get('setting/find',[SettingController::class, 'findUsIndex'])->name('setting.find.index');
     Route::get('setting/find/{id}',[SettingController::class, 'findUsEdit'])->name('setting.find.edit');
     Route::post('setting/find',[SettingController::class, 'findUsStore'])->name('setting.find.store');
     Route::put('setting/find/{id}',[SettingController::class, 'findUsUpdate'])->name('setting.find.update');
     Route::get('find/delete/{id}',[SettingController::class, 'findUsDestroy'])->name('setting.find-destroy');

     /*Reviews*/
     Route::resource('reviews',ReviewsController::class);

     /*settings*/
     Route::resource('guidelines',GuidelinesController::class);
     Route::get('guidelines/delete/{id}',[GuidelinesController::class, 'destroy'])->name('guidelines-destroy');
     Route::resource('termsconditions',TermsConditionController::class);
     Route::get('termsconditions/delete/{id}',[TermsConditionController::class, 'destroy'])->name('termsconditions-destroy');
     Route::resource('blogPage',BlogPageController::class);
     Route::get('blogPage/delete/{id}',[BlogPageController::class, 'destroy'])->name('blogPage-destroy');
     Route::resource('privacypolicy',PrivacyPolicyController::class);
     Route::get('privacypolicy/delete/{id}',[PrivacyPolicyController::class, 'destroy'])->name('privacypolicy-destroy');


});


Route::get('/create-symlink', function () {
    $storagePath = public_path('storage');
    if (file_exists($storagePath)) {
        unlink($storagePath);
    }
    symlink(storage_path('/app/public'), $storagePath);
    return 'Symlink has been created';
});



// Route::get('/live', function () {
//     Artisan::call('migrate:fresh');
//         Artisan::call('db:seed');
//             Artisan::call('storage:link');
//     return "seed";
// });