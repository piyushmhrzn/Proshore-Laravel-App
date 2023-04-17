<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public static function addUser(array $validatedAddUser): bool
    {
        $user = new User;

        $user->name = $validatedAddUser['name'];
        $user->email = $validatedAddUser['email'];
        $user->password = bcrypt($validatedAddUser['password']);
        $user->orgn_id = $validatedAddUser['orgn_id'];
        $user->designation = $validatedAddUser['designation'];

        // Check if a user with the same name exists
        $existingUser = User::where('name', $user->name)->first();
        if ($existingUser) {
            $user->slug = Str::slug($user->name) . '-' . uniqid();
        } else {
            $user->slug = Str::slug($user->name);
        }

        $status = $user->save();

        if(!$status) return false;
        return true;
    }

    public static function updateUser(array $validatedUpdateUser, string $id): bool
    {
        $user = User::findOrFail($id);

        $user->name = $validatedUpdateUser['name'];
        $user->email = $validatedUpdateUser['email'];
        $user->designation = $validatedUpdateUser['designation'];

        // Check if a user with the same name exists
        $existingUser = User::where('name', $user->name)->first();
        if ($existingUser) {
            $user->slug = Str::slug($user->name) . '-' . uniqid();
        } else {
            $user->slug = Str::slug($user->name);
        }

        $status = $user->save();

        if(!$status) return false;
        return true;
    }

    public static function getUserWithCreds(array $validatedUserCreds)
    {
        $user = User::where('email', $validatedUserCreds['email'])->first();
        if (!$user || !Hash::check($validatedUserCreds['password'], $user->password)) {
            return false;
        }
        return $user;
    }

}