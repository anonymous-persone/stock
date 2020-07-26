<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellingDealRequest extends FormRequest
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
            'trader_id' => ['required', 'exists:traders,id'],
            'boxes_count' => ['required', 'integer', 'min:0'],
            'boxe_price' => ['required', 'numeric', 'min:0'],
            'total_paid' => ['required', 'numeric', 'min:0'],
            'bets' => ['required', 'numeric', 'min:0'],
        ];
    }
}
