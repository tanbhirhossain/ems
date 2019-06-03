<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Profile;

class RegisterController extends Controller
{

  public function storeUser(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
      'phone' => 'required',
      'ban_id' => 'required|max:5',
      'role' => 'required|in:admin,office,press,agent,customer', //validate role input
   ]);

     $pu = new User();
     $pu->name = $request->name;
     $pu->email = $request->email;
     $pu->phone = $request->phone;
     $pu->ban_id = $request->ban_id;
     $pu->role = $request->role;
     $pu->password = bcrypt($request->password);
     $pu->position = $request->position;
     $pu->division = $request->division;
     $pu->district = $request->district;
     $pu->upozila = $request->upozila;
     $pu->union = $request->union;
     $pu->ward = $request->ward;
     $pu->blood_group = $request->blood_group;
     $pu->work_since = $request->work_since;
     $pu->expired_date = $request->expired_date;
    





     $pu->save();




    return back()->with('message_success', 'Employee Added Succesfully');

  }



}
