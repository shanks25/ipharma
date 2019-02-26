<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DeliveryTime extends Model
{
	use Notifiable;

	protected $table = 'delivery_time';
}
