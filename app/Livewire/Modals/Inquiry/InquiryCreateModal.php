<?php

namespace App\Livewire\Modals\Inquiry;

use App\Livewire\Inquiry\InquiryList;
use App\Models\Employee;
use App\Models\Inquiry;
use App\Traits\AsModal;
use Livewire\Component;
use Livewire\WithFileUploads;

class InquiryCreateModal extends Component
{
    use AsModal , WithFileUploads;
    // use WithFileUploads;
    public $modal_id = 'inquiry-create-modal';

    public $modalTitle = 'Create Inquiry';

    public $empId;
    public $empNic;
    public $desc;
    public $file;

    public function beforeShow()
    {
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate([
            'file' => 'required|file|max:1024', // 1MB Max
        ]);

        $path = $this->file->store('uploads', 'public');

        // Save file info to the database
        Inquiry::create([
            'emp_id' => $this->empId,
            'nic' => $this->empNic,
            'file_name' => $this->file->getClientOriginalName(),
            'path' => $path,
            'desc' => $this->desc,
            // 'sta' => $this->desc,
        ]);

        $this->closeBSModal();
        $this->reset();
        $this->sweetToast('Created','Inquiry Created Successfully','success');
        $this->dispatch('refreshEvent')->to(InquiryList::class);
    }
    public function render()
    {

        $employees = Employee::with('section')->get();

        return view('livewire.modals.inquiry.inquiry-create-modal',[
            'employees' => $employees
        ]);
    }
}
