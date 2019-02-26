<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocode extends Model
{
     protected $fillable = [
        'promo_code',
        'promocode_type',
        'expiration',
        'status',
        'discount'
    ];
     protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];


public static function findByCode($code)
{

    return self::where('code',$code)->first();

}

public function discount($total)
{
    if($this->promocode_type=='amount')

    {
       return $this->discount; 
    }

    elseif($this->type=='percent')
    {
        return($this->discount/100)* $total;
    }
    else{
            return 0;
            }

}


}
