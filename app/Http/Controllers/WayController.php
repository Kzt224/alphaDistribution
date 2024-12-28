<?php

namespace App\Http\Controllers;

use App\Models\Way;
use App\Models\City;
use Illuminate\Http\Request;

class WayController extends Controller
{
    public function Index()
    {

        $ways = Way::all();
        $day = date('l');
        $currentDay = substr($day,0,3);
        foreach ($ways as $key => $way) {
            $date = $way->day;
            if($date == $currentDay){
                return view('Admin.Way',compact('way'));
            }
        } 
    }

    public function detail()
    {
         
        $ways = Way::all();
        return view("Admin.WayDetail",compact('ways'));
    }

   
    public function edit(Request $request,Way $way)
    {
        
        $cities = City::orderBy("id",'desc')->get();
        return view("Admin.Edit_way",compact('way','cities'));
    }

    public function update(Request $request,Way $way)
    {
        $validated = $request->validate([
            'day' => 'required',
            'way_id' => 'required',
        ]);
        $way->day = $request->day;
        $way->city_id = $request->way_id;
        $way->save();
        return redirect("/way")->with("message",'way edited successfully');
    }

}
