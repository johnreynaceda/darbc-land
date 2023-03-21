<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\CalendarEvent;
use WireUi\Traits\Actions;
use Carbon\Carbon;
use DB;
class Calendar extends Component
{
    use Actions;
    public $eventModal = false;
    public $updateModal = false;

    public $events = [];
    public $event_id;
    //create event
    public $event_name;
    public $event_desc;
    public $start_date;
    public $end_date;
    //update event
    public $update_event_name;
    public $update_event_desc;
    public $update_start_date;
    public $update_end_date;

    protected $listeners = ['calendarEventClicked' => 'openUpdateModal'];
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
                'start' => Carbon::parse($event->start_date)->utc()->toIso8601String(),
                'end' => Carbon::parse($event->end_date)->utc()->toIso8601String(),
                'description' => $event->event_description,
                'id' => $event->id,
            ];
        }
        return $formattedEvents;
    }

    public function openUpdateModal($id)
    {
       $this->event_id = $id;
       $event = CalendarEvent::find($this->event_id);
       $this->update_event_name = $event->event_name;
       $this->update_event_desc = $event->event_description;
       $this->update_start_date = $event->start_date;
       $this->update_end_date = $event->end_date;
       $this->updateModal = true;
    }

    public function updateEvent()
    {
        DB::beginTransaction();
        $event = CalendarEvent::find($this->event_id);
        $event->event_name = $this->update_event_name;
        $event->event_description = $this->update_event_desc;
        $event->start_date = $this->update_start_date;
        $event->end_date = $this->update_end_date;
        $event->save();
        DB::commit();

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Event updated successfully'
        );

        $this->reset('update_event_name', 'update_event_name', 'update_event_name', 'update_event_name');
        $this->updateModal = false;

        $this->dispatchBrowserEvent('refreshCalendar', [
            'events' => $this->getFormattedEvents()
        ]);
    }

    public function deleteEvent()
    {
        DB::beginTransaction();
        $event = CalendarEvent::find($this->event_id);
        $event->delete();
        DB::commit();

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Event successfully deleted'
        );

        $this->reset('update_event_name', 'update_event_name', 'update_event_name', 'update_event_name');
        $this->updateModal = false;

        $this->dispatchBrowserEvent('refreshCalendar', [
            'events' => $this->getFormattedEvents()
        ]);

    }
}
