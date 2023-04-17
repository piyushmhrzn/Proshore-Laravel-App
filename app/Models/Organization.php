<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'email',
        'description',
        'address',
        'estd_date',
        'status'
    ];

    // To store the roles as an array in JSON format
    protected $casts = [
        'designations' => 'json'
    ];

    /* 
        $fillable => mass value assignable
        $guarded => value doesnot change
        $casts => what type of data to return from model
    */

    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'orgn_id');
    }

    // public function totalEmployees() : int
    // {
    //     return $this->hasMany(User::class, 'orgn_id')->count();
    // }

}
