<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Client.Login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Client.Login");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password'=> ['required'],
        ]);

         if(Auth::attempt($credential)){
            $request->session()->regenerate();

            return redirect()->intended('/client');
         }
         
         return back()->with('message','incorrect email or password');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/client/login');  
      }
}
