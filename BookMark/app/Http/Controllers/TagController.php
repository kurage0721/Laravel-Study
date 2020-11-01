<?php

namespace App\Http\Controllers;

use App\Models\Tag;
//use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;

class TagController extends Controller
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
        $tags = Tag::orderby('id', 'desc')->paginate(20);

        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        //レコードを新たに登録するにはモデルのcreateメソッドを記述
        //引数に$request->all()を使用することにより、フォームで入力した値を取り出すことができる。
        //ただし、$request->all()はすべてのリクエストを取得して更新してしまうため、想定していない値まで更新してしまう場合があるので、
        //指定した値だけ更新する場合はModelに$fillableを設定する→Tag.php
        Tag::create($request->all());
        //保存処理が終わったら一覧ページにリダイレクトする処理
        return redirect()
        ->route('tags.index')
        //フラッシュメッセージを追加 第一引数には任意のセッション名 第二引数には実際に表示する文字列
        ->with('status','タグを登録しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $bookmarks = $tag->bookmarks()->paginate(20);
        return view('tags.show', compact('tag','bookmarks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //viewを表示するメソッドになる、レコードを編集するのでtag変数をそのまま渡す
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        
        //レコードを新たに登録するにはモデルのupdateメソッドを記述
        $tag->update($request->all());
        //保存処理が終わったらそのまま編集ページにリダイレクトする処理
        return redirect()
        ->route('tags.edit', $tag)
        //フラッシュメッセージを追加 第一引数には任意のセッション名 第二引数には実際に表示する文字列
        ->with('status','タグを更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //削除機能はModelのdeleteメソッドを使う
        $tag->delete();
        $tag->bookmarks()->detach();
        //処理完了したら一覧ページにリダイレクト
        return redirect()
        ->route('tags.index')
        //フラッシュメッセージを追加 第一引数には任意のセッション名 第二引数には実際に表示する文字列
        ->with('status','タグを削除しました。');
    }
}
