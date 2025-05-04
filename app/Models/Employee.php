<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
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
