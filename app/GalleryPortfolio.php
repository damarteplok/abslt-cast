<?php

namespace Absltcast;

use Illuminate\Database\Eloquent\Model;

class GalleryPortfolio extends Model
{
    //
    protected $guarded = [];

    public function portfolio()
    {
    	return $this->belongsTo(Portfolio::class);
    }
}
