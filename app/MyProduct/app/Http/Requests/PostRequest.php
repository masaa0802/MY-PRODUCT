<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'video' =>'required',
            'git_url' => 'required|max:50',
            'title' => 'required|max:80',
            'body' => 'required|max:350',
        ];
    }

        /**
     * エラーメッセージを日本語化
     * 
     */
    public function messages()
    {
        return [
            'video.required' => '動画ファイルを選択してください',
            'git_url.required' => 'GitHubのURLを入力してください',
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルは80文字以内で入力してください',
            'body.required' => '説明を入力してください',
            'body.max' => '説明は350文字以内で入力してください',
        ];
    }
}
