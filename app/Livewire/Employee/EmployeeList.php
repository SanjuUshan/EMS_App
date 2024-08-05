<?php

namespace App\Livewire\Employee;

use App\Enums\EmployerTypeEnum;
use App\Enums\EmploymentTypeEnum;
use App\Enums\EmpTypeEnum;
use App\Enums\Status;
use App\Exports\ExportEmployees;
use App\Livewire\Modals\Employee\EmployeeCreateModal;
use App\Livewire\Modals\Employee\EmployeeEditModal;
use App\Livewire\Modals\Employee\EmployeeViewModal;
use App\Models\Bank;
use App\Models\BankName;
use App\Models\Employee;
use App\Models\Section;
use App\Traits\CommonFeatures;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeList extends Component
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
    public $perPage = '7';

    // protected $listeners = ['view'];


    // protected $listeners = [
    //     'searchListEvent'  => 'searchList',
    //     'refreshListEvent' => '$refresh',
    // ];

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


    public function openEmployeeCreateModal(): void
    {
        $this->dispatch('show')->to(EmployeeCreateModal::class);

    }
    public function employeeViewModal($empId): void
    {

        $this->dispatch('show', $empId)->to(EmployeeViewModal::class);

    }
    public function employeeEditModal($empId): void
    {

        $this->dispatch('show', $empId)->to(EmployeeEditModal::class);

    }


    public $supervisorId;
    public function roleToSupervisor($id)
    {

        $this->supervisorId = $id;
        $supervisor = Employee::firstOrCreate(['id' => $this->supervisorId]);

        if ($supervisor) {
            $supervisor->role = EmployerTypeEnum::SUPERVISOR->value;
            $supervisor->save();
            $this->sweetToast('Promoted','Promoted as Supervisor','success');
        } else {

            throw new \Exception("Supervisor with ID $id could not be found or created.");
        }
        // $this->sweetToast(null,'Saved Complete','info');
        // $this->sweetAlert(null,'Saved Complete','info');

    }

    public function deleteEmployee($empId)
    {
        $employee = Employee::find($empId);
        if ($employee) {
            $employee->delete();
            $this->sweetToast('Deleted','Deleted Successfully','success');
        }
    }

    public function exportEmployees()
    {
        return Excel::download(new ExportEmployees($this->search,$this->fromDate,$this->toDate,$this->genderSearch), 'Employees_Details.xlsx');
    }

    public function render()
    {
        // custom code here

        // dd($this->perPage);
        $banks = BankName::all();
        $employeesQueay = Employee::with('bank', 'section');


        if ($this->search) {
            $employeesQueay->where(function ($query) {
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

        $genders = [
            ['id' => '1', 'name' => 'Male'],
            ['id' => '2', 'name' => 'Female'],

        ];
        if ($this->genderSearch) {
            $employeesQueay->where('gender', $this->genderSearch);
        }
        if ($this->fromDate && $this->toDate ) {
            // dd('dd');
            // dd($this->fromDate, $this->toDate);
            $employeesQueay->whereBetween('joined_date',array($this->fromDate,$this->toDate));
            // if ($this->fromDate && $this->toDate) {
            //     $fromDate = Carbon::parse($this->fromDate)->startOfDay();
            //     $toDate = Carbon::parse($this->toDate)->endOfDay();

            //     // Add debugging here
            //     dd(['fromDate' => $fromDate, 'toDate' => $toDate]);

            //     $employeesQueay->whereBetween('joined_date', [$fromDate, $toDate]);
            // }
        }

        $employees = $employeesQueay->paginate($this->perPage);
        // DB::getQueryLog();

        /** @var \Illuminate\View\View $view */
        $view = view('livewire.employee.employee-list', [
            'banks' => $banks,
            'employees' => $employees,
            'genders' => $genders,
        ]);
        $view->layout('layouts.admin');

        return $view;
    }
}
