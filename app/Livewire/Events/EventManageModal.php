<?php

namespace App\Livewire\Events;

use App\Livewire\Modals\Event\EventCreateModal;
use App\Livewire\Modals\Event\EventEditModal;
use App\Models\Event;
use App\Traits\CommonFeatures;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

// use Log;

class EventManageModal extends Component
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

    public function openEventCreateModal(): void
    {
        $this->dispatch('show')->to(EventCreateModal::class);

    }
    public function openEventEditModal($eventId): void
    {
        $this->dispatch('show',$eventId)->to(EventEditModal::class);

    }
    public function deleteEvent($eventId): void
    {
        $event = Event::find($eventId);
        $event->delete();
    }

    public function render()
    {

        // $events = Event::all()->map(function ($event) {
        //     return [
        //         'id' => $event->id,
        //         'title' => $event->name,
        //         'start' => Carbon::parse($event->start_time)->setTimezone('Asia/Colombo')->toIso8601String(),
        //         'end' => Carbon::parse($event->end_time)->setTimezone('Asia/Colombo')->toIso8601String(),
        //     ];
        // });
        $events = Event::get();



        /** @var \Illuminate\View\View $view */
        $view = view('livewire.events.event-manage-modal', [
            'events' => $events,
        ]);
        $view->layout('layouts.admin');

        return $view;
    }

}
