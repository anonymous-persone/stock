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
        return [
            'seller_name' => ['required', 'string', 'max:255'],
            'container_id' => ['required', 'exists:containers,id'],
            'content_id' => ['required', 'exists:contents,id'],
            'total_containers' => ['required', 'integer', 'min:0'],
            'remaining_containers' => ['required', 'integer', 'min:0', 'lte:total_containers'],
        ];
    }
}
