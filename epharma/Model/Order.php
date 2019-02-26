<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    
    use Notifiable;
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function items()
    {
        return $this->hasMany('Epharma\Model\OrderItems');
    }

    public function billingAttr()
    {
    	return $this->belongsTo('Epharma\Model\Address', 'billing_id');
    }

    public function shippingAttr()
    {
        return $this->belongsTo('Epharma\Model\Address', 'shipping_id');
    }
    
    public function payment()
    {
        return $this->belongsTo('Epharma\Model\Payment', 'id', 'order_id');
    }
    
}
