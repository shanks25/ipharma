<?php

namespace Epharma\Model;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['key', 'value'];

    public function scopeValueOf($query, $key)
    {
        return $query->where('key', $key)->get();
    }
}
