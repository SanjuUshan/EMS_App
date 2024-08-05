<?php

namespace App\Livewire\Attendance;

use App\Enums\AttendanceStatusEnum;
use App\Livewire\Modals\Attendance\AttendanceViewModal;
use App\Models\Attendance;
use App\Models\Employee;
use App\Traits\CommonFeatures;
use Livewire\Component;
use Livewire\WithPagination;

class AttendanceSheet extends Component
{
    use CommonFeatures, WithPagination;

    public $search = '';
    public $branchSearch;
    public $genderSearch;

    public $sectionId;
    public $searchSection;
    public $test;

    public $perPageCounts = [
        '3',
        '5',
        '10',
        '25',
        '50',
        '100',
    ];
    public $perPage = '7';

    public function attendanceViewmodal($empId): void
    {

        $this->dispatch('show', $empId)->to(AttendanceViewModal::class);

    }

    //attendance check in
    public function checkIn($empId)
    {
        $attendance = Attendance::create([
            'emp_id' => $empId,
            'check_in' => now(),
            'date' => now(),
            'status' => AttendanceStatusEnum::CHECK_IN->value,

        ]);
        $this->reset();
        $this->sweetToast('Marked','Attendance Marked Successfully','success');
    }
    //attendance check out
    public function checkOut($empId)
    {
        $employee = Employee::find($empId);
        $employee->attendances()->update([
            'check_out' => now(),
        ]);

        $this->reset();
        $this->sweetToast('Marked','Checked out Marked Successfully','success');

    }
    //attendance abcense
    public function abcense($empId)
    {
        $attendance = Attendance::create([
            'emp_id' => $empId,
            'check_in' => now(),
            'date' => now(),
            'status' => AttendanceStatusEnum::ABCENSE->value,

        ]);
        $this->reset();
        $this->sweetToast('Marked','Abcense Marked Successfully','success');
    }
    public function render()
    {
        // dump($this->sectionId);
        $employeesQuery = Employee::with('section');

        if ($this->sectionId) {
            $employeesQuery->whereHas('section', function ($query) {
                $query->where('section', $this->sectionId);
            });
        }

        $employees = $employeesQuery->paginate(7);

        /** @var \Illuminate\View\View $view */
        $view = view('livewire.attendance.attendance-sheet',[
            'employees' => $employees,
        ]);
        $view->layout('layouts.admin');

        return $view;
    }
}
