<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookmarkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //titleとurlは入力必須なのでrequiredに指定
            //パイプラインでつなぐことにより複数のバリデーション設定が可能、urlは書式チェック
            'title' => 'required|max:100',
            'url' => 'required|max:200|url',
            'description' => 'max:500',
        ];
    }
}
