<?php

namespace App\Livewire\Modals\Payment;

use App\Enums\PaymentStatus;
use App\Livewire\Payment\PaidList;
use App\Models\Employee;
use App\Models\Payment;
use App\Traits\AsModal;
use Livewire\Component;

class PaymentCreateModal extends Component
{
    use AsModal;

    public $modal_id = 'payment-create-modal';

    public $modalTitle = 'Create Payment';

    public $empId;
    public $paidDate;
    public $deductionAmount;
    public $taxRate;
    public $bonusAmount;
    public $otAmount;
    public $amount;
    public $payMode;
    public $empDetails = [];

    public function createPayment()
    {
        $this->validate([
            'empId' => 'required',
            'paidDate' => 'required',
            // 'deductionAmount' => 'required',
            // 'taxRate' => 'required',
            // 'bonusAmount' => 'required',
            // 'otAmount' => 'required',
            'amount' => 'required|numeric',
            'payMode' => 'required',

        ]);

        $epf = ($this->amount * 8) / 100;
        // $etf = ($this->amount * 20) / 100;
        $totalAmount = $this->amount + $this->otAmount +$this->bonusAmount - $this->deductionAmount - $epf -
        ($this->amount * $this->taxRate)/100;

        $payment = Payment::create([
            'emp_id' => $this->empId,
            'pay_date' => $this->paidDate,
            'basic_salary' => $this->amount,
            'deduction_amount' => $this->deductionAmount,
            'tax' => $this->taxRate,
            'bonus_amount' => $this->bonusAmount,
            'ot_amount' => $this->otAmount,
            'pay_amount' => $totalAmount,
            'pay_mode' => $this->payMode,
            // 'etf' => $etf,
            'epf' => $epf,
            'status' => PaymentStatus::PAID->value,

        ]);

        $this->closeBSModal();
        $this->reset();
        $this->sweetToast('Created','Payment Created Successfully','success');
        $this->dispatch('refreshEvent')->to(PaidList::class);


    }
    public function render()
    {


        $this->empDetails = Employee::select('id','first_name','nic','status','path')->where('id',$this->empId)->get();;

        $employees = Employee::all();
        return view('livewire.modals.payment.payment-create-modal',[
            'employees' => $employees,
        ]);
    }
}
