<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectingDealRequest extends FormRequest
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
        $id =  $this->collecting_deal ?? 'NULL';

        return [
        	'trader_id' => ['required', 'exists:traders,id'],
            'container_id' => ['required', "exists:container_traders,container_id,trader_id,$this->trader_id"],
            'container_indebtedness_before' => [
            	'required',
            	'integer',
            	'min:0', 
            	"exists:container_traders,container_indebtedness,container_id,$this->container_id,trader_id,$this->trader_id"
            ],
            'container_count' => ['required', 'integer', 'min:0', 'lte:container_indebtedness_before'],
            'container_indebtedness_after' => [
            	'required',
            	'integer',
            	'min:0',
            	'in:' . ($this->container_indebtedness_before - $this->container_count)
            ],
            'money_indebtedness_before' => [
            	'required',
            	'numeric',
            	'min:0',
            	"exists:traders,money_indebtedness,id,$this->trader_id"
            ],
            'paid' => ['required', 'numeric', 'min:0','lte:money_indebtedness_before'],
            'money_indebtedness_after' => [
            	'required',
            	'numeric',
            	'min:0',
            	'in:' . ($this->money_indebtedness_before - $this->paid)
            ],
        ];
    }
}
