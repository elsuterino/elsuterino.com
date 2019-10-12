<?php

namespace App\Http\Requests;

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
            'skill_group_id' => 'required|exists:skill_groups,id',
            'title' => 'required|max:255',
            'order' => 'integer|nullable',
            'stars' => 'required|integer|min:0|max:5',
            'icon' => 'required|array'
        ];
    }
}
