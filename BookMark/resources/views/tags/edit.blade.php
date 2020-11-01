@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">タグ編集</div>

                <div class="card-body">
                    {{-- この位置(レコードテーブルの上)に表示させたいのでここにインクルード --}}
                    @include('components.alert')
                    {{-- actionにはtags updateのルートを指定する 第二引数に$tag変数を取る--}}
                    <form method="POST" action="{{ route('tags.update',$tag) }}">
                        {{-- editの場合はPUTを使うので下記のように記述する --}}
                        @method('PUT')
                        {{-- Laravelは標準でCSRFのチェック機能があるので、フォームを書く際は@csrfを書く--}}
                        @csrf
                        @include('tags.fields')
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
