<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

  public function index(){
   
    auth()->user()->name;
 $this->authorize('show-users');
  $users=User::latest()->paginate(25);
  return view ('Admin/users/all',compact('users'));    
  }
  
  public function destroy(User $user){
      $user->delete();
      return back();
  }
 
  
}
