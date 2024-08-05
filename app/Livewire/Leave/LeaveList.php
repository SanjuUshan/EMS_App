<?php

namespace App\Livewire\Leave;

use App\Enums\LeaveStatus;
use App\Livewire\Modals\Leave\CheckLeaveCountModal;
use App\Mail\ContactUsMail;
use App\Mail\LeaveReject;
use App\Models\Employee;
use App\Models\Leave;
use App\Traits\CommonFeatures;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class LeaveList extends Component
{
    use CommonFeatures, WithPagination;

    public $search = '';
    public $branchSearch;
    public $genderSearch;

    public $perPageCounts = [
        '3',
        '5',
        '10',
        '25',
        '50',
        '100',
    ];
    public $perPage = '10';

    public $leaveId;

    public $message = 'Your requested leave is Accepted';
    public $rejectMessage = 'Your requested leave is Rejected';

    public function openCheckLeaves(): void
    {

        $this->dispatch('show')->to(CheckLeaveCountModal::class);

    }

    // Accept leave request
    public function acceptLeave($id)
    {


        $this->leaveId = $id;
        $leave = Leave::find($id);
        // dd($leave);
        if ($leave) {

            $employee = Employee::find($leave->emp_id);

            if ($employee) {
                Mail::to($employee->email)->send(new ContactUsMail([
                    'message' => $this->message,
                ]));

                $leave->status = LeaveStatus::ACCEPTED->value;
                $leave->save();

                session()->flash('success', 'Leave accepted and email sent successfully.');


            } else {
                throw new \Exception("Employee with ID {$leave->emp_id} could not be found.");
            }
        } else {
            throw new \Exception("Leave with ID $id could not be found.");
        }
    }

    // Reject leave 
    public function rejectLeave($id)
    {

        $leave = Leave::find($id);
        // dd($leave);
        if ($leave) {

            $employee = Employee::find($leave->emp_id);

            if ($employee) {
                Mail::to($employee->email)->send(new LeaveReject([
                    'message' => $this->rejectMessage,
                ]));

                $leave->status = LeaveStatus::REJECTED->value;
                $leave->save();

                session()->flash('success', 'Leave rejected and email sent successfully.');

            } else {
                throw new \Exception("Employee with ID {$leave->emp_id} could not be found.");
            }
        } else {
            throw new \Exception("Leave with ID $id could not be found.");
        }
    }

    public function deleteLeave($id)
    {
        $this->leaveId = $id;
        $leave = Leave::firstOrCreate(['id' => $this->leaveId]);
        if ($leave) {
            $leave->delete();
        }

    }



    public function render()
    {


        $leaves = Leave::with('employee.section')
        ->where('status', LeaveStatus::REQUESTING)
        ->orwhere('status', LeaveStatus::ACCEPTED)
        ->orwhere('status', LeaveStatus::REJECTED)
        ->paginate($this->perPage);

        /** @var \Illuminate\View\View $view */
        $view = view('livewire.leave.leave-list',[
            'leaves' => $leaves,
        ]);
        $view->layout('layouts.admin');

        return $view;
    }
}
