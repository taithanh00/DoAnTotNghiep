<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Checkout;
use App\Models\Member;
use App\Models\Service;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Bill;
use App\Models\News;
use App\Models\News_Detail;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use League\CommonMark\Extension\Table\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Vnpay\VnPay;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CheckoutExport;
use Carbon\Carbon;
use function PHPSTORM_META\type;
use Http\Adapter\Guzzle6\Client as GuzzleClient;
use Vonage\Client;
use Illuminate\Support\ServiceProvider;

class TemplateController extends Controller
{
    public $username;
    public function Template()
    {
        $categories = category::latest()->get();
        $products = Product::all();
        $brand = DB::table('brands')->pluck('BrandName')->toArray();
        $product_name = DB::table('products')->pluck('product_name')->toArray();
        $product_des = DB::table('products')->pluck('description')->toArray();
        $product_price = DB::table('products')->pluck('price')->toArray();
        $product_id = DB::table('products')->pluck('id')->toArray();
        $product_img = DB::table('products')->pluck('product_img')->toArray();
        $product_paginate = Product::paginate(1);
        return view('frontend.layouts.template', compact('products', 'brand', 'product_name', 'product_des', 'product_price', 'product_id', 'product_paginate', 'product_img'));
    }
    public function AboutUs()
    {
        return view('frontend.layouts.aboutus');
    }
    public function LoginCustomer(Request $request)
    {
        $memberemail = DB::table('member')->pluck('email')->toArray();
        $memberpassword = DB::table('member')->pluck('password')->toArray();
        $members = DB::table('member')->get()->toArray();
        $username = $request->input('username');
        $password = $request->input('password');

        $member = DB::table('member')
            ->where('email', $username)
            ->where('password', $password)
            ->first();

        if ($member) {
            $request->session()->put('username', $username);
            $response = redirect()->route('home');
            $response->send();
        } else {
            // return redirect()->back()->with('error', 'Invalid username or password')->withInput();
            // $response = redirect()->route('frontendlogin')->with('message', 'Login Failed');
            // $response->send();
            // $responsefail = redirect()->route('frontendlogin')->with('message', 'Login Failed');
            // $responsefail->send();
            echo '';
        }
        $request->session()->put('username', $username);

        return view('frontend.layouts.include.login.login', compact('member'));
    }
    public function RegisterCustomer(Request $request)
    {

        $memberemail = DB::table('member')->pluck('email')->toArray();
        $memberpassword = DB::table('member')->pluck('password')->toArray();
        $username_register = $request->input('register_username');
        $email_register = $request->input('register_email');
        $password_register = $request->input('register_password');
        $created_at = now();
        $updated_at = now();
        $validator = [$username_register, $email_register, $password_register];
        $members = Member::all();
        foreach ($members as $member) {
            if ($member->email == $email_register) {
                $response = redirect()->route('frontendregister')->with('message', 'Register Failed');
                $response->send();
            }
        }
        $member = new Member;
        $member->username = $username_register;
        $member->email = $email_register;
        $member->password = $password_register;
        $member->created_at = $created_at;
        $member->updated_at = $updated_at;
        $member->save();
        return view('frontend.layouts.include.login.login');
    }
    public function LogOutCustomer(Request $request)
    {
        // $user = Auth::user();

        // // Đăng xuất người dùng
        // Auth::logout();

        // // Lưu thông tin đăng xuất vào Session
        // $request->session()->put('logout', "Bạn đã đăng xuất tài khoản {$user->name} thành công.");
        // // Chuyển hướng người dùng đến trang đăng nhập
        // return redirect()->route('frontendlogin');
        // Session::flush();
        return view('frontend.layouts.template');
    }
    public function Contact()
    {
        return view('frontend.layouts.contact');
    }
    public function ProductFrontend()
    {
        $products = Product::all();
        $brand = DB::table('brands')->pluck('BrandName')->toArray();
        $product_name = DB::table('products')->pluck('product_name')->toArray();
        $product_des = DB::table('products')->pluck('description')->toArray();
        $product_price = DB::table('products')->pluck('price')->toArray();
        $product_id = DB::table('products')->pluck('id')->toArray();
        $product_img = DB::table('products')->pluck('product_img')->toArray();
        $cart = Cart::all();
        $cart_count = count($cart);
        $product_paginate = Product::paginate(5);
        print_r($product_id);
        // print_r($product_name[7]) ;
        // print_r($product_des[7]) ;
        // print_r($product_price) ;
        // $product = $product->get();


        $pageName = 'Tên Trang - News';

        return view('frontend.layouts.product', compact('products', 'brand', 'product_name', 'product_des', 'product_price', 'product_id', 'product_paginate', 'cart_count', 'product_img'));
    }
    public function AddToCart(Request $request)
    {
        $products = Product::all();
        $cart = Cart::all();
        $cart_count = count($cart);
        $product_name = DB::table('products')->pluck('product_name')->toArray();
        $product_img = DB::table('products')->pluck('product_img')->toArray();
        $product_price = DB::table('products')->pluck('price')->toArray();
        $product_name1 = $request->input('product_name1');
        $product_price1 = $request->input('product_price1');
        $myValue1 = $request->input('form1');
        $myValue2 = $request->input('form2');
        $myValue3 = $request->input('form3');
        $myValue4 = $request->input('form4');
        $myValue5 = $request->input('form5');
        $myValue6 = $request->input('form6');
        $myValue7 = $request->input('form7');
        $myValue8 = $request->input('form8');
        $myValue9 = $request->input('form9');
        $myValue10 = $request->input('form10');
        $myValue11 = $request->input('form11');
        $myValue12 = $request->input('form12');
        $myValue13 = $request->input('form13');
        $myValue14 = $request->input('form14');
        $myValue15 = $request->input('form15');
        $myValue16 = $request->input('form16');
        $myValue17 = $request->input('form17');
        $myValue18 = $request->input('form18');
        $myValue19 = $request->input('form19');
        $myValue20 = $request->input('form20');
        $brand = DB::table('brands')->pluck('BrandName')->toArray();
        $product_price = DB::table('products')->pluck('price')->toArray();
        $product_des = DB::table('products')->pluck('description')->toArray();
        $product_name2 = $request->input('product_name2');
        $product_price2 = $request->input('product_price2');
        $product_name3 = $request->input('product_name3');
        $product_price3 = $request->input('product_price3');
        $product_name4 = $request->input('product_name4');
        $product_price4 = $request->input('product_price4');
        $product_name5 = $request->input('product_name5');
        $product_price5 = $request->input('product_price5');
        $product_name6 = $request->input('product_name6');
        $product_price6 = $request->input('product_price6');
        $product_name7 = $request->input('product_name7');
        $product_price7 = $request->input('product_price7');
        $product_name8 = $request->input('product_name8');
        $product_price8 = $request->input('product_price8');
        $product_name9 = $request->input('product_name9');
        $product_price9 = $request->input('product_price9');
        $product_name10 = $request->input('product_name10');
        $product_price10 = $request->input('product_price10');
        $product_name11 = $request->input('product_name11');
        $product_price11 = $request->input('product_price11');
        $product_name12 = $request->input('product_name12');
        $product_price12 = $request->input('product_price12');
        $product_name13 = $request->input('product_name13');
        $product_price13 = $request->input('product_price13');
        $product_name14 = $request->input('product_name14');
        $product_price14 = $request->input('product_price14');
        $product_name15 = $request->input('product_name15');
        $product_price15 = $request->input('product_price15');
        $product_name16 = $request->input('product_name16');
        $product_price16 = $request->input('product_price16');
        $product_name17 = $request->input('product_name17');
        $product_price17 = $request->input('product_price17');
        $product_name18 = $request->input('product_name18');
        $product_price18 = $request->input('product_price18');
        $product_name19 = $request->input('product_name19');
        $product_price19 = $request->input('product_price19');
        $product_name20 = $request->input('product_name20');
        $product_price20 = $request->input('product_price20');
        $cart_count_price = DB::table('cart')->pluck('product_price')->toArray();
        $cart_count_quantity = DB::table('cart')->pluck('quantity')->toArray();
        $total = 0;
        $product_paginate = Product::paginate(5);
        for ($i = 0; $i < count($cart_count_price); $i++) {
            $total += $cart_count_price[$i] * $cart_count_quantity[$i];
        }
        // $total = DB::table('cart')->pluck('total_price')->toArray();
        for ($i = 0; $i < $cart_count; $i++) {
        }
        if ($myValue1) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name1);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name1;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://cdn.honda.com.vn/spare-parts/October2022/HQwAel7UTAj7BiwLzM3a.png';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price1;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue2) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name2);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name2;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://cdn.honda.com.vn/spare-parts/December2019/IuMc99XSVWuHCu2O6LnY.png';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price2;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue3) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name3);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name3;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://yamaha-motor.com.vn/wp/wp-content/themes/yamaha/timthumb/timthumb.php?src=/wp/wp-content/uploads/2019/12/MSSS-1.jpg&h=200&w=255';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price3;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue4) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name4);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name4;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://yamaha-motor.com.vn/wp/wp-content/themes/yamaha/timthumb/timthumb.php?src=/wp/wp-content/uploads/2017/07/cba33ceaf1673e5cfd969943519297db.png&h=200&w=255';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price4;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue5) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name5);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name5;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://shop2banh.vn/images/thumbs/2023/02/bo-ve-sinh-loc-gio-stb-chinh-hang-products-1999.png';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price5;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue6) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name6);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name6;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://drive.gianhangvn.com/image/cam-bien-khi-xa-suzuki-carry-amp-500kg-1513119j29348x3.jpg';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price6;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue7) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name7);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name7;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://kawasakisaigon.com/upload/hinhanh/thumb/windshieldcafe-vulcan-s-model-year-2015.jpg';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price7;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue8) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name8);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name8;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://kawasakisaigon.com/upload/hinhanh/thumb/grip-heater-kit-ninja-ninja-1000.jpg';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price8;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue9) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name9);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name9;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://cdn.honda.com.vn/spare-parts/November2019/Vk29zWeOYRWZQsFd0Rnz.jpg';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price9;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue10) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name10);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name10;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://cdn.honda.com.vn/spare-parts/November2019/EnCJqb5bQvQweyKwiCjp.jpg';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price10;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue11) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name11);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name11;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://cdn.honda.com.vn/spare-parts/November2019/UH9foJbR9vdARzbsUEkz.jpg';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price11;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue12) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name12);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name12;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://cdn.honda.com.vn/spare-parts/October2022/hS2ywfhges1kRN8CQzr3.png';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price12;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue13) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name13);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name13;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://cdn.honda.com.vn/spare-parts/October2022/6WLgbhMy0WTks3PZKPOb.png';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price13;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue14) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name14);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name14;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://cdn.honda.com.vn/spare-parts/November2019/EGbwXNR047t7w3rV3kYN.jpg';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price14;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue15) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name15);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name15;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://yamaha-motor.com.vn/wp/wp-content/themes/yamaha/timthumb/timthumb.php?src=/wp/wp-content/uploads/2017/07/726a94fa99285abda4818203d96e7ee7.jpg&h=455&w=540';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price15;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue16) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name16);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name16;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://yamaha-motor.com.vn/wp/wp-content/themes/yamaha/timthumb/timthumb.php?src=/wp/wp-content/uploads/2017/07/e12d4f5afdcb6d01eeff62ccb88fc733.png&h=455&w=540';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price16;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue17) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name17);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name17;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://yamaha-motor.com.vn/wp/wp-content/themes/yamaha/timthumb/timthumb.php?src=/wp/wp-content/uploads/2017/07/c208df8fca614dfde550cc3ffc260c8f.jpg&h=455&w=540';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price17;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue18) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name18);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name18;
                $new_cart_item->category_name = 'Accessory'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://yamaha-motor.com.vn/wp/wp-content/themes/yamaha/timthumb/timthumb.php?src=/wp/wp-content/uploads/2017/07/38e75b7a6d0a22b014afe0eadb6c5f09.png&h=455&w=540';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price18;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue19) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name19);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name19;
                $new_cart_item->category_name = 'Nhông sên dĩa'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2017/10/NH%C3%94NG-S%C3%8AN-D%C4%A8A-ZIN-FI-scaled.jpg';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price19;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        if ($myValue20) {
            // lấy dữ liệu giỏ hàng từ cơ sở dữ liệu hoặc nguồn khác
            $cart = Cart::all();

