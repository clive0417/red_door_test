<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $post = request()->post;/*$post 變數等於 request 傳來資訊 就是文章 */
        if(!isset($post)) {
            return true;
        }

        if($post->user_id === Auth::id()) {/*post 文章的user id 是不是全等於 登入者(Auth)的id*/
            return true;

        } else {
            return false;
        }


    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

                'title'=>'required|max:255',
                'content'=>'required',

            //
        ];
    }
}
