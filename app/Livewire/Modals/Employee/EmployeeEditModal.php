<?php

namespace App\Livewire\Modals\Employee;

use App\Enums\EmpTypeEnum;
use App\Enums\Status;
use App\Livewire\Employee\EmployeeList;
use App\Models\Bank;
use App\Models\BankName;
use App\Models\Employee;
use App\Models\Section;
use App\Traits\AsModal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EmployeeEditModal extends Component
{
    use AsModal , WithFileUploads;

    public $modal_id = 'employee-edit-modal';

    public $modalTitle = 'Employee Edit';
    // public $name;

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
    public $file;
    public $profileImagePath;
    public $password;

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
        $this->password = null;
        // $this->file = $employee->file_name;


        $this->resetValidation();
    }

    public function updateEmp()
    {



        $this->validate([
            'initials' => 'required',
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'dob' => 'required',
            // 'nic' => 'required|unique:employees',
            'gender' => 'required',
            'civilStatus' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            // 'mobile' => 'required|unique:employees',
            'section' => 'required',
            'joinedDate' => 'required',
            'empType' => 'required',
            'workSchedule' => 'required',
            // 'supervisor' => 'required',
            'bankName' => 'required',
            'branchName' => 'required',
            // 'file' => 'required|file|max:1024',
            'accNumber' => 'required|numeric',

        ]);

        // $path = $this->file->store('profile', 'public');

        $this->employee->update([
            // 'bank_id' => $bank->id,
            // 'section_id' => $section->id,
            'initials' => $this->initials,
            'first_name' => $this->firstName,
            'middle_name' => $this->middleName,
            'last_name' => $this->lastName,
            'dob' => $this->dob,
            'nic' => $this->nic,
            'gender' => $this->gender,
            'civil_status' => $this->civilStatus,
            'address' => $this->address,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'joined_date' => $this->joinedDate,
            'status' => Status::ACTIVE->value,
            'emp_type' => EmpTypeEnum::EMPLOYEE->value,
            // 'file_name' => $this->file->getClientOriginalName(),
            // 'password' => Hash::make($this->password),

        ]);

        // Image update

        if ($this->file) {

            if ($this->employee->path && Storage::disk('public')->exists($this->employee->path)) {
                Storage::disk('public')->delete($this->employee->path);
            }


            $path = $this->file->store('profile', 'public');
            $updateData['file_name'] = $this->file->getClientOriginalName();
            $updateData['path'] = $path;

            $this->employee->update($updateData);
        }

        if ($this->password) {
            $updateData['password'] = Hash::make($this->password);
            $this->employee->update($updateData);
        }




        //bank details update

        $this->employee->bank()->update([
            'bank' => $this->bankName,
            'bank_branch' => $this->branchName,
            'account_number' => $this->accNumber,
        ]);

        $this->employee->section()->update([
            'section' => $this->section,
            'employment_type' => $this->empType,
            'supervisor' => $this->supervisor,
            'work_schedule' => $this->workSchedule,

        ]);


        // DB::commit();
        $this->closeBSModal();
        $this->reset();
        $this->sweetToast('Updated','Employee Updated Successfully','success');
        $this->dispatch('refreshEvent')->to(EmployeeList::class);

    }


    public function render()
    {

        $banks = BankName::all();
        $genders = [
            ['id' => '1', 'name' => 'Male'],
            ['id' => '2', 'name' => 'Female'],

        ];
        return view('livewire.modals.employee.employee-edit-modal',[
            'banks' => $banks,

            'genders' => $genders,
        ]);
    }
}
