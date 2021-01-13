<?php

namespace App\Http\Requests;

use App\Models\Content;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateContentRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'string',
            'type' => [
                'required',
                Rule::in(Content::TYPES),
            ],
            'slug' => 'string',
        ];
    }

    protected function prepareForValidation()
    {
        $landing = $this->route()->parameter('landing');
        $this->merge(['landing_id' => $landing->id]);
    }
}
