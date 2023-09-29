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
    return view('dashboard.manage-users.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
    ]);

    User::create([
        'name' => $request->input('name'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    return redirect('/manage-users')->with('success', 'User successfully created');
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
    $user = User::findOrFail($id);
    return view('dashboard.manage-users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$user->id,
        
    ]);

    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
    ]);

    return redirect('/manage-users')->with('success', 'User updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect('/manage-users')->with('success', 'User deleted successfully');
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
