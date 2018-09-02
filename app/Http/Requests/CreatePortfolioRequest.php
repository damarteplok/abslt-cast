<?php

namespace Absltcast\Http\Requests;

use Absltcast\Portfolio;
use Illuminate\Foundation\Http\FormRequest;

class CreatePortfolioRequest extends FormRequest
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
            'featured' => 'required|image|mimes:jpg,jpeg,bmp,png|max:2000',
            'detail' => 'required',
            'date' => 'required',
            'skill' => 'required',
            'address' => 'required',
            'client' => 'required'
        ];
    }
    public function storePortfolio()
    {
        $featured = $this->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move(storage_path('app/public/portfolios/'), $featured_new_name);
        $p = Portfolio::create([
            'title' => $this->title,
            'featured' => 'portfolios/' . $featured_new_name,
            'detail' => $this->detail,
            'date' => $this->date,
            'skill' => $this->skill,
            'address' => $this->address,
            'client' => $this->client,
            'slug' => str_slug($this->title)
        ]);
        return redirect()->route('portfolio.index');
    }
}
