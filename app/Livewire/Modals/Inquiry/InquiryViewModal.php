<?php

namespace App\Livewire\Modals\Inquiry;

use App\Models\Employee;
use App\Models\Inquiry;
use App\Traits\AsModal;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class InquiryViewModal extends Component
{
    use AsModal , WithFileUploads;
    // use WithFileUploads;
    public $modal_id = 'inquiry-view-modal';

    public $modalTitle = 'View Inquiry';

    public $empId;
    public $empNic;
    public $desc;
    public $file;
    public $inquiry;
    public $inquiryId;

    public function beforeShow(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
        $this->inquiryId = $inquiry->id;
        $this->empId = $inquiry->employee->first_name.$inquiry->employee->middle_name;
        $this->empNic = $inquiry->employee->nic;
        $this->desc = $inquiry->desc;

        $this->resetValidation();
    }

    public function download($downloadId)
    {
        // $file = Inquiry::find($downloadId)->file;
        // dd($downloadId);
        $file = Inquiry::find($downloadId);

        if ($file && Storage::disk('public')->exists($file->path)) {
            return Storage::disk('public')->download($file->path, $file->file_name);
        }
    }

    public function render()
    {

        $employees = Inquiry::with('employee')->where('id',$this->inquiryId)->get();
        return view('livewire.modals.inquiry.inquiry-view-modal',[
            'employees' => $employees,
        ]);
    }
}
