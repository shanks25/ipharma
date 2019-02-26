<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Address extends Model {

    use Notifiable;

    protected $table = 'address';

    public function zilla() {
        return $this->belongsTo('Epharma\Model\District', 'district', 'id');
    }
    
    public function upazilla() {
        return $this->belongsTo('Epharma\Model\Area', 'area');
    }

}
