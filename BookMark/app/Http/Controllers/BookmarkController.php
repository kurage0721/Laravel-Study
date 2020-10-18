<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Bookmark::all());
        //id, descで降順に表示されるよう設定
        $bookmarks = Bookmark::orderby('id', 'desc')->paginate(20);

        return view('bookmarks.index', compact('bookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookmarks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //レコードを新たに登録するにはモデルのcreateメソッドを記述
        //引数に$request->all()を使用することにより、フォームで入力した値を取り出すことができる。
        //ただし、$request->all()はすべてのリクエストを取得して更新してしまうため、想定していない値まで更新してしまう場合があるので、
        //指定した値だけ更新する場合はModelに$fillableを設定する→Bookmark.php
        Bookmark::create($request->all());
        //保存処理が終わったら一覧ページにリダイレクトする処理
        return redirect()->route('bookmarks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmark $bookmark)
    {

        return view('bookmarks.show', compact('bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookmark $bookmark)
    {
        //viewを表示するメソッドになる、レコードを編集するのでbookmark変数をそのまま渡す
        return view('bookmarks.edit', compact('bookmark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookmark $bookmark)
    {
        
        //レコードを新たに登録するにはモデルのupdateメソッドを記述
        $bookmark->update($request->all());
        //保存処理が終わったらそのまま編集ページにリダイレクトする処理
        return redirect()->route('bookmarks.edit', $bookmark);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        //
    }
}
