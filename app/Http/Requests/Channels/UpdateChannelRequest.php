<?php

namespace App\Http\Requests\Channels;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChannelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->channel->user_id === auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'max:200',
            'image' => 'image'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名称不能为空',
            'image.image' => '图片格式错误',
            'description.max' => '描述过长'
        ];
    }
}
