<?php

namespace App\Livewire\Modals\Payment;

use App\Enums\PaymentStatus;
use App\Models\Employee;
use App\Models\Payment;
use App\Traits\AsModal;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PaidSalaryViewModal extends Component
{
    use AsModal;

    public $modal_id = 'paid-salary-view-modal';

    public $modalTitle = 'Salary Info';

    public $empId;
    public $empNic;
    public $employee;
    // public $employeeREgId;
    // public $employeeREgNic;
    public $paidEmployees;
    public $password;


    public function searchSalaryInfo()
    {

        $this->validate([
            'password' => 'required',
        ]);

        $query = Payment::with('employee')
            ->where('status', PaymentStatus::PAID->value);

        if ($this->empId) {
            $query->whereHas('employee', function ($q) {
                $q->where('id', $this->empId);
            });
        }

        if ($this->empNic) {
            $query->whereHas('employee', function ($q) {
                $q->where('nic', $this->empNic);
            });
        }

        $employee = Employee::find($this->empId);


        if (Hash::check($this->password, $employee->password)) {
            $this->paidEmployees = $query->latest()->first();
        }

    }
    public function render()
    {

        $employees = Employee::all();

        return view('livewire.modals.payment.paid-salary-view-modal', [
            'employees' => $employees,
            'paidEmployees' => $this->paidEmployees,
          
        ]);
    }
}
