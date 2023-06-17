<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News_Detail;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsDetailController extends Controller
{
    public function Index()
    {
        $news_detail = DB::table('news_detail')->select('*');
        $news_detail = $news_detail->get();
        return view('admin.allnews_detail', compact('news_detail'));
    }
    public function EditNewsDetail()
    {
        $news = DB::table('news')->select('*');
        $news = $news->get();
        return view('admin.editnewsdetail', compact('news'));
    }
    public function StoreNewsDetail(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'news_id' => 'required',
            'date_news' => 'required'
        ]);
        News_Detail::insert([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'news_id' => $request->news_id,
            'date_news' => $request->date_news
        ]);
        return redirect()->route('allnewsdetail')->with('message', 'News Detail Added Successfully');
    }
    public function Edit2NewsDetail($id)
    {
        $news = DB::table('news')->select('*');
        $news = $news->get();
        $news_detail_info = News_Detail::findOrFail($id);
        return view('admin.edit2newsdetail', compact('news_detail_info', 'news'));
    }
    public function UpdateNewsDetail(Request $request)
    {
        $newsdetail = News_Detail::find($request->input('news_detail_info_id'));
        $request->validate([
            'title' => '',
            'content' => '',
            'image' => '',
            'news_id' => '',
            'date_news' => ''

        ]);
        $newsdetail->title = $request->input('title');
        $newsdetail->content = $request->input('content');
        $newsdetail->image = $request->input('image');
        $newsdetail->news_id = $request->input('news_id');
        $newsdetail->date_news = $request->input('date_news');
        $newsdetail->save();
        return redirect()->route('allnewsdetail')->with('message', 'News Detail Updated Successfully');
    }
    public function DeleteNewsDetail($id)
    {
        News::findOrFail($id)->delete();
        return redirect()->route('allnews')->with('message', 'News Deleted Successfully');
    }
}
