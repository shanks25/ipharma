<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{

	protected $fillable = ['product_id', 'user_id'];

    public function product()
    {
        return $this->belongsTo('Epharma\Model\Product');
    }
}
