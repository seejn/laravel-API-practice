<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request){
        $required_attributes = ['name', 'email', 'password'];
        $request_attributes = array_keys($request->input());

        $diff = array_diff($required_attributes, $request_attributes);
        if(!empty($diff)) return ["message"=>"Request not valid."];
        
        extract($request -> input());
        return response()->json(
            User::where('email', $email)->first()
            ? 
            ["message" => "User already exists"]
            : 
            User::create(["name" => $name, "email" => $email, "password" => $password])
        ); 
    }

    public function delete($id){
        $user = User::find($id);
        if($user === null) return ["message"=>"No User Found"];

        return response() -> json(
            $user -> delete()
            ?
            ["message"=>"User Deleted Successfully"]
            :
            ["message"=>"Deletion Unsuccessfull"]
        );
    }
}
