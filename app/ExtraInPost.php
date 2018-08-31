<?php

namespace Absltcast;

use Illuminate\Database\Eloquent\Model;

class ExtraInPost extends Model
{
    //
    protected $guarded = [];

    public function posts()
    {
    	return $this->belongsTo(post::class);
    }
}
