<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Checkout;
use Normalizer;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\NotIn;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Login_Handle(Request $request)
    {
        $credentials = $request->only('email', 'password');
        dd($credentials);
        // if (Auth::attempt($credentials)) {
        //     // Đăng nhập thành công
        //     return redirect()->intended('/dashboard');
        // } else {
        //     // Đăng nhập thất bại
        //     return redirect()->back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng']);
        // }
    }
    public function Index()
    {
        // Lấy dữ liệu từ cột checkout_products trong bảng checkouts
        $checkoutProducts = DB::table('checkout')->pluck('checkout_products');

        $productCounts = [];
        $productNames = [];

        // Duyệt qua từng phần tử trong mảng checkoutProducts
        foreach ($checkoutProducts as $products) {
            // Chuyển chuỗi JSON thành mảng đối tượng
            $productArray = json_decode($products, true);

            // Duyệt qua từng sản phẩm trong mảng productArray
            foreach ($productArray as $product) {
                $productName = $product['product_name'];

                // Nếu product_name chưa tồn tại trong mảng productCounts, thêm nó vào với giá trị quantity là 1
                if (!isset($productCounts[$productName])) {
                    $productCounts[$productName] = 1;
                } else {
                    // Nếu product_name đã tồn tại trong mảng productCounts, tăng giá trị quantity lên 1
                    $productCounts[$productName]++;
                }

                // Nếu product_name xuất hiện một lần, lưu vào mảng productNames
                if ($productCounts[$productName] === 1) {
                    $productNames[] = $productName;
                }
            }
        }
        // Truyền mảng productNames và mảng productCounts vào view 'admin.dashboard'
        return view('admin.dashboard', compact('productNames', 'productCounts'));
    }
    public function AdminSearch(Request $request)
    {
        $product = DB::table('products')->select('*');
        $product = $product->get();
        $request->validate([
            'product_search' => 'required',
        ]);

        $searchQuery = $request->input('product_search');
        $products = DB::table('products')->get();

        $matchingProductNames = $products->pluck('product_name')->filter(function ($productName) use ($searchQuery) {
            $productName = mb_strtolower($productName, 'UTF-8');
            $searchQuery = mb_strtolower($searchQuery, 'UTF-8');
            $productName = Normalizer::normalize($productName, Normalizer::FORM_D);
            $searchQuery = Normalizer::normalize($searchQuery, Normalizer::FORM_D);
            return mb_stripos($productName, $searchQuery) !== false;
        });

        return view('admin.allproducts', compact('products', 'matchingProductNames', 'product'));
    }
}
