<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlecategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 権限バリデーション　
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => 'required|string|max:255',
        ];
    }
    
    /**
     * エラーメッセージ
     */
    public function messages()
    {
        return [
            'category.required' => 'カテゴリーを入力してください',
            'category.string' => 'カテゴリーは文字列で入力してください',
            'category.max' => 'カテゴリーは255文字以内で入力してください',
        ];
    }
}
