<?php

namespace App\Http\Requests\Admin\Goods;

use App\Http\Requests\Admin\Request;

class UpdateGoodsPostRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price'=>'required|between:0.1,999999',
            'stocks'=>'digitsbetween:0,999999',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '商品标题必须填写',
            'title.max' => '权限标题最多255个字符',
            'description.required' => '商品描述必须填写',
            'description.max' => '权限描述最多255个字符',
            'pic.required' => '商品图片必须选择',
            'price.required' => '商品价钱必须填写',
            'price.between' => '商品价钱必须在0.1-999999之间',
            'stocks.between' => '商品库存必须在0-999999之间',
        ];
    }
}
