<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id', 'emp_no', 'name', 'email', 'phone', 'designation', 'hire_date'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
