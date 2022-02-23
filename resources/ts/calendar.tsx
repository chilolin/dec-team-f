import React from "react";
import ReactDOM from "react-dom";
import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
import allLocales from "@fullcalendar/core/locales-all";

const Calendar = () => {
    return (
        <div>
            <FullCalendar
                plugins={[dayGridPlugin]}
                initialView="dayGridMonth"
                locales={allLocales}
                locale="ja"
            />
        </div>
    );
};

ReactDOM.render(<Calendar />, document.getElementById("app"));
