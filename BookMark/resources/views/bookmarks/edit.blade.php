@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ブックマーク編集</div>

                <div class="card-body">
                    {{-- この位置(レコードテーブルの上)に表示させたいのでここにインクルード --}}
                    @include('components.alert')
                    {{-- actionにはbookmarks updateのルートを指定する 第二引数に$bookmark変数を取る--}}
                    <form method="POST" action="{{ route('bookmarks.update',$bookmark) }}">
                        {{-- editの場合はPUTを使うので下記のように記述する --}}
                        @method('PUT')
                        {{-- Laravelは標準でCSRFのチェック機能があるので、フォームを書く際は@csrfを書く--}}
                        @csrf
                        @include('bookmarks.fields')
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
