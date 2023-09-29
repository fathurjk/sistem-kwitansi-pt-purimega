<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.manage-users.index',[
            'users' => User::get(),
            'roles' => Role::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        return view('dashboard.manage-users.roles.add-role',[
            'roles' => Role::get(),
            'user' => $user,
        ]);
    }

    public function assignRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $role = Role::where('name', $request->input('role'))->firstOrFail();
        $user->assignRole($role);

        return redirect('/manage-users')->with('success', 'Role Successfull Added!');
    }

    public function showRemoveRoleForm($userId)
    {
        $user = User::findOrFail($userId);
        $roles = Role::all(); // Fetch all roles

        return view('dashboard.manage-users.roles.delete-role', compact('user', 'roles'));
    }

    public function removeRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        // Remove the selected role from the user
        $user->removeRole($request->role_id);

        return redirect('/manage-users')->with('success', 'Role removed successfully');
    }
}
