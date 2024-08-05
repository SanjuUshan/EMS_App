<?php

namespace App\Livewire\Modals\Event;

use App\Livewire\Events\EventManageModal;
use App\Models\Event;
use App\Traits\AsModal;
use Livewire\Component;

class EventCreateModal extends Component
{
    use AsModal;

    public $modal_id = 'event-create-modal';

    public $modalTitle = 'Create Events';

    public $name;
    public $startDate;
    public $endDate;


    public function createEvent()
    {
        $this->validate([
            'name' => 'required',
            'startDate' => 'required',
            // 'endDate' => 'required',
        ]);

        $event = Event::create([
            'name' => $this->name,
            'start_time' => $this->startDate,
            'end_time' => $this->endDate,

        ]);

        $this->closeBSModal();
        $this->reset();
        $this->sweetToast('Created', 'Event Created Successfully', 'success');
        $this->dispatch('refreshEvent')->to(EventManageModal::class);
    }
    public function render()
    {
        return view('livewire.modals.event.event-create-modal');
    }
}
