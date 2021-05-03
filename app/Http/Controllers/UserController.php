<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getData(){
          $users = User::get();
        $users = collect($users);
         $users -> transform(function($value, $key){
           $data = [];
             $data['id'] = $value['id'];
             $data['name'] = $value['name'];
             $data['email'] = $value['email'];
             $data['created_at'] = $value['created_at'];
            return $data;
        });
        return view('dashboard', compact('users'));
    }
}
