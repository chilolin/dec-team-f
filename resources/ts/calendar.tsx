import React, { useState, useEffect } from "react";
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

    useEffect(() => {
        (async () => {
            const response = await axios.get(createApiUrl("calendar"));
            const data: Matter[] = response.data;
            const eventInput: EventInput[] = data.map((matter) => ({
                id: matter.id.toString(),
                title: matter.name,
                start: new Date(matter.start_at),
                // end: matter.end_at,
            }));
            setInitialEvents(eventInput);
        })();
    }, []);

    return (
        <div>
            <FullCalendar
                plugins={[dayGridPlugin]}
                initialView="dayGridMonth"
                initialEvents={initialEvents}
                locales={allLocales}
                locale="ja"
            />
        </div>
    );
};

ReactDOM.render(<Calendar />, document.getElementById("app"));
