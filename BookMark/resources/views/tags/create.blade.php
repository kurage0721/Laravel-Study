@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">タグ登録</div>

                <div class="card-body">
                    {{-- この位置(レコードテーブルの上)に表示させたいのでここにインクルード --}}
                    @include('components.alert')
                    {{-- actionにはtags storeのルートを指定する --}}
                    <form method="POST" action="{{ route('tags.store') }}">
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
