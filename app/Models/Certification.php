<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certification extends Model
{
    use HasFactory;
    protected $fillable = [
            'employee_id',
            'name',
            'institution',
            'date_received',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
