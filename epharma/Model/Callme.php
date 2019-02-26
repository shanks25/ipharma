<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Callme extends Model
{
	use Notifiable;

	protected $table = 'callme';
}
