<div>
    <div class="flex justify-end py-3">
        <x-button positive label="Add Event" class="right" wire:click="$set('eventModal', true)"/>
    </div>
    <div wire:ignore>
    <div id="calendar"></div>
    </div>

    <x-modal align="center" wire:model.defer="eventModal">
        <x-card title="Event">
            <div class="space-y-3">
                <x-input label="Name" placeholder="Event Name" wire:model.defer="event_name"/>
                <x-textarea label="Description" placeholder="Event Description" wire:model.defer="event_desc"/>
            </div>

            <div class="grid grid-cols-2 gap-x-3 mt-4">
                <div class="col-span-1">
                    <x-datetime-picker without-time max="{{$end_date}}"
                    label="Start Date"
                    placeholder="Start Date"
                    wire:model="start_date"
                />
                </div>
                <div class="col-span-1">
                    <x-datetime-picker without-time min="{{$start_date}}"
                    label="End Date"
                    placeholder="End Date"
                    wire:model="end_date"
                />
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Submit" wire:click="addEvent"/>
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
            events: {!! json_encode($events) !!},
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
