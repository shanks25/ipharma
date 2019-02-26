<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProductInquiry extends Model
{
	use Notifiable;

	protected $table = 'product_request';
}
