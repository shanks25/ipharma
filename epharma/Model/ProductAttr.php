<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;

class ProductAttr extends Model {

    protected $table = 'product_eav';

    // protected $with = array('attribute');
    // protected $appends = array('attribute');


    public function attribute() {
        return $this->belongsTo('Epharma\Model\Attribute');
    }

    public function attributeValue() {
        return $this->belongsTo('Epharma\Model\AttributeOption', 'option_id');
    }

    public function products() {
        return $this->hasOne('Epharma\Model\Product', 'id', 'product_id')
                ->where('products.is_available', 1)
                ->where('products.delete_status', 0);
    }

}
