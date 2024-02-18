<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservationRequest extends FormRequest
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
            'date' => ['required','date','after:yesterday', Rule::unique('reservations', 'date')->where('user_id', $this->input('user_id'))->where('store_id', $this->input('store_id'))->where('time_id', $this->input('time_id'))],
            'time_id' => 'required',
            'num_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '予約日付を入力してください',
            'date.date' => '日付を入力してください',
            'date.after' => '予約日は本日以降の日付を指定してください',
            'date.unique' => '予約済です',
            'time_id.required' => '予約時間を選択してください',
            'num_id.required' => '予約人数を選択してください',
        ];
    }
}
