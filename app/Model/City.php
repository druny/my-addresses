<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
    ];

    /*
     * Get the areas for the city
     *
     * */
    public function areas() {
        return $this->hasMany('App\Model\Area');
    }
    public function addresses() {
        return $this->hasOne('App\Model\Address');
    }
}
