<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TraderRequest extends FormRequest
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
        // check if update request or store request
        $id =  $this->trader ?? 'NULL';

        return [
            'region_id' => ['required', 'exists:regions,id'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits:11', "unique:traders,phone,$id,id"],
            'money_indebtedness' => ['required', 'numeric', 'min:0'/*, 'regex:/^\d+(\.\d{1,2})?$/', 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'*/], 
            'boxes_indebtedness' => ['required', 'integer', 'min:0'],
        ];
    }
}
