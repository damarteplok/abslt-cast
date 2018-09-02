<?php

namespace Absltcast\Http\Requests;


use Image;
use Absltcast\post;
use Absltcast\tag;
use Absltcast\category;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'description' => 'required',
            'category_id' => 'required',
            'tag' => 'required',
            'image_url' => 'required'
        ];
    }

    public function storePost()
    {
        if($this->get('image_url'))
       {
          $image = $this->get('image_url');
          $name = time() . '-' . str_slug($this->title).'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          Image::make($this->get('image_url'))->save(storage_path('app/public/series/').$name);
        }

       
       $image= new post();
       $image->image_url = $name;
       $image->title = $this->title;
       $image->category_id = $this->category_id;
       $image->user_id = Auth::id();
       $image->description = $this->description;
       $image->slug = str_slug($this->title);
       

       $image->save();

        
       $image->tags()->attach($this->tag);

       return $image;
    }

}
