<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'name' => 'required|max:500',
            'slug' => 'required',
            'image' => 'mimetypes:image/jpeg,image/png|max:2048',
            'image2' => 'max:10048',
            'branch_id' => 'required',
            'cate_id' => 'required',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'competitive_price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'short_desc' => 'required',
        ];
    }
}
