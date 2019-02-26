<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Area extends Model
{
	use Notifiable;

	protected $table = 'upazilas';
}
