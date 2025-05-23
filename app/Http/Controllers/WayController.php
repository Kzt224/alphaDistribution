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
    $currentDay = date('l'); // returns "Monday", "Tuesday", etc.

    foreach ($ways as $way) {
        if (strtolower($way->day) == strtolower($currentDay)) {
            return view('Admin.Way', compact('way'));
        }
    }

    return view('Admin.Way', ['way' => null]); // Handle when no match found
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
