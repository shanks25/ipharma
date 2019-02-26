<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;

class ProductAttrOptions extends Model {

    protected $table = 'product_eav';

    // protected $with = array('attribute');
    // protected $appends = array('attribute');


    public function attribute() {
        return $this->belongsTo('Epharma\Model\Attribute');
    }

    public function attributeValue() {
        return $this->belongsTo('Epharma\Model\AttributeOption', 'option_id');
    }
}
