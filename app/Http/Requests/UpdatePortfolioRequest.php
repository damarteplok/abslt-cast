<?php

namespace Absltcast\Http\Requests;

use Absltcast\Portfolio;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioRequest extends FormRequest
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
            'title' => 'required',
            'detail' => 'required',
            'date' => 'required',
            'skill' => 'required',
            'address' => 'required',
            'client' => 'required'
        ];
    }
    public function updatePortfolio($id)
    {
        $p = Portfolio::find($id);

        if($this->hasFile('featured'))
        {
            $img = $this->featured;
            $img_new_name = time() . $img->getClientOriginalName();
            $img->move(storage_path('app/public/portfolios/'), $img_new_name);
            $p->featured = 'portfolios/' . $img_new_name;
        }

        $p->title = $this->title;
        $p->detail = $this->detail;
        $p->date = $this->date;
        $p->skill = $this->skill;
        $p->address = $this->address;
        $p->client = $this->client;
        $p->save();

        return redirect()->route('portfolio.index');
    }
}
