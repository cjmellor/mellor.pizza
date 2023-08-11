<?php

namespace App\Http\Requests\Fos;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'excerpt' => [
                'required',
                'string',
                'max:255',
            ],
            'category_id' => [
                'required',
                'not_in:0',
            ],
            'tag_id' => [
                'required',
                'array',
            ],
            'post_content' => [
                'required',
            ],
            'post_image' => [
                'file',
                'max:3072',
                'mimes:jpg,jpeg,webp,png,avif',
            ], // 3 MB
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A Post needs a title',
            'title.max' => 'A Post title can\'t exceed 255 characters',
            'excerpt.required' => 'You need to write an excerpt',
            'excerpt.max' => 'The excerpt can\'t exceed 255 characters',
            'category_id.required' => 'You have\'t chosen a category',
            'tag_id.required' => 'You need to add some tags',
            'post_content.required' => 'A Post needs content',
            'post_image.image' => 'This must be an image file (jpg, jpeg, webp, png, avif)',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
