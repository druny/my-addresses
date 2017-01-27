<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = [
        'name', 'city', 'area', 'street', 'house', 'description'
    ];

    public function scopeId($query, $id) {
        return $query->where('id', $id);
    }
    public function cities() {
        return $this->belongsTo('App\Model\City');
    }
}
