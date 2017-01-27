<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name', 'city_id',
    ];

    /*
     * Get the city that owns the area
     *
     * */
    public function cities() {
        return $this->belongsTo('App\Model\City');
    }
}
