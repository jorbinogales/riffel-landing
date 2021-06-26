<?php

namespace App\Http\Requests\Skill;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'lawyer_id' => 'required|exists:lawyers,id',
            'list_skill_id' => 'required|exists:list_skills,id',
        ];
    }

    public function attributes()
    {
        return [
            'lawyer_id' => 'id del abogado',
            'list_skill_id' => 'id del skill',
        ];
    }
}
