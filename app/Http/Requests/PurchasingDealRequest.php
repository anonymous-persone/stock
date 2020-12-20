<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchasingDealRequest extends FormRequest
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
        // dd($this->all());
        return [
            'data' => ['required', 'array'],
            'data.*.seller_name' => ['required', 'string', 'max:255'],
            'data.*.container_id' => ['required', 'exists:containers,id'],
            'data.*.content_id' => ['required', 'exists:contents,id'],
            'data.*.total_containers' => ['required', 'integer', 'min:0'],
            'data.*.remaining_containers' => ['required', 'integer', 'min:0', 'lte:data.*.total_containers'],
        ];
    }
}
