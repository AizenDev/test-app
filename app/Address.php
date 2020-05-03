<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    protected $table = 'address';
    protected $fillable = [
        'address_id', 'city', 'street', 'flat', 'ln', 'lg',
    ];
    protected $primaryKey = 'address_id';
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ]; 

    public function building()
    {
        return $this->belongsTo('App\Building');
    }
}
