<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'pictures';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'path', 'building_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ]; 

    public function building()
    {
       return $this->belongsTo('App\Building');
    }

}