            $product_in_cart = $cart->firstWhere('product_name', $product_name20);

            // cập nhật số lượng cho mục giỏ hàng đã có hoặc tạo một mục giỏ hàng mới
            if ($product_in_cart) {
                $product_in_cart->quantity += 1;
                $product_in_cart->save();
            } else {
                $new_cart_item = new Cart;
                $new_cart_item->product_name = $product_name20;
                $new_cart_item->category_name = 'Mút Lọc Gió'; // gán giá trị phù hợp cho category_name
                $new_cart_item->product_img = 'https://phutungkawasaki.com/wp-content/uploads/2020/10/122483309_2827621797471204_8485987977384499008_n-1.jpg';
                $new_cart_item->quantity = 1;
                $new_cart_item->product_price = $product_price20;

                $new_cart_item->save(); // lưu mục giỏ hàng mới
            }
        }
        $cart = Cart::all();
        $cart_count = count($cart);
        $coupon_codegetvalue = $request->input('coupon_code');

        $coupon_codes = DB::table('coupon')->pluck('coupon_code')->toArray();

        $cart_count_prices = DB::table('cart')->pluck('product_price')->toArray();
        $cart_count_quantities = DB::table('cart')->pluck('quantity')->toArray();
        $subtotals = array();
        $total = 0;
        for ($i = 0; $i < count($cart_count_prices); $i++) {
            $subtotal = $cart_count_prices[$i] * $cart_count_quantities[$i];
            $subtotals[] = $subtotal;
            $total += $subtotal;
        }

        $discount = 0;
        foreach ($coupon_codes as $coupon_code) {
            if ($coupon_codegetvalue == $coupon_code) {
                // Tính giá trị giảm giá dựa trên mã giảm giá được áp dụng
                if ($coupon_code == '25%') {
                    $discount = $total * 0.25;
                } else if ($coupon_code == '50%') {
                    $discount = $total * 0.5;
                } else if ($coupon_code == '75%') {
                    $discount = $total * 0.75;
                } else if ($coupon_code == '10%') {
                    $discount = $total * 0.1;
                } else if ($coupon_code == '15%') {
                    $discount = $total * 0.15;
                } else if ($coupon_code == '20%') {
                    $discount = $total * 0.2;
                }

                break;
            }
        }
        $total_after_discount = $total - $discount;
        // print_r($form1);
        // $product = Product::find($product_name);
        // return redirect()->route('addtocart',compact('cart', 'cart_count', 'total'))->header('Cache-Control', 'no-cache, no-store, must-revalidate')->header('Pragma', 'no-cache')->header('Expires', '0');
        //     return redirect('frontend.layouts.cart')->route('addtocart',compact('product_name1','product_name','product_price1','products','brand','product_des',
        // 'product_price','product_name2','product_price2','product_name3','product_price3','product_name3','product_price3',
        // 'product_name4','product_price4','product_name5','product_price5','product_name6','product_price6','product_name7','product_price7',
        // 'product_name8','product_price8','cart','cart_count','cart_count_price','total','total_after_discount'));
        return view('frontend.layouts.cart', [
            'product_name1' => $product_name1,
            'product_name' => $product_name,
            'product_price1' => $product_price1,
            'products' => $products,
            'brand' => $brand,
            'product_des' => $product_des,
            'product_price' => $product_price,
            'product_name2' => $product_name2,
            'product_price2' => $product_price2,
            'product_name3' => $product_name3,
            'product_price3' => $product_price3,
            'product_name4' => $product_name4,
            'product_price4' => $product_price4,
            'product_name5' => $product_name5,
            'product_price5' => $product_price5,
            'product_name6' => $product_name6,
            'product_price6' => $product_price6,
            'product_name7' => $product_name7,
            'product_price7' => $product_price7,
            'product_name8' => $product_name8,
            'product_price8' => $product_price8,
            'cart' => $cart,
            'cart_count' => $cart_count,
            'cart_count_price' => $cart_count_price,
            'total' => $total,
            'total_after_discount' => $total_after_discount,
            'discount' => $discount,
            'coupon_code' => $coupon_code,
            'product_paginate' => $product_paginate,
            'product_img' => $product_img
        ]);
        // return view('frontend.layouts.cart', compact(
        //     'product_name1',
        //     'product_name',
        //     'product_price1',
        //     'products',
        //     'brand',
        //     'product_des',
        //     'product_price',
        //     'product_name2',
        //     'product_price2',
        //     'product_price',
        //     'product_name3',
        //     'product_price3',
        //     'product_name4',
        //     'product_price4',
        //     'product_name5',
        //     'product_price5',
        //     'product_name6',
        //     'product_price6',
        //     'product_name7',
        //     'product_price7',
        //     'product_name8',
        //     'product_price8',
        //     'cart',
        //     'cart_count',
        //     'cart_count_price',
        //     'total',
        //     'total_after_discount'
        // ));
    }
    public function UpdateCart(Request $request)
    {
        $cart = Cart::all();
        $cart_count = count($cart);
        // print_r($cart_count);
        $cart_id = $request->id;
        $request->validate([
            'quantity' => 'required',
        ]);
        $quantityarray = array_values($request->quantity);
        $cart_count_price = DB::table('cart')->pluck('product_price')->toArray();
        $cart_count_quantity = DB::table('cart')->pluck('quantity')->toArray();
        $total = 0;
        for ($i = 0; $i < count($cart_count_price); $i++) {
            $total += $cart_count_price[$i] * $cart_count_quantity[$i];
        }
        // $cart_count = 8 ;
        $ids = $request->input('id');
        $quantities = $request->input('quantity');
        $total_after_discount = 0;
        Cart::whereIn('id', $ids)
            ->whereNotNull('quantity')
            ->update(['quantity' => DB::raw('CASE id ' . implode(' ', array_map(function ($id) use ($quantities) {
                return 'WHEN ' . (int)$id . ' THEN ' . (int)$quantities[$id];
            }, $ids)) . ' END')]);
        // return view('frontend.layouts.cart', compact('cart_count', 'cart', 'total', 'total_after_discount'));
        return redirect()->route('addtocart', compact('cart_count', 'cart', 'total', 'total_after_discount'));
        // $updatequantity = new Cart ;
        // $cart->quantity = $request->quantity;
        // $updatequantity->update();
        // $updatequantity->save();
        // $quantity = $request->input('quantity');


        // print_r($quantity);

        // for ($i = 0; $i < $cart_count; $i++) {
        //     $temp = 0 ;
        //     $temp = $cart_count_quantity[$i];
        //     $cart_count_quantity[$i] = $quantity[$i];
        //     $quantity[$i] = $temp ;
        // }

        // //Cập nhật giá trị số lượng trong cơ sở dữ liệu
        // for ($i = 0; $i < count($cart_count_quantity); $i++) {
        //     $update_susscess= DB::table('cart')->where('cart_item_id', $i)->update(['quantity' => $cart_count_quantity[$i]]);
        // }
        // for ($i = 0; $i < count($quantity); $i++) {
        //     $cart = Cart::where('cart_item_id', $i)->first();
        //     $cart->quantity = $quantity[$i];
        //     $cart->save();
        // }
        // for($i=0;$i<count($cart);$i++)
        // {
        //     DB::table('cart')->update(['cart_count_quantity[$i]'=>$quantity[$i]]);
        // }
        // Thêm trường cart_item_id vào bảng cart
        // Schema::table('cart', function (Blueprint $table) {
        //     $table->integer('cart_item_id');
        // });

        // // Thêm giá trị cho trường cart_item_id cho từng sản phẩm trong giỏ hàng
        // $cartItems = DB::table('cart')->get();
        // foreach ($cartItems as $index => $item) {
        //     DB::table('cart')->where('id', $item->id)->update(['cart_item_id' => $index]);
        // }

        //Cập nhật số lượng sản phẩm trong giỏ hàng bằng cách sử dụng trường cart_item_id
        // foreach ($quantity as $index => $value) {
        //     $update_cart =DB::table('cart')->where('cart_item_id', $index)->update(['quantity' => $value]);
        // }
        // for($i=0 ; $i<count($cart_count_quantity);$i++){
        //     $update_cart = DB::table('cart')->where('cart_item_id', $i)->update(['quantity' => $quantity[$i]]);
    }

    // return view('frontend.layouts.cart',compact('cart', 'cart_count', 'total', 'quantity','url'))->header('Cache-Control', 'no-cache, no-store, must-revalidate')->header('Pragma', 'no-cache')->header('Expires', '0');



    // public function GetQuantity(Request $request)
    // {
    //     $quantity = $request->input('quantity2');
    //     echo ($quantity);
    //     return view('frontend.layouts.cart');
    // }
    public function DeleteCart($id)
    {
        $cart_delete = Cart::findOrFail($id);
        $cart = Cart::all();
        $cart_count = count($cart);
        $cart_delete->delete();

        // Trả về view hiển thị lại giỏ hàng của kháchhàng
        // return view('frontend.layouts.cart', compact('cart_count', 'cart'))->with('success', 'Xóa sản phẩm khỏi giỏ hàng thành công!');
        return redirect()->route('addtocart', compact('cart', 'cart_count'));
    }
    public function ApplyCoupon(Request $request)
    {
        $cart = Cart::all();
        $cart_count = count($cart);
        $coupon_codegetvalue = $request->input('coupon_code');

        $coupon_codes = DB::table('coupon')->pluck('coupon_code')->toArray();

        $cart_count_prices = DB::table('cart')->pluck('product_price')->toArray();
        $cart_count_quantities = DB::table('cart')->pluck('quantity')->toArray();
        $subtotals = array();
        $total = 0;
        for ($i = 0; $i < count($cart_count_prices); $i++) {
            $subtotal = $cart_count_prices[$i] * $cart_count_quantities[$i];
            $subtotals[] = $subtotal;
            $total += $subtotal;
        }

        $discount = 0;
        foreach ($coupon_codes as $coupon_code) {
            if ($coupon_codegetvalue == $coupon_code) {
                // Tính giá trị giảm giá dựa trên mã giảm giá được áp dụng
                if ($coupon_code == '25%') {
                    $discount = $total * 0.25;
                } else if ($coupon_code == '50%') {
                    $discount = $total * 0.5;
                } else if ($coupon_code == '75%') {
                    $discount = $total * 0.75;
                } else if ($coupon_code == '10%') {
                    $discount = $total * 0.1;
                } else if ($coupon_code == '15%') {
                    $discount = $total * 0.15;
                } else if ($coupon_code == '20%') {
                    $discount = $total * 0.2;
                }

                break;
            }
        }
        $total_after_discount = $total - $discount;


        return view('frontend.layouts.cart', [
            'total_after_discount' => $total_after_discount,
            'total' => $total
        ], compact('total_after_discount', 'cart', 'cart_count'));
    }
    public function Payment()
    {
        // $checkout = new Checkout;
        // $checkout->firstname = $firstname;
        // $checkout->lastname = $lastname;
        // $checkout->email = $email;
        // $checkout->address = $address;
        // $checkout->phone = $phone;
        // $checkout->message = $message;
        // $checkout->save();
        // return redirect()->route('payment')->with('message', 'Payed Successfully');
        return view('frontend.layouts.payment');
    }
    public function Payment2(Request $request)
    {
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $address = $request->address;
        $phone = $request->phone;
        $message = $request->message;
        // Lấy tất cả các sản phẩm từ bảng cart
        $carts = DB::table('cart')->get();

        // Lấy thời gian hiện tại
        $now = Carbon::now();

        // Tạo các giá trị thời gian cho các cột `day_buy_product`, `day_thanks`, và `time_guarantee`
        $day_buy_product = $now->copy();
        $day_thanks = $now->copy()->addDays(3);
        $time_guarantee = $now->copy()->addYear();

        // Tạo một mảng để lưu thông tin của tất cả các sản phẩm trong giỏ hàng
        $checkout_products = [];

        foreach ($carts as $cart) {
            // Thêm thông tin của từng sản phẩm vào mảng $checkout_products
            $checkout_products[] = [
                'product_name' => $cart->product_name,
                'quantity' => $cart->quantity,
                'product_img' => $cart->product_img,
                'product_price' => $cart->product_price
            ];
        }

        // Tạo mới đối tượng `Checkout` và lưu thông tin vào bảng `checkout`
        $checkout = new Checkout;
        $checkout->first_name  = $firstname;
        $checkout->last_name  = $lastname;
        $checkout->email  = $email;
        $checkout->stress_address  = $address;
        $checkout->phone_number  = $phone;
        $checkout->message  = $message;
        $checkout->checkout_products = json_encode($checkout_products);
        $checkout->save();
        // Lấy giá trị của cột id đã được lưu trữ
        $checkout_id = $checkout->id;

        // Tạo mới đối tượng `Service` và lưu thông tin vào bảng `service`
        $service = new Service;
        $service->customer_first_name = $firstname;
        $service->customer_last_name = $lastname;
        $service->customer_email = $email;
        $service->customer_phone_number = $phone;
        $service->customer_stress_address = $address;
        $service->day_buy_product = $day_buy_product;
        $service->day_thanks = $day_thanks;
        $service->time_guarantee = $time_guarantee;
        $service->checkout_id = $checkout_id; // Gán giá trị của biến $checkout_id vào cột checkout_id
        $service->save();

        // Set session
        Session::put('first_name', $firstname);
        Session::put('last_name', $lastname);

        return redirect()->route('success');
    }
    public function Bill()
    {
        $firstname_session = Session::get('first_name');
        $lastname_session = Session::get('last_name');
        $invoice = DB::table('checkout')->where('first_name', $firstname_session)->where('last_name', $lastname_session)->first();
        if (isset($invoice)) {
            $product_list = json_decode($invoice->checkout_products);
            $total_price = 0;
            foreach ($product_list as $product) {
                $total_price += $product->product_price * $product->quantity;
            }
            return view('frontend.layouts.bill', compact('invoice', 'product_list', 'total_price'));
        } else {
            return view('frontend.layouts.bill', compact('invoice'));
        }
    }
    // public function export()
    // {
    //     $export = new CheckoutExport;
    //     return Excel::download($export, 'checkout.xlsx');
    // }
    private function getCartProductInfo()
    {
        // Lấy tất cả các sản phẩm trong giỏ hàng
        $carts = DB::table('cart')->get();

        $cart_productname = [];
        $cart_quantity = [];
        $cart_productprice = [];
        $cart_productimg = [];
        $cart_producttotalprice = [];

        // Lặp qua từng sản phẩm và lấy giá trị của các thuộc tính
        foreach ($carts as $cart) {
            $cart_productname[] = $cart->product_name;
            $cart_quantity[] = $cart->quantity;
            $cart_productprice[] = $cart->product_price;
            $cart_productimg[] = $cart->product_img;
            $cart_producttotalprice[] = $cart->total_price;
        }

        return [$cart_productname, $cart_quantity, $cart_productprice, $cart_productimg, $cart_producttotalprice];
    }
    public function Checkout(Request $request)
    {
        $cart = Cart::all();
        $cart_count = count($cart);
        $coupon_codegetvalue = $request->input('coupon_code');

        $coupon_codes = DB::table('coupon')->pluck('coupon_code')->toArray();

        $cart_count_prices = DB::table('cart')->pluck('product_price')->toArray();
        $cart_count_quantities = DB::table('cart')->pluck('quantity')->toArray();
        $subtotals = array();
        $total = 0;
        for ($i = 0; $i < count($cart_count_prices); $i++) {
            $subtotal = $cart_count_prices[$i] * $cart_count_quantities[$i];
            $subtotals[] = $subtotal;
            $total += $subtotal;
        }

        $discount = 0;
        foreach ($coupon_codes as $coupon_code) {
            if ($coupon_codegetvalue == $coupon_code) {
                // Tính giá trị giảm giá dựa trên mã giảm giá được áp dụng
                if ($coupon_code == '25%') {
                    $discount = $total * 0.25;
                } else if ($coupon_code == '50%') {
                    $discount = $total * 0.5;
                } else if ($coupon_code == '75%') {
                    $discount = $total * 0.75;
                } else if ($coupon_code == '10%') {
                    $discount = $total * 0.1;
                } else if ($coupon_code == '15%') {
                    $discount = $total * 0.15;
                } else if ($coupon_code == '20%') {
                    $discount = $total * 0.2;
                }

                break;
            }
        }
        $total_after_discount = $total - $discount;
        return view('frontend.layouts.checkout', compact('total_after_discount'));
    }
    public function SearchProduct(Request $request)
    {
        $searchTerm = $request->input('search');
        $products = Product::where('product_name', 'like', '%' . $searchTerm . '%')->get();

        foreach ($products as $product) {
            $price = $product->price;
            $img = $product->product_img;
        }
        return view('frontend.layouts.test', compact('products', 'price', 'img'));
    }
    public function VNPay(Request $request)
    {
        $cart = Cart::all();
        $cart_count = count($cart);
        $coupon_codegetvalue = $request->input('coupon_code');

        $coupon_codes = DB::table('coupon')->pluck('coupon_code')->toArray();

        $cart_count_prices = DB::table('cart')->pluck('product_price')->toArray();
        $cart_count_quantities = DB::table('cart')->pluck('quantity')->toArray();
        $subtotals = array();
        $total = 0;
        for ($i = 0; $i < count($cart_count_prices); $i++) {
            $subtotal = $cart_count_prices[$i] * $cart_count_quantities[$i];
            $subtotals[] = $subtotal;
            $total += $subtotal;
        }

        $discount = 0;
        foreach ($coupon_codes as $coupon_code) {
            if ($coupon_codegetvalue == $coupon_code) {
                // Tính giá trị giảm giá dựa trên mã giảm giá được áp dụng
                if ($coupon_code == '25%') {
                    $discount = $total * 0.25;
                } else if ($coupon_code == '50%') {
                    $discount = $total * 0.5;
                } else if ($coupon_code == '75%') {
                    $discount = $total * 0.75;
                } else if ($coupon_code == '10%') {
                    $discount = $total * 0.1;
                } else if ($coupon_code == '15%') {
                    $discount = $total * 0.15;
                } else if ($coupon_code == '20%') {
                    $discount = $total * 0.2;
                }

                break;
            }
        }
        $total_after_discount = $total - $discount;
        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "M3BCFN9Z"; //Mã website tại VNPAY
        $vnp_HashSecret = "WFNDPXZPCWHYQVSBLXGCESTEZVHNDOUU"; //Chuỗi bí mật
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/frontend/success";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn";
        $vnp_OrderType = 'billpayment';
        // $vnp_Amount = 1000 * 100;
        $total_after_discount = session('total_after_discount');
        $vnp_Amount = $total_after_discount * 100;
        // $vnp_Amount = $total_after_discount ;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
    public function return(Request $request)
    {
        $url = session('url_prev', '/');
        if ($request->vnp_ResponseCode == "00") {
            $this->apSer->thanhtoanonline(session('cost_id'));
            return redirect($url)->with('success', 'Đã thanh toán phí dịch vụ');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors', 'Lỗi trong quá trình thanh toán phí dịch vụ');
    }
    public function Success()
    {
        return view('frontend.layouts.payment_success');
    }
    public function SettingUserTemp(){
        return view('frontend.layouts.setting_user');
    }
    public function SettingUser(Request $request)
    {
        $username = session('username');
        $password_user = DB::table('member')->pluck('password')->toArray();
        $password = $request->input('password');
        $password_confirm = $request->input('confirmPassword');
        print_r($password);
        print_r($password_confirm);
        if ($password_confirm != $password) {
            return redirect()->route('setting_user')->with('error', 'Password Wasnt Match');
        } else {
            for ($i = 0; $i < count($password_user); $i++) {
                if ($username) {
                    DB::table('member')->where('email', $username)->update(['password' => $password]);
                } else {
                    print_r('sai');
                }
            }
        }
        return view('frontend.layouts.setting_user');
    }
    public function News()
    {
        $news_detail = DB::table('news_detail')->get();
        // $result = DB::table('news_detail')
        //     ->join('news', 'news_detail.news_id', '=', 'news.id')
        //     ->join('brands', 'news.brands_id', '=', 'brands.id')
        //     ->select('brands.BrandName')
        //     ->where('news_detail.news_id', 6)
        //     ->first();

        // $brandName1 = $result->BrandName;
        $brand = DB::table('brands')->pluck('BrandName')->toArray();
        // dd($brand);
        // $result2 = DB::table('news_detail')
        //     ->join('news', 'news_detail.news_id', '=', 'news.id')
        //     ->join('brands', 'news.brands_id', '=', 'brands.id')
        //     ->select('brands.BrandName')
        //     ->where('news_detail.news_id', 8)
        //     ->first();

        // $brandName2 = $result2->BrandName;
        // dd($brandName2);
        return view('frontend.layouts.news', compact('news_detail', 'brand'));
    }
    public function SendSMS()
    {
        $vonageClient = app(Client::class);

        $vonageClient->message()->send([
            'to' => '+84383347587',
            'from' => config('0336368565'),
            'text' => 'Test Function Send SMS'
        ]);

        return "Tin nhắn đã được gửi!";
    }
}
