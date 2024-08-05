<?php

namespace App\Livewire\Modals\Event;

use App\Models\Event;
use App\Traits\AsModal;
use Carbon\Carbon;

use Livewire\Component;

class EventViewModal extends Component
{
    use AsModal;

    public $modal_id = 'event-view-modal';

    public $modalTitle = 'Events';

    public $name;
    public $startDate;
    public $endDate;
    public $event;

    // public function beforeShow(Event $event)
    // {
    //     $this->event = $event;
    //     $this->name = $event->name;
    //     $this->startDate = Carbon::parse($event->start_date)->toDateString();
    //     $this->endDate = Carbon::parse($event->end_date)->toTimeString();

    //     $this->resetValidation();

    // }
    public function render()
    {
        $events = Event::get();

        return view('livewire.modals.event.event-view-modal',[
            'events' => $events,
        ]);
    }
}
