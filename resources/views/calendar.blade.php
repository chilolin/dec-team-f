<x-app-layout>
    <style>
        .calendar {
            width: 100%;
        }
        .fc .fc-h-event {
            height: 21px;
            font-size: 12px;
            letter-spacing: .4px;
            padding: 0 8px;
            line-height: 20px;
        }
    </style>
    <div class="container">
        <div id="calendar" class="calendar"></div>
    </div>
    <script src="{{ mix('js/calendar.js') }}"></script>
</x-app-layout>
