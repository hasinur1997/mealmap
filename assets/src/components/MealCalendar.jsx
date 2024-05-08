import { __ } from "@wordpress/i18n";
import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";

const MealCalendar = () => {
    const events = [
        { title: 'event 1', date: '2024-04-24' },
        { title: 'event 2', date: '2024-04-25' }
    ];

    return (
        <div className={'card'}>
            <h1 className={'text-xl font-semibold'}>
                {__('Meal Calendar', 'meal-map')}
            </h1>

            <div className={'mt-4'}>
                <FullCalendar
                    plugins={[dayGridPlugin]}
                    initialView="dayGridMonth"
                    events={events}
                />
            </div>
        </div>
    );
}

export default MealCalendar;