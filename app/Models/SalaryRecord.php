<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryRecord extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'amount', 'date', 'employee_id'
    ];

    /**
     * Employee Fuction for table relationship
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }
}
