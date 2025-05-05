<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
            'name',
            'dob',
            'gender',
            'nationality',
            'email',
            'contact',
    ];

    public function education() {
        return $this->hasMany(Education::class);
    }

    public function certification() {
        return $this->hasMany(Certification::class);
    }

    public function experience() {
        return $this ->hasMany(Experience::class);
    }


}
