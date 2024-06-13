<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'body' => 'sometimes|string',
            'user_id' => 'sometimes|exists:users,id',
            'slug' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('blog_posts')->ignore($this->route('blog_post')),
            ],
            'excerpt' => 'nullable|string',
            'is_published' => 'boolean',
        ];
    }
}
