<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\CalendarEvent;
use WireUi\Traits\Actions;
use DB;
class Calendar extends Component
{
    use Actions;
    public $eventModal = false;

    public $events = [];
    public $event_name;
    public $event_desc;
    public $start_date;
    public $end_date;

    public function mount()
    {
        $this->events = $this->getFormattedEvents();
    }

    public function render()
    {
        return view('livewire.admin.calendar');
    }

    public function addEvent()
    {
        $this->validate([
            'event_name' => 'required',
            'event_desc' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if($this->start_date > $this->end_date)
        {
            $this->dialog()->error(
                $title = 'Invalid Dates',
                $description = 'End date must not be less than the start date'
            );
        }else{

            DB::beginTransaction();
            $event = CalendarEvent::create([
                'user_id' => auth()->user()->id,
                'event_name' => $this->event_name,
                'event_description' => $this->event_desc,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
            ]);
            DB::commit();

            $this->dialog()->success(
                $title = 'Success',
                $description = 'Event added successfully'
            );

            $this->reset('event_name', 'event_desc', 'start_date', 'end_date');
            $this->eventModal = false;

            $this->dispatchBrowserEvent('refreshCalendar', [
                'events' => $this->getFormattedEvents()
            ]);
        }

    }

    private function getFormattedEvents()
    {
        $events = CalendarEvent::query()->get();
        $formattedEvents = [];
        foreach ($events as $event) {
            $formattedEvents[] = [
                'title' => $event->event_name,
                'start' =>  $event->start_date,
                'end' => $event->start_date,
                'description' => $event->event_description,
            ];
        }
        return $formattedEvents;
    }
}
