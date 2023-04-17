<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Http\Resources\OrganizationResource;
use App\Http\Resources\UserResource;
use App\Services\OrganizationService;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\User;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::withCount('users')->paginate(5);
        return view('organization.index')->with('organizations', $organizations);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddOrganizationRequest $request)
    {
        $validatedAddOrgn = $request->validated();
        $addOrgnData = OrganizationService::addOrganization($validatedAddOrgn);

        if(!$addOrgnData) return redirect()->route('organization')->with('error', 'Failed to add organization');

        return redirect()->route('organization.index')->with('success', 'Organization has been added');
    }

    /**
     * Display the specified resource.
     */

    // Route model binding
    // public function show(Organization $id){}

    public function show(string $slug)
    {
        $organization = Organization::where('slug', $slug)->firstOrFail();
        $users = User::where('orgn_id', $organization->id)->paginate(5);
        return view('organization.show')
            ->with('organization', $organization)
            ->with('users', $users);

        // return view('organization.view',compact(['organization','users']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $organization = Organization::where('slug', $slug)->firstOrFail();
        return view('organization.edit')->with('organization', $organization);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationRequest $request, string $id)
    {
        $validatedUpdateOrgn = $request->validated();
        $updateOrgnData = OrganizationService::updateOrganization($validatedUpdateOrgn, $id);


        if(!$updateOrgnData) return redirect()->route('organization.index')->with('error', 'Failed to update organization');

        return redirect()->route('organization.index')->with('success', 'Organization has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $organization = Organization::findOrFail($id);
        $status = $organization->delete();

        if(!$status) return redirect()->route('organization.index')->with('error', 'Failed to delete Organization');

        return redirect()->route('organization.index')->with('success', 'Organization has been deleted successfully');
    }

}
