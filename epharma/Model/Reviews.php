<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reviews extends Model {

    use Notifiable;

    protected $table = 'review_rating';

    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function product() {
        return $this->belongsTo('Epharma\Model\Product');
    }

}
