<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users = User::all();
       return view('Admin.User',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.AddUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
      
        $role = $request->role;
        if($role != 0){
            $newRloe = 1;
        }else{
            $newRloe = 0;
        }


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user ->password = Hash::make($request->password);
        $user->role = $newRloe;
        $user->save();

        return redirect('/user')->with('message','User Add Successfully');

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
    public function edit(User $user)
    {
        return view("Admin.EditUser",compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $role = $request->role;
        if($role == ""){
            $newRole = 0;
        }else{
            $newRole = 1 ;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $newRole;
        $user->save();

        return redirect("/user")->with('message','user edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/user')->with('message','user delete Successfully');
    }
}
