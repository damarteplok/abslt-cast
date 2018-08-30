<?php

namespace Absltcast;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $guarded = [];
    
        

    public function categories()
    {
    	return $this->belongsTo(category::class);
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
