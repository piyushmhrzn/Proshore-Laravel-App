<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchQuery = $request->input('table_search');
        // eagerly load the organization relationship when retrieving the User model from the database
        // so when you access the organization property on a User model, the related Organization model 
        // will already be loaded into memory, and no additional SQL queries will be performed.
        $users = User::with('organization')
                    ->where('name', 'LIKE', "%$searchQuery%")
                    ->orWhere('email', 'LIKE', "%$searchQuery%")
                    ->paginate(5);
        return view('employee.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $slug)
    {
        $organization = Organization::where('slug', $slug)->firstOrFail();
        return view('employee.create')->with('organization', $organization);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddUserRequest $request)
    {
        $validatedAddUser = $request->validated();
        $addUserData = UserService::addUser($validatedAddUser);

        // Id of the organization where user is being added
        $orgn_id = $request->input('orgn_id');
        $organization = Organization::where('id', $orgn_id)->firstOrFail();
        
        if(!$addUserData) return redirect()->route('organization.show', [$organization->slug])->with('error', 'Failed to add Employee');

        return redirect()->route('organization.show', [$organization->slug])->with('success', 'Employee added successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        return view('employee.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $validatedUpdateUser = $request->validated();
        $updateUserData = UserService::updateUser($validatedUpdateUser, $id);

        // Id of the organization where user is updated
        $orgn_id = $request->input('orgn_id');
        $organization = Organization::where('id', $orgn_id)->firstOrFail();

        if(!$updateUserData) return redirect()->route('organization.show', [$organization->slug])->with('error', 'Failed to update Employee');

        return redirect()->route('organization.show', [$organization->slug])->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $status = $user->delete();

        if(!$status) return redirect()->route('employee.index')->with('error', 'Failed to delete Employee');

        return redirect()->back()->with('success', 'Employee deleted successfully');
    }
}
