<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;

class AttributeOption extends Model
{
    public function product()
    {
    	return $this->belongsToMany('Epharma\Model\Product');
    }
}
