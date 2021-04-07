<?php

namespace App\Http\Requests\Fos;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'category_id' => 'required|not_in:0',
            'tag_id' => 'required|array',
            'post_content' => 'required|string',
            'post_image' => 'nullable|file|image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A Post needs a title',
            'title.max' => 'A Post title can\'t exceed 255 characters',
            'excerpt.required' => 'You need to write an excerpt',
            'excerpt.max' => 'The excerpt can\'t exceed 255 characters',
            'category_id.required' => 'You have\'t chosen a category',
            'tag_id.required' => 'You need to add some tags',
            'post_content.required' => 'A Post needs content',
            // TODO: add validation for missing options
        ];
    }

    public function authorize()
    {
        return true;
    }
}
