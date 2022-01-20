<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'position', 'role', 'age', 'email', 'password', 'image', 'phone', 'dob', 'address', 'department_id'
    ];

    /**
     * Department Fuction for table relationship
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

    /**
     * Salary Fuction for table relationship
     */
    public function salary()
    {
        return $this->hasMany('App\Models\Salary');
    }
}
