<?php

namespace Absltcast\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CreateEditRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'video_id' => 'required',
            'episode_number' => 'required'
        ];
    }
}
