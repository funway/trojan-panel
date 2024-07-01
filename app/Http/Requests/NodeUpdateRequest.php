<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NodeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // 其实可以注释掉这个 authorize 方法，因为路由已经设置了 IsAdmin 中间件了
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'host' => ['required', 'string', 'max:255'],
            'port' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'port.integer' => 'The :attribute must be an integer.', // 自定义错误消息
        ];
    }
}
