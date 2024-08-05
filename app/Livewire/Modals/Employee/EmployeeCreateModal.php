<?php

namespace App\Livewire\Modals\Employee;

use App\Enums\EmployerTypeEnum;
use App\Enums\EmpTypeEnum;
use App\Enums\Status;
use App\Livewire\Employee\EmployeeList;
use App\Models\Bank;
use App\Models\BankName;
use App\Models\Employee;
use App\Models\Section;
use App\Traits\AsModal;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class EmployeeCreateModal extends Component
{
    use AsModal , WithFileUploads;

    public $modal_id = 'employee-create-modal';

    public $modalTitle = 'Create Employee';

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
    public $file;
    public $password;

    public function beforeShow()
    {
        $this->resetValidation();
    }

    public function createEmp()
    {


            $this->validate([
                // 'initials' => 'required',
                'firstName' => 'required',
                'middleName' => 'required',
                'lastName' => 'required',
                'dob' => 'required',
                'nic' => 'required|unique:employees',
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
                'file' => 'required|file|max:1024',
                'accNumber' => 'required|numeric',

            ]);

            $path = $this->file->store('profile', 'public');

            $bank = Bank::create([
                'bank' => $this->bankName,
                'bank_branch' => $this->branchName,
                'account_number' => $this->accNumber,
            ]);

            $section = Section::create([
                'section' => $this->section,
                'employment_type' => $this->empType,
                'supervisor' => $this->supervisor,
                'work_schedule' => $this->workSchedule,

            ]);

            $employee = Employee::create([
                'bank_id' => $bank->id,
                'section_id' => $section->id,
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
                'file_name' => $this->file->getClientOriginalName(),
                'path' => $path,
                'password' => Hash::make($this->password),

            ]);


            // DB::commit();
            $this->closeBSModal();
            $this->sweetToast('Created','Employee Created Successfully','success');
            $this->dispatch('refreshEvent')->to(EmployeeList::class);
            $this->reset();


        // } catch (\Throwable $th) {
        //     DB::rollBack();
            // $this->toastr('Error Creating Employee', 'error');
            // if (app()->isLocal()) {
            //     dd($th->getMessage());
            // }
        // }

    }

    public function render()
    {
        $banks = BankName::all();
        $genders = [
            ['id' => '1', 'name' => 'Male'],
            ['id' => '2', 'name' => 'Female'],

        ];

        $supervisors = Employee::where('role',EmployerTypeEnum::SUPERVISOR->value)->get();
        // dd($supervisors);
        return view('livewire.modals.employee.employee-create-modal',[
            'banks' => $banks,
            'supervisors' => $supervisors,
            'genders' => $genders,
        ]);
    }
}
