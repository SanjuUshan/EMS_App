<?php

namespace App\Livewire\Modals\Supervisor;

use App\Models\BankName;
use App\Models\Employee;
use App\Traits\AsModal;
use Carbon\Carbon;
use Livewire\Component;

class SupervisorViewModal extends Component
{
    use AsModal;

    public $modal_id = 'supervisor-view-modal';

    public $modalTitle = 'Supervisor View';

    public $initials;
    public $firstName;
    public $middleName;
    public $lastName;
    public $dob;
    public $nic;
    public $gender;
    public $civilStatus;
    public $address;
    public $email;
    public $mobile;
    public $section;
    public $joinedDate;
    public $empType;
    public $workSchedule;
    public $supervisor;
    public $bankName;
    public $branchName;
    public $accNumber;
    public $employee;
    public $profileImagePath;

    public function beforeShow(Employee $employee)
    {
        $this->employee = $employee;
         $this->initials = $employee->initials;
        $this->firstName = $employee->first_name;
        $this->middleName = $employee->middle_name;
        $this->lastName = $employee->last_name;
        $this->dob = $employee->dob;
        $this->nic = $employee->nic;
        $this->gender = $employee->gender;
        $this->civilStatus = $employee->civil_status;
        $this->address = $employee->address;
        $this->email = $employee->email;
        $this->mobile = $employee->mobile;
        $this->section = $employee->section->section;
        $this->joinedDate = Carbon::parse($employee->joined_date)->toDateString();
        $this->empType = $employee->section->employment_type;
        $this->workSchedule = $employee->section->work_schedule;
        $this->supervisor = $employee->section->supervisor;
        $this->bankName = $employee->bank->bank;
        $this->branchName = $employee->bank->bank_branch;
        $this->accNumber = $employee->bank->account_number;
        $this->profileImagePath = $employee->path;

    }
    public function render()
    {
        $banks = BankName::all();
        $genders = [
            ['id' => '1', 'name' => 'Male'],
            ['id' => '2', 'name' => 'Female'],

        ];
        return view('livewire.modals.supervisor.supervisor-view-modal',[
            'banks' => $banks,
            'genders' => $genders,
        ]);
    }
}
