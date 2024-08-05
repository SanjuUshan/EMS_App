<?php

namespace App\Livewire\Inquiry;

use App\Livewire\Modals\Inquiry\InquiryViewModal;
use App\Models\Inquiry;
use App\Traits\CommonFeatures;
use Livewire\Component;
use Livewire\WithPagination;

class InquiryList extends Component
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

    public function inquiryViewModal($inquiryId): void
    {

        $this->dispatch('show', $inquiryId)->to(InquiryViewModal::class);

    }
    public function render()
    {
        $inquiries = Inquiry::with('employee')->get();


        /** @var \Illuminate\View\View $view */
        $view = view('livewire.inquiry.inquiry-list',[
            'inquiries' => $inquiries,
        ]);
        $view->layout('layouts.admin');

        return $view;
    }
}
