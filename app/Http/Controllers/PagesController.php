<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Routing\Controller as BaseController;


use App\Building;
use App\Facilities;
use App\Picture;
use Illuminate\Http\Request;

class PagesController extends BaseController
{
    public function adminPage() 
    {
        return view('pages.admin');
    }

    public function homePage()
    {
        $buildings = Building::with(['address', 'facilities'])->get();
        $res = []; 
        foreach ($buildings as $build) {    
            
                array_push($res, [
                    'building'=> $build, 
                    'address'=> $build->address, 
                    'facilities' => $build->facilities, 
                    'pictures' => $build->pictures,
                ]);   
        
        }
    
        return view('pages.home', [ 'building' => $res ]);
    }

    public function singlePage($id)
    {
        $building = Building::where('building_id', $id)->with(['address', 'facilities'])->get();
        $pics = Picture::where('building_id', $id)->get(); 
        
        return view('pages.single', [ 'building' => $building, 'pictures' =>$pics ]);
    }
    public function addAddress(Request $req) {
        $address = new Address;
            $address->city = $req->city;
            $address->street = $req->street;
            $address->flat = $req->flat;
            $address->ln = $req->ln;
            $address->lg = $req->lg;
        $address->save();
    }


    public function addFacilities(Request $req) {
        $facilities = new Facilities;
            $facilities->is_refrigerator = $req->is_refrigerator === "on" ? 1 : 0;
            $facilities->is_furniture = $req->is_furniture === "on" ? 1 : 0;
            $facilities->is_tv = $req->is_tv === "on" ? 1 : 0;
            $facilities->is_bathroom = $req->is_bathroom === "on" ? 1 : 0;
            $facilities->is_internet = $req->is_internet === "on" ? 1 : 0;
            $facilities->is_kitchen = $req->is_kitchen === "on" ? 1 : 0;
            $facilities->is_balcony = $req->is_balcony === "on" ? 1 : 0;
        $facilities->save();
    }

    public function addBuilding(Request $req)
    {
        $building = new Building;
            $building->price = $req->price;
            $building->description = $req->description;
            $building->address_id = Address::all()->last()->address_id;
            $building->facilities_id = Facilities::all()->last()->facilities_id;
        $building->save();
    }
}