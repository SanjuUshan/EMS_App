<?php

namespace App\Livewire\User;

use App\Livewire\Modals\Employee\EmployeeViewModal;
use App\Livewire\Modals\Event\EventViewModal;
use App\Livewire\Modals\Inquiry\InquiryCreateModal;
use App\Livewire\Modals\Leave\LeaveCreateModal;
use App\Livewire\Modals\Payment\PaidSalaryViewModal;
use App\Traits\CommonFeatures;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class UserDashboard extends Component
{
    use CommonFeatures, WithPagination;


    public function openLeaveCreateModal(): void
    {
        $this->dispatch('show')->to(LeaveCreateModal::class);

    }
    public function openPaidSalaryViewModal(): void
    {
        $this->dispatch('show')->to(PaidSalaryViewModal::class);

    }
    public function openEventViewModal(): void
    {
        $this->dispatch('show')->to(EventViewModal::class);

    }
    public function openInqueryCreateModal(): void
    {
        $this->dispatch('show')->to(InquiryCreateModal::class);

    }






    public function render()
    {
        return view('livewire.user.user-dashboard');
    }
}
