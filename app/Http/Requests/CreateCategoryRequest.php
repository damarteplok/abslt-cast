<?php

namespace Absltcast\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Absltcast\category;

class CreateCategoryRequest extends FormRequest
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
            //
            'title' => 'required'
        ];
    }

    public function storeCategory()
    {
        $categories = category::create([

            'title' => $this->title,
            'slug' => str_slug($this->title)

        ]);
        return $categories;
    }

}
