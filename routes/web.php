<?php

use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\MechannicsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CheckoutController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsDetailController;
use App\Http\Controllers\ProfileController;
use App\Mail\GuiEmail;
use App\Mail\GuiEmailSecond;
use App\Models\Template;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\HasMediaTrait;
use Vonage\Client;
use Illuminate\Support\ServiceProvider;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
Route::webhooks('webhook-endpoint');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
        Route::post('/admin/login-handle', 'Login_Handle')->name('loginhandle');
        Route::post('/admin/admin-search', 'AdminSearch')->name('admin-search');

    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'Index')->name('allcategory');
        Route::get('/admin/edit-category', 'EditCategory')->name('editcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit2category/{id}', 'Edit2Category')->name('edit2category');
        Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
    });
    Route::controller(MemberController::class)->group(function () {
        Route::get('/admin/all-member', 'Index')->name('allmember');
        Route::get('/admin/edit-member', 'EditMember')->name('editmember');
        Route::post('/admin/store-member', 'StoreMember')->name('storemember');
        Route::get('/admin/edit2member/{id}', 'Edit2Member')->name('edit2member');
        Route::post('/admin/update-member', 'UpdateMember')->name('updatemember');
        Route::get('/admin/delete-member/{id}', 'DeleteMember')->name('deletemember');
    });
    Route::controller(WarehouseController::class)->group(function () {
        Route::match(['get', 'post'], '/admin/all-warehouse', 'Index')->name('allwarehouse');
    });
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('/admin/edit-subcategory', 'EditSubCategory')->name('editsubcategory');
        Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit2subcategory/{id}', 'Edit2SubCategory')->name('edit2subcategory');
        Route::post('/admin/update-subcategory', 'UpdateSubCategory')->name('updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCategory')->name('deletesubcategory');
    });

    Route::controller(BrandController::class)->group(function () {
        Route::get('/admin/all-brand', 'Index')->name('allbrand');
        Route::get('/admin/edit-brand', 'EditBrand')->name('editbrand');
        Route::post('/admin/store-brand', 'StoreBrand')->name('storebrand');
        Route::get('/admin/edit2brand/{id}', 'Edit2Brand')->name('edit2brand');
        Route::post('/admin/update-brand', 'UpdateBrand')->name('updatebrand');
        Route::get('/admin/delete-brand/{id}', 'DeleteBrand')->name('deletebrand');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-products', 'Index')->name('allproducts');
        Route::get('/admin/edit-products', 'EditProduct')->name('editproducts');
        Route::post('/admin/store-products', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/edit2product/{id}', 'Edit2Product')->name('edit2product');
        Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
    });
    Route::controller(MechannicsController::class)->group(function () {
        Route::get('/admin/all-mechannics', 'Index')->name('allmechannics');
        Route::get('/admin/edit-mechannics', 'EditMechannics')->name('editmechannics');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/all-orderlist', 'Index1')->name('allorderlist');
        Route::get('/admin/edit-orderlist', 'EditOrderList')->name('editorderlist');
        Route::get('/admin/all-itemlist', 'Index2')->name('allitemlist');
        Route::get('/admin/edit-itemlist', 'EditItemList')->name('edititemlist');
        Route::get('/admin/complete', 'Complete')->name('complete');
        Route::get('/admin/cancel', 'Cancel')->name('cancel');
        Route::post('/admin/store-item', 'StoreItem')->name('storeitem');
    });

    Route::controller(ServiceController::class)->group(function () {
        Route::get('/admin/all-service', 'Index')->name('allservice');
        Route::get('/admin/edit-service', 'EditService')->name('editservice');
        Route::post('/admin/store-service', 'StoreService')->name('storeservice');
        Route::get('/admin/edit2service/{id}', 'Edit2Service')->name('edit2service');
        Route::post('/admin/update-service', 'UpdateService')->name('updateservice');
        Route::get('/admin/delete-service/{id}', 'DeleteService')->name('deleteservice');
    });
    Route::controller(CartController::class)->group(function () {
        Route::get('/admin/all-cart', 'Index')->name('allcart');
        Route::get('/admin/edit-cart', 'EditCart')->name('editcart');
        Route::post('/admin/store-cart', 'StoreCart')->name('storecart');
        Route::get('/admin/edit2cart/{id}', 'Edit2Cart')->name('edit2cart');
        Route::post('/admin/update-cart', 'UpdateCart')->name('updatecart');
        Route::get('/admin/delete-cart/{id}', 'DeleteCart')->name('deletecart');
    });
    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/admin/all-checkout', 'Index')->name('allcheckout');
        Route::get('/admin/edit-checkout', 'EditCheckout')->name('editcheckout');
        Route::post('/admin/store-checkout', 'StoreCheckout')->name('storecheckout');
        Route::get('/admin/edit2checkout/{id}', 'Edit2Checkout')->name('edit2checkout');
        Route::post('/admin/update-checkout', 'UpdateCheckout')->name('updatecheckout');
        Route::get('/admin/delete-checkout/{id}', 'DeleteCheckout')->name('deletecheckout');
    });
    Route::controller(BillController::class)->group(function () {
        Route::get('/admin/all-bill', 'Index')->name('allbill');
        Route::get('/admin/edit-bill', 'EditBill')->name('editbill');
        Route::post('/admin/store-bill', 'StoreBill')->name('storebill');
        Route::get('/admin/edit2bill/{id}', 'Edit2Bill')->name('edit2bill');
        Route::post('/admin/update-bill', 'UpdateBill')->name('updatebill');
        Route::get('/admin/delete-bill/{id}', 'DeleteBill')->name('deletebill');
    });
    Route::controller(CouponController::class)->group(function () {
        Route::get('/admin/all-coupon', 'Index')->name('allcoupon');
        Route::get('/admin/edit-coupon', 'EditCoupon')->name('editcoupon');
        Route::post('/admin/store-coupon', 'StoreCoupon')->name('storecoupon');
        Route::get('/admin/edit2coupon/{id}', 'Edit2Coupon')->name('edit2coupon');
        Route::post('/admin/update-coupon', 'UpdateCoupon')->name('updatecoupon');
        Route::get('/admin/delete-coupon/{id}', 'DeleteCoupon')->name('deletecoupon');
    });
    Route::controller(NewsController::class)->group(function () {
        Route::get('/admin/all-news', 'Index')->name('allnews');
        Route::get('/admin/edit-news', 'EditNews')->name('editnews');
        Route::post('/admin/store-news', 'StoreNews')->name('storenews');
        Route::get('/admin/edit2news/{id}', 'Edit2News')->name('edit2news');
        Route::post('/admin/update-news', 'UpdateNews')->name('updatenews');
        Route::get('/admin/delete-news/{id}', 'DeleteNews')->name('deletenews');
    });
    Route::controller(NewsDetailController::class)->group(function () {
        Route::get('/admin/all-news/detail', 'Index')->name('allnewsdetail');
        Route::get('/admin/edit-news/detail', 'EditNewsDetail')->name('editnewsdetail');
        Route::post('/admin/store-news/detail', 'StoreNewsDetail')->name('storenewsdetail');
        Route::get('/admin/edit2news/detail/{id}', 'Edit2NewsDetail')->name('edit2newsdetail');
        Route::post('/admin/update-news/detail', 'UpdateNewsDetail')->name('updatenewsdetail');
        Route::get('/admin/delete-news/detail/{id}', 'DeleteNewsDetail')->name('deletenewsdetail');
    });
    Route::controller(TemplateController::class)->group(function () {
        Route::get('/frontend/index', 'Template')->name('home');
        Route::match(['get', 'post'], 'frontend/login', 'LoginCustomer')->name('frontendlogin');
        Route::match(['get', 'post'], 'frontend/register', 'RegisterCustomer')->name('frontendregister');
        Route::match(['get', 'post'], 'frontend/logout', 'LogOutCustomer')->name('logoutcustomer');
        Route::match(['get', 'post'], 'frontend/contact', 'Contact')->name('contact');
        Route::match(['get', 'post'], 'frontend/product', 'ProductFrontend')->name('productfrontend');
        Route::match(['get', 'post'], 'frontend/addtocart', 'AddToCart')->name('addtocart');
        Route::match(['get', 'post'], 'frontend/update-cart', 'UpdateCart')->name('update-cart');
        Route::match(['get', 'post'], 'frontend/delete-cart/{id}', 'DeleteCart')->name('delete-cart');
        Route::match(['get', 'post'], 'frontend/addcoupon', 'ApplyCoupon')->name('applycoupon');
        Route::match(['get', 'post'], 'frontend/payment', 'Payment')->name('payment');
        Route::match(['get', 'post'], 'frontend/payment2', 'Payment2')->name('payment2');
        Route::match(['get', 'post'], 'frontend/checkout', 'Checkout')->name('checkout');
        Route::match(['get', 'post'], 'frontend/vnpay', 'VNPay')->name('vnpay');
        Route::match(['get', 'post'], 'frontend/success', 'Success')->name('success');
        Route::get('/frontend/aboutuss', 'AboutUs')->name('aboutus');
        Route::match(['get', 'post'], 'frontend/searchproduct', 'SearchProduct')->name('search');
        Route::match(['get', 'post'], 'frontend/setting-user', 'SettingUser')->name('setting_user');
        Route::match(['get', 'post'], 'frontend/setting-user-temp', 'SettingUserTemp')->name('setting_user_temp');
        Route::match(['get', 'post'], 'frontend/bill', 'Bill')->name('bill');
        Route::match(['get', 'post'], 'frontend/news', 'News')->name('news');
        Route::get('/export-checkout', 'CheckoutController@export')->name('export.checkout');
        Route::match(['get', 'post'], 'frontend/sendsms', 'SendSMS')->name('nexmo');

        // Route::match('/frontend/setting-user', 'SettingUser')->name('setting_user');

        // Route::post('/update-cart/{ids}', function ($ids) {
        //     $cartid = explode(',', $ids);
        //     foreach ($cartid as $productId) {
        //         $product = Product::find($productId);
        //         $quantity = request('quantity');

        //     }
        // });
        // Route::post('/frontendlogout', function (Request $request) {
        //     // Lấy thông tin người dùng đăng nhập hiện tại
        //     $user = Auth::user();

        //     // Đăng xuất người dùng
        //     Auth::logout();

        //     // Lưu thông tin đăng xuất vào Session
        //     $request->session()->flash('logout', "Bạn đã đăng xuất tài khoản {$user->name} thành công.");

        //     // Chuyển hướng người dùng đến trang đăng nhập
        //     return redirect()->route('frontendlogin');
        // })->name('logout');
        // Route::get('/frontend/product', 'Category_Product')->name('category-product');
        // Route::get('/frontend/product', 'ProductFrontend')->name('productfrontend');
        // // Route::get('/frontend/product', 'Brand_Product')->name('brand-product');
        // Route::post('/frontend/login.php', 'LoginCustomer2')->name('login-customer2');
        // Route::post('/frontend/register', 'RegisterCustomer')->name('register-customer');
    });
});
// Route::controller(TemplateController::class)->group(function () {
//     Route::get('/frontend/login', 'Index')->name('allcarts');
//     Route::get('/admin/edit-carts', 'EditCarts')->name('editcarts');
// });



Route::get('/userprofile', [DashboardController::class, 'Index']);
Route::get("/lienhe", [MailController::class, 'SendMail']);
Route::post("/guilienhe", function (Illuminate\Http\Request $request) {
    $arr = request()->post();
    $ht = trim(strip_tags($arr['ht']));
    $em = trim(strip_tags($arr['em']));
    $nd = trim(strip_tags($arr['nd']));
    $adminEmail = 'taithanh421@gmail.com'; //Gửi thư đến ban quản trị
    Mail::mailer('smtp')->to($adminEmail)
        ->send(new GuiEmail($ht, $em, $nd));

    $request->session()->flash('thongbao', "Đã gửi mail");
    return redirect("thongbao");
});
Route::get("/thongbao", function (Illuminate\Http\Request $request) {
    $tb = $request->session()->get('thongbao');
    return view('thongbao', ['thongbao' => $tb]);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get("/frontend/contact", function (Illuminate\Http\Request $request) {
    $diem = ['toan' => 9, 'van' => 7];
    Mail::mailer('mailgun')->to('taithanhvo00@gmail.com')->send(new GuiEmailSecond($diem));
});
require __DIR__ . '/auth.php';
