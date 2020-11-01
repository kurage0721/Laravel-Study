<div class="form-group row">
    <label for="inputTitle" class="col-sm-2 col-form-label">タイトル</label>
    <div class="col-sm-10">
        {{-- editの場合は取得したレコードの値を表示するので、valueに変数を指定する 二項演算子を使用し、変数がなかった場合は空文字を表示する。--}}
        <input type="text" name="title" value="{{  $bookmark->title ?? '' }}" class="form-control @error('title') is-invalid @enderror" id="inputTitle" placeholder="タイトルを入力">
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="inputUrl" class="col-sm-2 col-form-label">URL</label>
    <div class="col-sm-10">
        <input type="text" name="url" value="{{  $bookmark->url ?? '' }}" class="form-control @error('url') is-invalid @enderror" id="inputUrl" placeholder="URLを入力">
        @error('url')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="inputDescription" class="col-sm-2 col-form-label">説明文</label>
    <div class="col-sm-10">
        <textarea type="text" name="description" class="form-control  @error('description') is-invalid @enderror" id="inputDescription" rows="5">{{  $bookmark->description ?? '' }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="inputTag" class="col-sm-2 col-form-label">タグ</label>
    <div class="col-sm-10">
        @foreach ($tags as $key => $tag)
            <div class="form-check form-check-inline">
                <input 
                type="checkbox"
                name="tags[]"
                value="{{ $key }}"
                id="tag{{ $key }}"
                {{-- collectionのcontainsは引数に$keyが含まれる場合trueを返す --}}
                @if (isset($bookmark->tags) && $bookmark->tags->contains($key))
                    checked
                @endif
                >
                <label for="tag{{$key}}" class="form-check-label">{{$tag}}</label>
            </div>
        @endforeach
        @error('tags')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        <a href="{{ route('bookmarks.index') }}" class="btn btn-secondary">一覧へ戻る</a>
    </div>
</div>