<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class District extends Model
{
	use Notifiable;

	protected $table = 'district';
}
