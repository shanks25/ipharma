<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function options()
    {
    	return $this->hasMany('Epharma\Model\AttributeOption');
    }

    public function eav()
    {
    	return $this->hasMany('Epharma\Model\ProductAttr');
    }
}
