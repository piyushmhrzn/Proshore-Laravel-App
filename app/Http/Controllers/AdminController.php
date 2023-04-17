<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use App\Models\User;
use App\Services\UserService;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::withCount('users')->paginate(5);
        $totalEmployees = User::count();
        return view('dashboard')
                ->with('organizations', $organizations)
                ->with('totalEmployees', $totalEmployees);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function verifyUser(UserLoginRequest $request)
    {
        $validatedUserCreds = $request->validated();
        $user = UserService::getUserWithCreds($validatedUserCreds);

        if(!$user){
            dd('Wrong Credentials');
        }else if($user->role == 'admin' || $user->role == 'superadmin'){
            echo "Welcome, ".$user->name. " to dashboard";
        }else{
            dd("Access Unauthorized");
        }
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
