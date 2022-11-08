<?php

namespace App\Exports;

use App\Models\Leave;
use App\Models\Department;
use App\Models\LeaveType;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApprovedLeavesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Leave::where('status', 'approved')->get();
    }

    public function headings(): array
    
    {
        return [
            'Name',
            'Date From',
            'Date To',
            'Applied Days',
            'Department',
            'Leave Type',
            'Date Posted',
            'Status'
        ];
    }

    public function map($leave): array
    {
        $departments=Department::all();
        $types=LeaveType::all();

        return[ $leave->user->name,
         $leave->date_start,
         $leave->date_end,
         $leave->nodays,
         array_search($leave->employee->department, $departments->pluck('id', 'name')->toArray()),
         array_search($leave->leave_type_id, $types->pluck('id', 'name')->toArray()),
         $leave->date_posted,
         ucfirst($leave->status)
    ];
    }
}
