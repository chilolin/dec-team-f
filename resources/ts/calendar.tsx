import React, { useState, useEffect, useCallback } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import FullCalendar, { EventApi, EventInput } from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
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

    // const handleEvents = useCallback((events: EventApi[]) => {
    //     console.log("events:", events); // 確認用
    //     setCurrentEvents(events);
    // }, []);

    return (
        <div>
            <FullCalendar
                plugins={[dayGridPlugin]}
                initialView="dayGridMonth"
                events={initialEvents}
                // eventsSet={handleEvents}
                locales={allLocales}
                locale="ja"
            />
        </div>
    );
};

ReactDOM.render(<Calendar />, document.getElementById("calendar"));
