<?php

namespace Epharma\Model;

use Epharma\Model\Product;
use Epharma\Model\Term;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    
}
