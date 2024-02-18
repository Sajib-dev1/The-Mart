<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RollController extends Controller
{
    function roll_manage(){
        $permission = Permission::all();
        $roles = Role::all();
        $users = User::all();
        return view('admin.roll.roll_manage',[
            'permissions'=>$permission,
            'roles'=>$roles,
            'users'=>$users,
        ]);
    }

    function permition_store(Request $request){
        Permission::create(['name' => $request->permition_name]);
        return back();
    }

    function rol_store(Request $request){
        $role = Role::create(['name' => $request->rol_name]);
        $role->givePermissionTo($request->permission);

        return back();
    }

    function role_delete($id){
        $role = Role::find($id);
        DB::table('role_has_permissions')->where('role_id',$id)->delete();
        Role::find($id)->delete();
        return back();
    }

    function role_edit($id){
        $role_info = Role::find($id);
        $permissions = Permission::all();
        return view('admin.roll.role_edit',[
            'permissions'=>$permissions,
            'role_info'=>$role_info,
        ]);
    }

    function role_update(Request $request,$id){
        $role = Role::find($id);
        $role->syncPermissions($request->permission);
        return back();
    }

    function assain_role(Request $request){
        $user = User::find($request->user_id);
        $user->assignRole($request->role);
        return back();
    }

    function role_remove($id){
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        return back();
    }
}
