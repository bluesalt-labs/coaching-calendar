var CoachingCalendar = function(year, month, day) {
    this.dateToday = new moment();
    this.calendarDate = new moment( {year: year, month: (month - 1), day: day} );

    /**
     * initializes the calendar. Called when a new CoachingCalendar object is created
     */
    this.init = function() {
        this.refreshCalendar();
    };

    /**
     * Updates years available in the '#year-dd' select menu
     */
    this.updateYearDDSelections = function() {
        var innerHTML = '';
        var year = this.calendarDate.get('year');

        innerHTML += '<option value="' + (year - 1) + '">' + (year - 1) + '</option>';
        innerHTML += '<option value="' + (year) + '" selected="selected">' + (year) + '</option>';
        innerHTML += '<option value="' + (year + 1) + '">' + (year + 1) + '</option>';

        document.getElementById('year-dd').innerHTML = innerHTML;
    };

    /**
     * Refreshes the displayed calendar
     */
    this.refreshCalendar = function() {
        document.getElementById('month-dd').value = this.calendarDate.month();
        this.updateYearDDSelections();

        /*
         * I might want to create an array of element id's to days in month for reference.
         * either that or add an id to each span with the day of the month. however, to my
         * knowledge searching and modifying the DOM is more taxing than referencing an array.
         */

        var thisYear    = this.calendarDate.get('year');
        var thisMonth   = this.calendarDate.get('month');
        var thisDay     = this.calendarDate.get('day');
        var tempMoment = new moment({
            year:   thisYear,
            month:  thisMonth,
            day:    thisDay
        });

        var firstDayOfWeek = tempMoment.day();
        var daysInMonth = tempMoment.daysInMonth();

        // See if we should shift the calendar down a week
        if(41 - (daysInMonth + firstDayOfWeek) > 8) { firstDayOfWeek += 7; }

        tempMoment.subtract(1, 'months').endOf('month').subtract(firstDayOfWeek, 'days');

        for(var i = 0; i <= firstDayOfWeek; i++){
            var d = document.getElementById('day-'+i);
            var dSpan = d.getElementsByClassName('day-num')[0];

            d.className += " outside-month";
            //d.addEventListener('click', this.onClick.bind(this));
            dSpan.innerHTML = tempMoment.date();

            tempMoment.add(1, 'days');
        }

        for(var i = firstDayOfWeek + 1; i < 42; i++) {
            var d = document.getElementById('day-'+i);
            var dSpan = d.getElementsByClassName('day-num')[0];

            if(tempMoment.month() != thisMonth) {
                //d.addEventListener('click', this.onClick.bind(this));
                d.className += " outside-month";
            }
            else {
                //d.removeEventListener('click', this.onClick.bind(this));
                //d.removeEventListener('click', this.onClick.bind(this));
                d.className = 'day';
            }
            dSpan.innerHTML = tempMoment.date();
            tempMoment.add(1, 'days');
        }
    };

    /**
     * gets appointments via API
     */
    this.getAppointments = function() {

    };

    /**
     * refreshes displayed appointments
     */
    this.refreshAppointments = function() {

    };

    /**
     * removes displayed appointments on the calendar
     */
    this.clearAppointments = function() {

    };

    /**
     * Selects previous month and refreshes calendar
     */
    this.onPrevMonthClick = function() {
        this.calendarDate.subtract(1, 'months');
        this.refreshCalendar();
    };

    /**
     * Selects next month and refreshes calendar
     */
    this.onNextMonthClick = function() {
        this.calendarDate.add(1, 'months');
        this.refreshCalendar();
    };

    /**
     * jumps to selected month and refreshes calendar
     */
    this.onMonthDDChange = function() {
        this.calendarDate.set('month', event.currentTarget.value);
        this.refreshCalendar();
    };

    /**
     * jumps to selected year and refreshes calendar
     */
    this.onYearDDChange = function() {
        this.calendarDate.set('year', event.currentTarget.value);
        this.refreshCalendar();
    };

    this.init();
};
