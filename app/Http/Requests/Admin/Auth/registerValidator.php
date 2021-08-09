<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class registerValidator extends FormRequest
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
            'name' => 'required|max:100|min:4',
            'email' =>  'required|email|unique:users,email',
            'password' => 'required|max:100|min:4',
    
        ];
    }
    public function messages() {
        return [
            'required' => ':attribute không được để trống',
            'name.max' => 'tên người dùng không quá 100 ký tự!',
            'name.min' => 'tên người dùng  ít nhất 4 ký tự!',
            'email.email' => 'Sai định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.max' => 'mập khẩu  không quá 100 ký tự!',
            'password.min' => 'mập khẩu  ít nhất 4 ký tự!',
            
        ];
    }
    public function attributes() {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
        ];
    }
}
