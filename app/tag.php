<?php

namespace App;
use Epharma\Model\Product;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
 public $timestamps = false;


  public function products()
{

return $this->belongsToMany(Product::class,'product_tags');


}


}

