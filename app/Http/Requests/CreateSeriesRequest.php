<?php

namespace Absltcast\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Absltcast\Series;

class CreateSeriesRequest extends FormRequest
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
            'image' => 'required|image',

        ];
    }

    public function uploadSeriesImage()
    {

        //upload file
        $uploadedImg = $this->image;

        $this->filename = str_slug($this->title) . "." . $uploadedImg->getClientOriginalExtension();

        $uploadedImg->storePubliclyAs('series', $this->filename);

        return $this;
    }


    public function storeSeries()
    {

        //create serie
        $series = Series::create([

            'title' => $this->title,
            'description' => $this->description,
            'image_url' => 'series/' . $this->filename,
            'slug' => str_slug($this->title)

        ]);

        //redirect
        session()->flash('success', 'Series created succesfully');
        return redirect()->route('series.show', $series->slug);


    }
}
