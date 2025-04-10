<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable
{
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
