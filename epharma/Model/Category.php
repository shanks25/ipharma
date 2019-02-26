<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{

	protected $table = 'terms';

	protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('type', function (Builder $builder) {
            $builder->where('type', 'category');
        });
    }


    public function products()
    {
        return $this->belongsToMany('Epharma\Model\Product', 'product_term', 'term_id')->orderBy('name', 'ASC');
    }

    public function parent()
    {
        return $this->belongsTo($this,'parent');
    }

    public function childs() 
    { 
        return $this->hasMany($this,'parent'); 
    }

    public function media()
    {
        return $this->morphMany('Epharma\Model\Media', 'mediable');
    }

}
