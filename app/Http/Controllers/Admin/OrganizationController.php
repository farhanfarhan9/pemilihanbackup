<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::with('users')->paginate(20);
        return view('admin.organizations.index', ['organizations' => $organizations]);
    }

    public function show(Organization $organization)
    {
        $organization->setRelation('users', $organization->users()->paginate(10));
        return view('admin.organizations.show', ['organization' => $organization]);
    }

    public function create()
    {
        return view('admin.organizations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|string|max:100',
            'shortname' => 'required|string|min:5|unique:organizations,shortname',
            'phone_number'=> 'required',
        ]);

        $organization = Organization::create($request->all());

        return redirect()->route('admin.organizations.show', $organization->id)
                         ->with('success', 'Successfully create an organization.');
    }

    public function edit(Organization $organization)
    {
        return view('admin.organizations.edit', ['organization' => $organization]);
    }

    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required|string|string|max:100',
            'shortname' => [
                'required',
                Rule::unique('organizations')->ignore($organization)
            ],
            'phone_number'=> 'required',
        ]);

        $organization->update($request->all());

        return redirect()->route('admin.organizations.show', [$organization])
                    ->with('success', 'This organization was successfully edited.');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();

        return redirect()->route('admin.organizations.index')
                         ->with('success', 'Successfully deleted an organization.');
    }
}
