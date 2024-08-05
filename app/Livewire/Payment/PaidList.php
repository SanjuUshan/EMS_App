<?php

namespace App\Livewire\Payment;

use App\Enums\PaymentStatus;
use App\Exports\ExportPayments;
use App\Livewire\Modals\Payment\PaymentCreateModal;
use App\Models\Payment;
use App\Traits\CommonFeatures;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class PaidList extends Component
{
    use CommonFeatures, WithPagination;

    public $search = '';
    public $branchSearch;
    public $genderSearch;
    public $fromDate;
    public $toDate;

    public $perPageCounts = [
        '3',
        '5',
        '10',
        '25',
        '50',
        '100',
    ];
    public $perPage = '7';
    public function openPaymentCreateModal(): void
    {
        $this->dispatch('show')->to(PaymentCreateModal::class);

    }

    public function exportPayments()
    {
        return Excel::download(new ExportPayments($this->search,$this->fromDate,$this->toDate,$this->genderSearch), 'Payments_Details.xlsx');
    }
    public function render()
    {

        $paidResultsQuery = Payment::with('employee')->where('status', PaymentStatus::PAID->value);

        if ($this->search) {
            $paidResultsQuery->whereHas('employee', function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile', 'like', '%' . $this->search . '%')
                    ->orWhere('nic', 'like', '%' . $this->search . '%')
                    ->orWhere('gender', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->fromDate && $this->toDate ) {

            $paidResultsQuery->whereBetween('pay_date',array($this->fromDate,$this->toDate));
        }

        $genders = [
            ['id' => '1', 'name' => 'Male'],
            ['id' => '2', 'name' => 'Female'],

        ];
        if ($this->genderSearch) {
            $paidResultsQuery->whereHas('employee', function ($query) {
                $query->where('gender', $this->genderSearch);
            });
        }

        $paidResults = $paidResultsQuery->paginate($this->perPage);

        // dd($paidResults);
        /** @var \Illuminate\View\View $view */
        $view = view('livewire.payment.paid-list', [
            'paidResults' => $paidResults,
            'genders' => $genders,
        ]);
        $view->layout('layouts.admin');

        return $view;
        // return view('livewire.payment.paid-list');
    }
}
