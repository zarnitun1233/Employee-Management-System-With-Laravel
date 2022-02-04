<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Employee;

class Leave extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fromDate', 'toDate', 'duration', 'reason', 'employee_id','status'
    ];

    public function Employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
