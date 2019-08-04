<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
use App\News;

class NewsController extends Controller
{
    // NewsControllerにaddというActionを実装
    public function add()
    {
        return view('admin.news.create');
    }
    
    //以下を追加
    public function create(Request $request){
        
        // 以下を追記
        // Varidationを行う
        $this->validate($request, News::$rules);

        $news = new News;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $news->fill($form);
        $news->save();

        //admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }

    public function index(Request $request)
    {
        // 最初に開いた段階では、cond_titleは存在しない
        $cond_title = $request->cond_title;
        if ($cond_title != ''){
            //検索されたら結果を取得する
            $posts = News::where('title', $cond_title)->get();
        } else {
            //それ以外の全てのニュースを取得する
            $posts = News::all();
        }
        return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}






