<?php

namespace App\Http\Controllers;

use App\Models\ComfirmOrder;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        return view('Admin.Data');
    }

    public function user(){
        
        $allOrder = ComfirmOrder::all()->groupBy('user_id');

        $totalOrder = $allOrder->map(function($group){
            return[
                'user_name' => $group->first()->user->name,
                'total' => $group->sum(function($group){
                    return $group->total;
                }),
            ];
        });
        $terget = 2000000;


        return view('Admin.UserData',compact('totalOrder','terget'));
    }
}
