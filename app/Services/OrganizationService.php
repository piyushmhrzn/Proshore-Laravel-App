<?php

namespace App\Services;

use App\Models\Organization;
use Illuminate\Support\Str;

class OrganizationService
{
    public static function addOrganization(array $validatedAddOrgn): bool
    {
        $orgn = new Organization;

        $orgn->title = $validatedAddOrgn['title'];
        $orgn->email = $validatedAddOrgn['email'];
        $orgn->description = $validatedAddOrgn['description'];
        $orgn->address = $validatedAddOrgn['address'];
        $orgn->estd_date = $validatedAddOrgn['estd_date'];
        $orgn->status = $validatedAddOrgn['status'];
        $orgn->designations = explode(',', $validatedAddOrgn['designations']);

        // Check if an organization with the same title exists
        $existingOrgn = Organization::where('title', $orgn->title)->first();
        if ($existingOrgn) {
            $orgn->slug = Str::slug($orgn->title) . '-' . uniqid();
        } else {
            $orgn->slug = Str::slug($orgn->title);
        }

        $status = $orgn->save();

        if(!$status) return false;
        return true;
    }

    public static function updateOrganization(array $validatedUpdateOrgn, string $id): bool
    {
        $orgn = Organization::find($id);

        $orgn->title = $validatedUpdateOrgn['title'];
        $orgn->email = $validatedUpdateOrgn['email'];
        $orgn->description = $validatedUpdateOrgn['description'];
        $orgn->address = $validatedUpdateOrgn['address'];
        $orgn->estd_date = $validatedUpdateOrgn['estd_date'];
        $orgn->status = $validatedUpdateOrgn['status'];
        $orgn->designations = explode(',', $validatedUpdateOrgn['designations']);
        
        $existingOrgn = Organization::where('title', $orgn->title)->first();
        if ($existingOrgn) {
            $orgn->slug = Str::slug($orgn->title) . '-' . uniqid();
        } else {
            $orgn->slug = Str::slug($orgn->title);
        }
        
        $status = $orgn->save();

        if(!$status) return false;
        return true;
    }

}

// toSql();
// dump($records->getBindings());
// title update validation unique