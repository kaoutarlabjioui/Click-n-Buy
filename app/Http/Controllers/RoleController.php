<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {}


    public function create(Request $request)
    {
        Role::create([
            'role_name'=>$request->input('role_name'),
            'description'=>$request->input('description'),
        ]);

        return redirect('/admin/roles');
    }

    public function getRole(Role $role)
    {
        return view('admin.role_edit',compact('role'));
    }


    public function delete(Role $role)
    {
        try{
            $role->delete();
        }catch(\exception $exception){
            return redirect('/admin/role')->with('failed','Role is related to many users cant be deleted ');

        }
        return redirect('/admin/roles');
    }


    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        $role->update([
            'role_name'=>$request->input('role_name'),
            'description'=>$request->input('description')
        ]);
    }

}
