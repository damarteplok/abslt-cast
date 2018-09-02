<?php

namespace Absltcast\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Absltcast\tag;
use Absltcast\post;
use Absltcast\category;
use Auth;
use Image;


class UpdatePostRequest extends FormRequest
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
            'category_id' => 'required',
        ];
    }

    public function updatePost($id)
    {
        if($this->get('image_url'))
       
       {
          $image = $this->get('image_url');
          $name = time() . '-' . str_slug($this->title).'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

          Image::make($this->get('image_url'))->save(storage_path('app/public/series/').$name);
          $image= post::find($id);

          $image->image_url = $name;
         
          $image->save();  
        }

       
       $image= post::find($id);
       
       $image->title = $this->title;
       $image->category_id = $this->category_id;
       $image->user_id = Auth::id();
       $image->description = $this->description;
       $image->slug = str_slug($this->title);
       

       $image->save();

        
       $image->tags()->sync($this->tag);

       return $image;
    }
}
