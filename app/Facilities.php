<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    protected $table = 'facilities';
    protected $fillable = [
        'facilities_id', 
        'is_refrigerator', 
        'is_furniture', 
        'is_tv', 
        'is_bathroom', 
        'is_internet',
        'is_kitchen', 
        'is_balcony', 
    ];
    
    protected $primaryKey = 'facilities_id';
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ]; 

    public function building()
    {
        return $this->belongsTo('App\Building');
    }
}
