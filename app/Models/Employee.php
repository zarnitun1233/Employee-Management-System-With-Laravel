<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;
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
}
