<?php

namespace App\Livewire\Modals\Event;

use App\Livewire\Events\EventManageModal;
use App\Models\Event;
use App\Traits\AsModal;
use Carbon\Carbon;
use Livewire\Component;

class EventEditModal extends Component
{
    use AsModal;

    public $modal_id = 'event-edit-modal';

    public $modalTitle = 'Edit Events';

    public $name;
    public $startDate;
    public $endDate;
    public $event;

    public function beforeShow(Event $event)
    {
        $this->event = $event;
        $this->name = $event->name;
        $this->startDate = Carbon::parse($event->start_date)->toDateString();
        $this->endDate = Carbon::parse($event->end_date)->toTimeString();

        $this->resetValidation();

    }
    public function updateEvent()
    {
        $this->validate([
            'name' => 'required',
            'startDate' => 'required',
        ]);
        $this->event->update([
            'name' => $this->name,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);

        $this->closeBSModal();
        $this->reset();
        $this->sweetToast('Updated','Event Updated Successfully','success');
        $this->dispatch('refreshEvent')->to(EventManageModal::class);
    }
    public function render()
    {
        return view('livewire.modals.event.event-edit-modal');
    }
}
