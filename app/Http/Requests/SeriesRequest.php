<?php

namespace Absltcast\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
{
    

    public function uploadSeriesImage()
    {

        //upload file
        $uploadedImg = $this->image;

        $this->filename = str_slug($this->title) . "." . $uploadedImg->getClientOriginalExtension();

        $uploadedImg->storePubliclyAs('public/series', $this->filename);

        return $this;
    }
}
