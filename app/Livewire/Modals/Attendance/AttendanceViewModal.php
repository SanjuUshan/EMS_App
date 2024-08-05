<?php

namespace App\Livewire\Modals\Attendance;

use App\Enums\AttendanceStatusEnum;
use App\Models\Attendance;
use App\Models\Employee;
use App\Traits\AsModal;
use Livewire\Component;

class AttendanceViewModal extends Component
{
    use AsModal;

    public $modal_id = 'attendance-view-modal';

    public $modalTitle = 'Attendance View';

    public $employee;
    public $empId;
    public $fromDate;
    public $toDate;
    public $presentCount;
    public $absenceCount;
    public $totalDays;

    public function beforeShow(Employee $employee)
    {
        $this->employee = $employee;

        $this->empId = $employee->id;
        // dd($this->employee->id);
    }
    public function render()
    {

        $employeesQueay = Attendance::with('employee')->where('emp_id',$this->empId);

        if ($this->fromDate && $this->toDate ) {

            $employeesQueay->whereBetween('check_in',array($this->fromDate,$this->toDate));


            $presentQuery = clone $employeesQueay;
            $absenceQuery = clone $employeesQueay;

            $this->presentCount = $presentQuery->where('status', AttendanceStatusEnum::CHECK_IN->value)->count();
            $this->absenceCount = $absenceQuery->where('status', AttendanceStatusEnum::ABCENSE->value)->count();

            $fromDate = \Carbon\Carbon::parse($this->fromDate);
            $toDate = \Carbon\Carbon::parse($this->toDate);
            $this->totalDays = $toDate->diffInDays($fromDate) + 1;

        }else {
            $this->presentCount = 0;
            $this->absenceCount = 0;
            $this->totalDays = 0;
        }
        $employees = $employeesQueay->get();

        // $this->presentCount = $employeesQueay->where('status', 1)->count();

        // dump($this->absenceCount);

        return view('livewire.modals.attendance.attendance-view-modal');
    }
}
