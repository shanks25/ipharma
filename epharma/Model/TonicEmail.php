<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TonicEmail extends Model {

    use Notifiable;

    protected $table = 'tonic_email';
}
