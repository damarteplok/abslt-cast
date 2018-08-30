<?php

namespace Absltcast;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $guarded = [];
    
        

    public function categories()
    {
    	return $this->belongsTo(category::class, 'category_id');
    }

    public function tags()
    {
    	return $this->belongsToMany(tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
