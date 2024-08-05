<?php

namespace App\Livewire\Modals\Leave;

use App\Enums\LeaveStatus;
use App\Models\Employee;
use App\Models\Leave;
use App\Traits\AsModal;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LeaveCreateModal extends Component
{
    use AsModal;

    public $modal_id = 'leave-create-modal';

    public $modalTitle = 'Create Leave';

    public $empId;
    public $startDate;
    public $endDate;
    public $reason;
    public $status;
    public $password;
    public $result;
    public $empDetails = [];

    public function beforeShow()
    {
        // $this->resetValidation();
    }
    public function confirmUser()
    {
        $this->validate([
            'password' => 'required',
        ]);
        // $query = Employee::query();

        // if ($this->password) {
        //     $query->whereHas('employee', function($q) {
        //         $q->where('password', $this->password);
        //     });
        // }

        $employee = Employee::find($this->empId);
       

        if(Hash::check($this->password, $employee->password)){
            $this->result = true;
        }

        // $this->resetValidation();

    }


    public function createLeave()
    {
        $this->validate([
            'empId' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'reason' => 'required',
        ]);
        // dump(  $this->empDetails);
        $leave = Leave::create([
            'emp_id' => $this->empId,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'reason' => $this->reason,
            'status' => LeaveStatus::REQUESTING->value,


        ]);

        $this->closeBSModal();
        $this->reset();
    }

    public function render()
    {

        $this->empDetails = Employee::select('id','first_name','nic','status','path')->where('id',$this->empId)->get();

        $employees = Employee::all();
        return view('livewire.modals.leave.leave-create-modal',[
            'employees' => $employees,
        ]);
    }
}
