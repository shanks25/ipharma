<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model {

    protected $table = 'order_products';
    
    public function product(){
        return $this->belongsTo('Epharma\Model\Product');
    }

    public function media() {
        return $this->morphMany('Epharma\Model\Media', 'mediable');
    }

}
