<?php

namespace Absltcast\Http\Requests;

use Absltcast\Series;

class CreateSeriesRequest extends SeriesRequest
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
