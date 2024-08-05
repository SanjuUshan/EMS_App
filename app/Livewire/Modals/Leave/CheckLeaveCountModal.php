<?php

namespace App\Livewire\Modals\Leave;

use App\Enums\LeaveStatus;
use App\Enums\Status;
use App\Models\Employee;
use App\Models\Leave;
use App\Traits\AsModal;
use Carbon\Carbon;
use Livewire\Component;

class CheckLeaveCountModal extends Component
{
    use AsModal;

    public $modal_id = 'check-leave-count-modal';

    public $modalTitle = 'Check Leaves';

    public $empId;
    public $totalLeaveDays;

    public function checkCount()
    {
        $leaves = Leave::where('emp_id', $this->empId)->where('status', LeaveStatus::ACCEPTED->value)->get();

        $totalDays = 0;
        foreach ($leaves as $leave) {
            $toDate = Carbon::parse($leave->end_date);
            $fromDate = Carbon::parse($leave->start_date);
            $days = $toDate->diffInDays($fromDate) + 1;
            $totalDays += $days;

        }
        // dd($totalDays);
        $this->totalLeaveDays = $totalDays;

    }
    public function render()
    {


        $employees = Employee::where('status', Status::ACTIVE->value)->get();
        return view('livewire.modals.leave.check-leave-count-modal', [
            'employees' => $employees,
        ]);
    }
}
