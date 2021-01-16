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
            'slug' => 'nullable|string',
        ];
    }

    protected function prepareForValidation()
    {
        $landing = $this->route()->parameter('landing');
        $file_path = null;
        if ($this->has('file') && !empty($this->file('file'))) {
            $file_path = $this->file('file')->storePublicly('public/contents/files');
            $file_path = str_replace('public/', '', $file_path);
        }

        $thumbnail_path = null;
        if ($this->has('thumbnail') && !empty($this->file('thumbnail'))) {
            $thumbnail_path = $this->file('thumbnail')->storePublicly('public/contents/thumbnails');
            $thumbnail_path = str_replace('public/', '', $thumbnail_path);
        }

        $this->merge([
            'landing_id' => $landing->id,
            'file_path' => $file_path,
            'thumbnail_path' => $thumbnail_path
        ]);
    }
}
