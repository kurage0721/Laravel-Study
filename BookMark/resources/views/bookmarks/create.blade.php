@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ブックマーク登録</div>

                <div class="card-body">
                    {{-- actionにはbookmarks storeのルートを指定する --}}
                    <form method="POST" action="{{ route('bookmarks.store') }}">
                        {{-- Laravelは標準でCSRFのチェック機能があるので、フォームを書く際は@csrfを書く--}}
                        @csrf
                        <div class="form-group row">
                            <label for="inputTitle" class="col-sm-2 col-form-label">タイトル</label>
                            <div class="col-sm-10">
                              <input type="text" name="title" class="form-control" id="inputTitle" placeholder="タイトルを入力">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputUrl" class="col-sm-2 col-form-label">タイトル</label>
                            <div class="col-sm-10">
                              <input type="text" name="url" class="form-control" id="inputUrl" placeholder="URLを入力">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputDescription" class="col-sm-2 col-form-label">説明文</label>
                            <div class="col-sm-10">
                              <input type="text" name="description" class="form-control" id="inputDescription" placeholder="説明文を入力">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">保存</button>
                                <a href="{{ route('bookmarks.index') }}" class="btn btn-secondary">一覧へ戻る</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
