<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
class UserController extends Controller
{
    public function getAll(){
        $users = User::select('username', 'email', 'phone_no')
        ->get();

        return $users;
    }

    public function create(Request $request)
    {
        // Validate the request...
 
        $user = new User;
        
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone_no = $request->phone_no;
 
        $user->save();
    }
    
    public function update(Request $request, $id)
    {
        // Validate the request...
        $user = User::find($id);
        
        if($request->has('username')){
            $user->username = $request->username;
        }
        
        if($request->has('email')){
            $user->email = $request->email;
        }
        
        if($request->has('phone_no')){
            $user->phone_no = $request->phone_no;
        }
        
        if($request->has('password')){
            $user->password = $request->password;
        }
 
        $user->save();

        return $user;
    }
    
    public function getOne(Request $request, $id)
    {
        // Validate the request...
        $user = User::select('username', 'email', 'phone_no')->find($id);

        return $user;
    }
}
