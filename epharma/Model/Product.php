<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public function terms() {
        return $this->belongsToMany('Epharma\Model\Term');
    }

    public function categories() {
        return $this->belongsToMany('Epharma\Model\Term')->where('type', 'category')->select('id', 'name', 'slug');
    }

    public function tags() {
        return $this->belongsToMany('Epharma\Model\Term')->where('type', 'tag');
    }

    public function media() {
        return $this->morphMany('Epharma\Model\Media', 'mediable');
    }

    public function attribute() {
        return $this->hasMany('Epharma\Model\ProductAttr');
    }

    public function attr() {
        return $this->belongsToMany('Epharma\Model\AttributeValue');
    }

    public function brandattrOptions() {
        return $this->hasOne('Epharma\Model\ProductAttr')->where('attribute_id', 2);
    }
    public function genericAttrOptions() {
        return $this->hasOne('Epharma\Model\ProductAttr')->where('attribute_id', 1);
    }
    public function typeAttrOptions() {
        return $this->hasOne('Epharma\Model\ProductAttr')->where('attribute_id', 3);
    }
    public function packAttrOptions() {
        return $this->hasOne('Epharma\Model\ProductAttr')->where('attribute_id', 4);
    }

  

}
