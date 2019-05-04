<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Organization;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $organizations = Organization::all();
        return view('admin.users.create', ['organizations' => $organizations]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'organization_id' => 'required|integer|exists:organizations,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users.email',
            'password' => 'required|min:6',
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        
    }

    public function update(User $user, Request $request)
    {
        
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users');
    }
}
