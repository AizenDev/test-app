<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Address;
use App\Building;

class RController extends BaseController
{
    public function getAllBuildings() 
    {
        $building = Building::with('address')->get();
        return $building->toJson();
    }
    
    public function getByCity(Request $req) 
    {
        $value = $req->query('city');
        $addressses = Address::where('city', $value)->get();

        $res = [];
        $ids = []; 

        foreach ($addressses as $fl) {
            array_push($ids, $fl->address_id);
        }

        foreach ($ids as $ad){
            $fl = Building::where('address_id', $ad)->get();
            $add = Address::where('address_id', $ad)->get();
            array_push($res, [ 'building' => ['main'=> $fl, 'address'=> $add] ]);
        } 
       
        return json_encode($res);
    }
}

