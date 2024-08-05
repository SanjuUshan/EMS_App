<?php

namespace App\Livewire\Supervisor;

use App\Enums\EmployerTypeEnum;
use App\Exports\ExportSupervisors;
use App\Livewire\Modals\Supervisor\SupervisorViewModal;
use App\Models\BankName;
use App\Models\Employee;
use App\Traits\CommonFeatures;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class SupervisorList extends Component
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
    public $perPage = '5';

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
    // public $banks;

    public $fromDate;
    public $toDate;

    public function supervisorViewModal($empId): void
    {

        $this->dispatch('show', $empId)->to(SupervisorViewModal::class);

    }
    public function exportEmployees()
    {
        return Excel::download(new ExportSupervisors($this->search,$this->fromDate,$this->toDate,$this->genderSearch), 'Employees_Details.xlsx');
    }

    public function view($id)
    {
        $employee = Employee::findOrFail($id);

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

        // $this->resetPage();
        // $this->showModal = true;
    }

    public $supervisorId;
    public function roleToEmployee($id)
    {

        $this->supervisorId = $id;
        $supervisor = Employee::firstOrCreate(['id' => $this->supervisorId]);

        if ($supervisor) {
            $supervisor->role = EmployerTypeEnum::EMPLOYEE->value;
            $supervisor->save();
            $this->sweetToast('Demoted','Demoted as Employee','success');
        } else {

            throw new \Exception("Supervisor with ID $id could not be found or created.");
        }

    }

    public function render()
    {

        $supervisorsQueay = Employee::with('bank', 'section')->where('role',EmployerTypeEnum::SUPERVISOR);


        // $teachersQuery = User::query()->where('type', UserTypeEnum::TEACHER);

        if ($this->search) {
            $supervisorsQueay->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile', 'like', '%' . $this->search . '%')
                    ->orWhere('nic', 'like', '%' . $this->search . '%')

                    ->orWhere('gender', 'like', '%' . $this->search . '%')
                  ->orWhere('joined_date', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->genderSearch) {
            $supervisorsQueay->where('gender', $this->genderSearch);
        }
        if ($this->fromDate && $this->toDate ) {
            $supervisorsQueay->whereBetween('joined_date',array($this->fromDate,$this->toDate));
        }

        $employees = $supervisorsQueay->paginate($this->perPage);

        $banks = BankName::all();
        $genders = [
            ['id' => '1', 'name' => 'Male'],
            ['id' => '2', 'name' => 'Female'],

        ];

        /** @var \Illuminate\View\View $view */
        $view = view('livewire.supervisor.supervisor-list',[
            'banks' => $banks,
            'genders' => $genders,
            'employees' => $employees,
        ]);
        $view->layout('layouts.admin');

        return $view;
    }
}
