<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlets = Outlet::all();
        return view("Admin.Outlet",compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view("Admin.AddOutlet",compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Outlet $outlet)
    {
        $validated = $request->validate([
            'name' => 'required',
            'city_id' => 'required',
            'ph_number' => 'required',
        ]);

        $outlet = new Outlet;
        $outlet->name = $request->name;
        $outlet->city_id = $request->city_id;
        $outlet->Phone_number = $request->ph_number;

        $outlet->save();
        return redirect('/outlet')->with("message","Outlet Add Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outlet $outlet)
    {
        $cities = City::all();
        return view("Admin.EditOutlet",compact('outlet','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outlet $outlet)
    {
        $validated = $request->validate([
            'name' => 'required',
            'city_id' => 'required',
            'ph_number' => 'required',
        ]);

        $outlet->name = $request->name;
        $outlet->city_id = $request->city_id;
        $outlet->Phone_number = $request->ph_number;

        $outlet->save();
        return redirect('/outlet')->with("message","Outlet Edited Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
