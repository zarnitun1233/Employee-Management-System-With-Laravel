<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\withHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Employee;

class EmployeesExport implements FromCollection, WithMapping, withHeadings
{
    /**
     * To export employee list
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Employee::all();
    }

    /**
     * columns export from database
     * @return \Illuminate\Support\Collection
     */
    public function map($employee): array
    {
        if ($employee->role == 1) {
            $employee->role = "Admin";
        } else {
            $employee->role = "Employee";
        }
        return [
            $employee->id,
            $employee->name,
            $employee->position,
            $employee->role,
            $employee->age,
            $employee->email,
            $employee->phone,
            $employee->dob,
            $employee->address,
            $employee->department->name,
            $employee->created_at->format('Y-m-d'),
        ];
    }

    /**
     * Headings
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'id',
            'name',
            'position',
            'role',
            'age',
            'email',
            'phone',
            'date of birth',
            'address',
            'department name',
            'joined date',
        ];
    }
}
