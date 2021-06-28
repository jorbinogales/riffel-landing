<?php

namespace App\Http\Requests\Lawyer;

use Illuminate\Foundation\Http\FormRequest;

class RewardsRequest extends FormRequest
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
            'unid' => 'required|numeric|min:1|max:5',
            'lawyer_id' => 'required|exists:lawyers,id',
        ];
    }

    public function attributes()
    {
        return [
            'unid' => 'valorazion',
            'laywer_id' => 'abogado',
        ];
    }
}
