<div class="form-group row">
    <label for="inputTitle" class="col-sm-2 col-form-label">タグのタイトル</label>
    <div class="col-sm-10">
        {{-- editの場合は取得したレコードの値を表示するので、valueに変数を指定する 二項演算子を使用し、変数がなかった場合は空文字を表示する。--}}
        <input type="text" name="title" value="{{  $tag->title ?? '' }}" class="form-control @error('title') is-invalid @enderror" id="inputTitle" placeholder="タイトルを入力">
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        <a href="{{ route('tags.index') }}" class="btn btn-secondary">一覧へ戻る</a>
    </div>
</div>