<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users', compact('users', 'roles'));
    }


    public function delete(User $user)
    {
        try {
            $user->delete();
        }catch (\Exception $exception){
            return redirect('/admin/users')->with('failed', 'User is related to many commands, cant be deleted for the moment');
        }
    }




    public function setRole(Request $request)
    {
        $role = $request['role'];

        User::where('id', $request['user'])->update(['role_id' => $request['role']]);


        return redirect('/admin/users')->with('success', 'User updated successfully!');
    }







}
