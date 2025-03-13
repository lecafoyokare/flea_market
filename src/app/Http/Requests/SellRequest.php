<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'item_condition' => ['required'],
            'item_name' => ['required'],
            'item_description' => ['required'],
            'item_price' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'item_condition.required' => '※商品の状態を選択してください',
            'item_name.required' => '※商品名を入力してください',
            'item_description.required' => '※商品の説明を入力してください',
            'item_price.required' => '※販売価格を入力してください',
        ];
    }
}
