import React, { useState, useEffect, useCallback } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import FullCalendar, {
    EventApi,
    EventClickArg,
    EventContentArg,
    EventInput,
} from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import allLocales from "@fullcalendar/core/locales-all";

type Matter = {
    id: number;
    name: string;
    client_id: number;
    start_at: string;
    end_at: string;
    created_at: Date;
    updated_at: Date;
};

const createApiUrl = (pathname: string) => {
    return `${location.protocol}//${location.host}/api/${pathname}`;
};

const renderEventContent = (eventContent: EventContentArg) => (
    <>
        <b>{eventContent.timeText}</b>
        <i>{eventContent.event.title}</i>
    </>
);

const Calendar = () => {
    const [initialEvents, setInitialEvents] = useState<EventInput[]>([]);
    // const [currentEvents, setCurrentEvents] = useState<EventApi[]>([]);

    useEffect(() => {
        (async () => {
            const response = await axios.get(createApiUrl("calendar"));
            const data: Matter[] = response.data;
            const eventInput: EventInput[] = data.map((matter) => ({
                id: matter.id.toString(),
                title: matter.name,
                start: matter.start_at,
                end: matter.end_at,
            }));
            setInitialEvents(eventInput);
        })();
    }, []);

    const handleEventClick = useCallback((clickInfo: EventClickArg) => {
        window.location.href = `${location.protocol}//${location.host}/matters/${clickInfo.event.id}`;
    }, []);

    return (
        <FullCalendar
            plugins={[dayGridPlugin, timeGridPlugin]}
            initialView="dayGridMonth"
            events={initialEvents}
            locales={allLocales}
            locale="ja"
            editable={true}
            eventClick={handleEventClick}
            eventContent={renderEventContent}
            headerToolbar={{
                start: "prev,next today",
                center: "title",
                end: "dayGridMonth,timeGridWeek,timeGridDay",
            }}
            businessHours={true}
            contentHeight="auto"
        />
    );
};

ReactDOM.render(<Calendar />, document.getElementById("calendar"));
