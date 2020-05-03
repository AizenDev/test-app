<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'building';
    protected $primaryKey = 'building_id';
    protected $fillable = [
        'building_id', 'description', 'price', 'address_id', 'facilities_id',
    ];
    protected $hidden = [
        'address_id',
        'facilities_id',
        'created_at',
        'updated_at',
    ]; 

    public function address()
    {
        return $this->hasOne('App\Address', 'address_id');
    }

    public function facilities()
    {
        return $this->hasOne('App\Facilities', 'facilities_id');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture', 'building_id');
    }

}
