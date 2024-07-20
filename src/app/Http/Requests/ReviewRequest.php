<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReviewRequest extends FormRequest
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
            'user_id' => [
                Rule::unique('reviews')->ignore($this->input('id'))->where(function($query) {
                    $query->where('store_id', $this->input('store_id'));
                }),
            ],
            'star' => 'required',
            'comment' => 'required|max:400',
            'image' => 'mimes:jpeg,png|max:10240'
        ];
    }
    public function messages()
    {
        return [
            'user_id.unique' => '同じ店舗に対して既にレビューを投稿しています。',
            'star.required' => '評価を５段階で選択してください',
            'comment.required' => 'コメントを入力してください',
            'comment.max' => 'コメントは400文字以内で入力してください',
            'image.mimes' => '画像ファイル(jpeg,png)を選択してください',
            'image.max' => '10M以下の画像ファイルを選択してください',
        ];
    }
}
