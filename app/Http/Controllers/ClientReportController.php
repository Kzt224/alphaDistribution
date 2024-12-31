<?php

namespace App\Http\Controllers;

use App\Models\ComfirmOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientReportController extends Controller
{
    public function index(){
        $user = Auth::user();
        $id = $user->id;

        $reports = ComfirmOrder::where('user_id',$id)->get();
        dd($reports); 
    }
}
