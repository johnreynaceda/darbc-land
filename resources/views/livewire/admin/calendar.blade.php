<div>
  <div class="flex justify-end py-3 px-5">
    <x-button positive label="Add Event" icon="plus" class="right" wire:click="$set('eventModal', true)" />
  </div>
  <div wire:ignore class="p-3">
    <div id="calendar"></div>
  </div>

  <x-modal align="center" wire:model.defer="eventModal" max-width="lg">
    <x-card title="Create Event">
      <div class="space-y-3">
        <x-input label="Name" placeholder="Event Name" wire:model.defer="event_name" />
        <x-textarea label="Description" placeholder="Event Description" wire:model.defer="event_desc" />
      </div>

      <div class="grid grid-cols-2 gap-x-3 mt-4">
        <div class="col-span-1">
          <x-datetime-picker timezone="Asia/Manila" without-time max="{{ $end_date }}" label="Start Date" placeholder="Start Date"
            wire:model="start_date" />
        </div>
        <div class="col-span-1">
          <x-datetime-picker timezone="Asia/Manila" without-time min="{{ $start_date }}" label="End Date" placeholder="End Date"
            wire:model="end_date" />
        </div>
      </div>

      <x-slot name="footer">
        <div class="flex justify-end gap-x-4">
          <x-button flat label="Cancel" x-on:click="close" />
          <x-button indigo right-icon="arrow-right" spinner="addEvent" label="Submit" wire:click="addEvent" />
        </div>
      </x-slot>
    </x-card>
  </x-modal>

  <x-modal align="center" wire:model.defer="updateModal">
    <x-card title="Update Event">
      <div class="space-y-3">
        <x-input label="Name" placeholder="Event Name" wire:model.defer="update_event_name" />
        <x-textarea label="Description" placeholder="Event Description" wire:model.defer="update_event_desc" />
      </div>

      <div class="grid grid-cols-2 gap-x-3 mt-4">
        <div class="col-span-1">
          <x-datetime-picker without-time timezone="Asia/Manila" max="{{ $update_end_date }}" label="Start Date" placeholder="Start Date"
            wire:model="update_start_date" />
        </div>
        <div class="col-span-1">
          <x-datetime-picker without-time timezone="Asia/Manila" min="{{ $update_start_date }}" label="End Date" placeholder="End Date"
            wire:model="update_end_date" />
        </div>
      </div>

      <x-slot name="footer">
        <div class="flex justify-between">
          <div class="flex justify-start">
            <x-button negative label="Delete"
              x-on:confirm="{
                            title: 'Are you sure you want to delete this event?',
                            icon: 'question',
                            method: 'deleteEvent',
                        }" />
          </div>
          <div class="flex justify-end gap-x-4">
            <x-button flat label="Cancel" x-on:click="close" />
            <x-button primary label="Submit"
              x-on:confirm="{
                            title: 'Are you sure you want to update this event?',
                            icon: 'question',
                            method: 'updateEvent',
                        }" />
          </div>
        </div>

      </x-slot>
    </x-card>
  </x-modal>

  @push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          displayEventTime: false,
          events: {!! json_encode($events) !!},
          eventClick: function(info) {
            Livewire.emit('calendarEventClicked', info.event.id);
          },
        });
        calendar.render();
        window.addEventListener('refreshCalendar', event => {
          console.log(event.detail);
          calendar.batchRendering(() => {
            calendar.getEvents().forEach(event => event.remove());
            calendar.addEventSource(event.detail.events);
          });
        });

      });
    </script>
  @endpush
</div>
