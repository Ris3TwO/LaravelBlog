<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'display_name' => 'required'
        ];

        if($this->method() !== 'PUT')
        {
            $rules['name'] = 'required|unique:roles';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El identificador del rol es obligatorio',
            'name.unique' => 'El identificador ya se encuentra registrado',
            'display_name.required' => 'El nombre del rol es obligatorio'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
