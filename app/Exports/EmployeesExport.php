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
        return [
            $employee->id,
            $employee->name,
            $employee->position,
            $employee->age,
            $employee->email,
            $employee->phone,
            $employee->dob,
            $employee->address,
        ];
    }

    /**
     * Headings
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'no',
            'name',
            'position',
            'age',
            'email',
            'phone',
            'date of birth',
            'address',
        ];
    }
}
