<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;

class ProductV extends Model
{
    
    protected $table = 'products_v';
    
    public function terms()
    {
        return $this->belongsToMany('Epharma\Model\Term');
    }

    public function categories()
    {
        return $this->belongsToMany('Epharma\Model\Term')->where('type', 'category')->select('id', 'name', 'slug');
    }

    public function tags()
    {
        return $this->belongsToMany('Epharma\Model\Term')->where('type', 'tag');
    }

    public function media()
    {
        return $this->morphMany('Epharma\Model\Media', 'mediable');
    }

    public function attribute()
    {
        return $this->hasMany('Epharma\Model\ProductAttr');
    }

    public function attr()
    {
        return $this->belongsToMany('Epharma\Model\AttributeValue');
    }
    
    public function brandattrOptions()
    {
        return $this->hasOne('Epharma\Model\ProductAttr')->where('attribute_id', 2);
    }
}
