<div>
    <div id='calendar-container' class="p-2" wire:ignore>
        <div id='calendar'></div>
    </div>
</div>
@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>
<script>
    document.addEventListener('livewire:load', function() {
        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;
        var calendarEl = document.getElementById('calendar');
        var calendar = new Calendar(calendarEl, {
            locale: 'es',
            headerToolbar: {
                left: 'prev,next,today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            height: 'auto',
            events: JSON.parse(@this.events),
            dateClick(info) {
                @this.crear_intervencion_grupal(`${info.dateStr}T00:00:00`);
            },
            eventClick(info) {
                @this.edit_intervencion_grupal(info.event)
            },
            editable: true,
            selectable: false,
            displayEventTime: true,
        });
        calendar.render();
        Livewire.on(`refreshCalendar`, () => {
            calendar.refetchEvents()
        });
    });
</script>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
@endpush
