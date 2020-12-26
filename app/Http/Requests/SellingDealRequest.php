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
            'container_id' => ['required', 'exists:purchasing_deals,container_id'],
            'content_id' => ['required', 'exists:contents,id'],
            'container_count' => ['required', 'integer', 'min:0', 'lte_DB_field:PurchasingDeal,remaining_containers'],
            'container_price' => ['required', 'numeric', 'min:0'],
            'container_kilos' => ['required', 'numeric', 'min:0'],
            'kilo_price' => ['required', 'numeric', 'min:0'],
            'total_containers_price' => ['required', 'numeric', 'min:0', 
                'in:' . ($this->container_count * $this->container_price) .','.
                        ($this->container_kilos * $this->kilo_price)
            ],
            'total_paid' => ['required', 'numeric', 'min:0', 'lte:total_containers_price'],
            'total_unpaid' => [
                'required',
                'numeric',
                'min:0', 
                'in:' . ($this->total_containers_price - $this->total_paid)
            ],
            'bets' => ['required', 'numeric', 'min:0'],
        ];
    }
}
