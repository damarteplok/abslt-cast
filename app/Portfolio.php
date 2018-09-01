<?php

namespace Absltcast;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    protected $guarded = [];

    public function galleries()
    {
    	return $this->hasMany(GalleryPortfolio::class);
    }
}
