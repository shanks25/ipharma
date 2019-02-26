<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function mediable()
    {
        return $this->morphTo();
    }
}
