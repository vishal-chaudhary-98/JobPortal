<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
            'employee_id',
            'company_name',
            'role',
            'start_date',
            'end_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
