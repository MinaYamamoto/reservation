<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'required|max:50',
            'genre_id' => 'required',
            'region_id' => 'required',
            'overview' => 'required|max:400',
            'thumbnail' => 'required|mimes:jpeg,png|max:10240'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '店舗名を入力してください',
            'name.max' => '店舗名は50文字以内で入力してください',
            'genre_id.required' => 'ジャンルを選択してください',
            'region_id.required' => '地域を選択してください',
            'overview.required' => '店舗概要を入力してください',
            'overview.max' => '店舗概要は400文字以内で入力してください',
            'thumbnail.required' => 'ファイルを選択してください',
            'thumbnail.mimes' => '画像ファイル(jpeg,png)を選択してください',
            'thumbnail.max' => '10M以下の画像ファイルを選択してください',
        ];
    }
}
