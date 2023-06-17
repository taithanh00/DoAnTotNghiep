<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\News_Detail;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brands;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function Index()
    {
        $news = DB::table('news')->select('*');
        $news = $news->get();
        return view('admin.allnews', compact('news'));
    }
    public function EditNews()
    {
        $categories = category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.editnews', compact('categories', 'subcategories', 'brands'));
    }
    public function StoreNews(Request $request)
    {
        // dd($request->category_id);
        $news = new News;
        $news->categories_id = $request->category_id;
        $news->subcategories_id = $request->sub_category_id;
        $news->brands_id = $request->brands_id;
        $news->save();
        return redirect()->route('allnews')->with('message', 'News Added Successfully');
    }
    public function Edit2News($id)
    {
        $news_info = News::findOrFail($id);
        $categories = category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.edit2news', compact('news_info', 'categories', 'subcategories', 'brands'));
    }
    public function UpdateNews(Request $request)
    {
        $news = News::find($request->input('news_id'));
        $request->validate([
            'category_id' => '',
            'sub_category_id' => '',
            'brands_id' => ''

        ]);
        $news->categories_id = $request->input('category_id');
        $news->subcategories_id = $request->input('sub_category_id');
        $news->brands_id = $request->input('brands_id');
        $news->save();
        return redirect()->route('allnews')->with('message', 'News Updated Successfully');
    }
    public function DeleteNews($id)
    {
        News::findOrFail($id)->delete();
        return redirect()->route('allnews')->with('message', 'News Deleted Successfully');
    }
}
