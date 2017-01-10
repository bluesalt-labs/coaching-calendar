class coachingCalendar
{
    constructor(year, month, day) {
        this.dateToday = new moment();
        this.calendarDate = new moment(year, month - 1, day);
    }

    /**
     * gets appointments via API
     */
    getAppointments() {

    }

    /**
     * refreshes displayed appointments
     */
    refreshAppointments() {

    }

    /**
     * removes displayed appointments on the calendar
     */
    clearAppointments() {

    }

    /**
     * Selects previous month and refreshes calendar
     */
    onPrevMonthClick() {

    }

    /**
     * Selects next month and refreshes calendar
     */
    onNextMonthClick() {

    }
};




