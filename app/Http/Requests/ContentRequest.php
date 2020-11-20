<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
        $id =  $this->content ?? 'NULL';
        
        return [
            'title_en' => ['required', 'string', "unique:contents,title_en,$id,id,title_ar,$this->title_ar"],
            'title_ar' => ['required', 'string', "unique:contents,title_ar,$id,id,title_en,$this->title_en"],
        ];
    }
}
