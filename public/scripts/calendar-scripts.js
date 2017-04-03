var CoachingCalendar = function(year, month, day) {
    this.apiUrl = '/api/v1/';
    this.dateToday = new moment();
    this.calendarDate = new moment( {year: year, month: (month - 1), day: day} );
    this.dateSelected = new moment();

    this.cacheArr = [];

    //this.userTypes = [];
    //this.apptTypes = [];

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
     * Updates the agenda view with appointment data from the cache
     * for the current date value of this.dateSelected
     */
    this.updateAgenda = function() {
        document.getElementById('agenda-header').innerHTML = this.dateSelected.format('dddd[,] MMM Do');
        var agendaItems = document.getElementById('agenda-items');

        agendaItems.innerHTML = "";

        var y = this.dateSelected.year();
        var m = this.dateSelected.month();
        var d = this.dateSelected.date();

        for(var i in this.cacheArr[y][m][d]['appointments']) {
            var item = this.getAgendaItemHTML(this.cacheArr[y][m][d]['appointments'][i]);
            agendaItems.appendChild(item);
        }
    };

    /**
     * Creates an HTML element to attach to the agenda container from an appointment in the cache array
     * todo: this obviously isn't finished.
     * @param appointment[]
     * @returns {Element}
     */
    this.getAgendaItemHTML = function(appointment) {
        var item = document.createElement('div');
        item.className = 'agenda-item';

        item.innerHTML = appointment.startDateTime.format();

        return item;
    };

    /**
     * Refreshes the displayed calendar
     */
    this.refreshCalendar = function() {
        document.getElementById('month-dd').value = this.calendarDate.month();
        this.updateYearDDSelections();

        // Hide today button if this is the current month
        if(this.calendarDate.isSame(this.dateToday, 'month')) { document.getElementById('btn-today').className = "month-is-cur"; }
        else { document.getElementById('btn-today').className = ""; }

        var thisYear    = this.calendarDate.get('year');
        var thisMonth   = this.calendarDate.get('month');
        var tempMoment = new moment({
            year:   thisYear,
            month:  thisMonth,
            day:    1
        });

        // Create this year's cache if it doesn't exist
        if(this.cacheArr[thisYear] === undefined) { this.cacheArr[thisYear] = []; }

        // Clear this month's cache or create it if it doesn't exist
        //if(this.cacheArr[thisYear][thisMonth] === undefined) { this.cacheArr[thisYear][thisMonth] = []; }
        this.cacheArr[thisYear][thisMonth] = [];


        var firstDayOfWeek = tempMoment.day();
        var daysInMonth = tempMoment.daysInMonth();

        // See if we should shift the calendar down a week
        if(41 - (daysInMonth + firstDayOfWeek) > 8) { firstDayOfWeek += 7; }

        tempMoment.subtract(1, 'months').endOf('month').subtract(firstDayOfWeek - 1, 'days');

        for(var i = 0; i <= firstDayOfWeek; i++){
            var d = document.getElementById('day-'+i);
            var dSpan = d.getElementsByClassName('day-num')[0];

            d.className = 'day outside-month prev-month';

            d.onclick = (function(e) {
                this.onDayClick(e.target);
            }).bind(this);

            dSpan.innerHTML = tempMoment.date();

            tempMoment.add(1, 'days');
        }

        // We didn't need to add a day the last time through the loop above. Subtract that day.
        tempMoment.subtract(1, 'days');

        for(i = firstDayOfWeek; i < 42; i++) {
            d = document.getElementById('day-'+i);
            dSpan = d.getElementsByClassName('day-num')[0];

            var tempDay = tempMoment.date();

            d.onclick = (function(e) {
                this.onDayClick(e.target);
            }).bind(this);

            if(tempMoment.month() != thisMonth) {
                d = document.getElementById('day-'+i);
                d.className = 'day outside-month next-month';
            } else {
                //d.removeEventListener('click', this.onClick.bind(this));
                //d.removeEventListener('click', this.onClick.bind(this));
                if(this.cacheArr[thisYear][thisMonth][tempDay] === undefined) {
                    this.cacheArr[thisYear][thisMonth][tempDay] = [];
                    this.cacheArr[thisYear][thisMonth][tempDay]['appointments'] = [];
                }
                this.cacheArr[thisYear][thisMonth][tempDay]['id'] = i;
                this.cacheArr[thisYear][thisMonth][tempDay]['ofWeek']  = tempMoment.day();
                d.className = 'day';

                if(tempMoment.isSame(this.dateToday, 'day')) {
                    d.className += ' today';
                    this.cacheArr[thisYear][thisMonth][tempDay]['isToday'] = true;
                } else {
                    this.cacheArr[thisYear][thisMonth][tempDay]['isToday'] = false;
                }
            }

            dSpan.innerHTML = tempMoment.date();
            tempMoment.add(1, 'days');
        }

        this.refreshAppointments();
        //this.updateAgenda(); // todo: this doesn't go here, right?
    };

    /**
     * gets appointments for the selected via API
     */
    this.getAppointments = function() {
        var thisYear    = this.calendarDate.get('year');
        var thisMonth   = this.calendarDate.get('month');
        var lastDay     = this.calendarDate.daysInMonth();

        var startDate = new moment({
            year:   thisYear,
            month:  thisMonth,
            day:    1
        });

        var endDate = new moment({
            year:   thisYear,
            month:  thisMonth,
            day:    lastDay
        });

        var reqData = {
            start_date: startDate.toISOString(),
            end_date: endDate.toISOString()
        };

        this.apiGet('appointment', 'getByDateRange', reqData, this.getAppointmentsCallback.bind(this));
    };

    /**
     * refreshes displayed appointments
     */
    this.refreshAppointments = function() {
        this.clearAppointments();
        this.getAppointments();
    };

    /**
     * removes displayed appointments on the calendar
     */
    this.clearAppointments = function() {
        // todo: clear from cache (this.cacheArr)?
        var toRemove = document.getElementsByClassName('cal-event-count');
        var removeCap = 999;

        while( (toRemove.length > 0) && (removeCap > 0) ) {
            toRemove[0].parentNode.removeChild(toRemove[0]);
            removeCap--;
        }
    };

    /**
     * Callback for getAppointments that (will cache) appointments and adds them to the calendar
     * @param data
     */
    this.getAppointmentsCallback = function(data) {
        if(data.length > 0) {
            var y = this.calendarDate.get('year');
            var m = this.calendarDate.get('month');

            // Add elements to the cache
            for(var key in data) {
                var startDate = new moment(data[key]['start_datetime'], 'YYYY-MM-DD HH:mm:ss');

                // Add this appointment to the cacheArr
                this.cacheArr[y][m][startDate.format('D')]['appointments'].push({
                    startDateTime: startDate,
                    endDateTime: new moment(data[key]['end_datetime']),
                    type: data[key]['type'],
                    status: data[key]['status'],
                    coachUserId: (data[key]['coach_user_id'] || null),
                    customerUserId: (data[key]['member_user_id'] || null)
                });
            }

            // Iterate through each day for the current month and add number of appointments to each day on the calendar
            for(var d in this.cacheArr[y][m]) {

                if(this.cacheArr[y][m][d]['appointments'].length > 0){
                    var dayElID = this.findDayIDByDate( new moment({ year: y, month: m, day: d}) );
                    var appointments = {};

                    // Count the number of appointments of each type
                    if(dayElID !== "") {
                        for(var apptID in this.cacheArr[y][m][d]['appointments']) {

                            var appointment = this.cacheArr[y][m][d]['appointments'][apptID];

                            if(appointments[ this.getApptStatusText(appointment['status']) ] == undefined) {
                                appointments[ this.getApptStatusText(appointment['status']) ] = 0;
                            }
                            appointments[ this.getApptStatusText(appointment['status']) ]++;
                        }

                        var dayEl = document.getElementById(dayElID);
                        // Add appointment numbers to the calendar
                        for (var typeName in appointments) {
                            var eventCont = document.createElement('h4');
                            eventCont.className = 'cal-event-count label-' + typeName;
                            var eventEl = document.createElement('span');
                            eventEl.className = 'label';
                            eventEl.innerText = typeName.capitalize();

                            var numEl = document.createElement('span');
                            numEl.className = 'badge';
                            numEl.innerHTML = appointments[typeName];

                            eventCont.appendChild(eventEl);
                            eventCont.appendChild(numEl);
                            dayEl.appendChild(eventCont);
                        }


                        /*
                        // Add appropriate class names
                        eventEl.className = ("cal-event " + this.getApptStatusText(data[key]['status'])).trim();
                        eventEl.innerHTML = startDate.format('hh:mm a');

                        dayEl.appendChild(eventEl);
                        */
                    }
                }
            }
        }
    };


    /**
     *
     * @param d - start date (Moment object)
     * @returns {*|string}
     */
    this.findDayIDByDate = function(d) {
        var dayNum = this.cacheArr[d.get('year')][d.get('month')][d.get('date')]['id'];

        if(dayNum) { return 'day-' + dayNum; }
        else { return ""; }
    };

    this.getApptStatusText = function(statusID) {
        switch( parseInt(statusID) ) {
            case 0 : // const STATUS_AVAILABLE  = 0;
                return "available";
            case 1: // const STATUS_REQUESTED  = 1;
                return "requested";
            case 2: // const STATUS_CONFIRMED  = 2;
                return "confirmed";
            case 3: // const STATUS_CANCELED   = 3;
                return "canceled";
            default:
                return "";
        }
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

    /**
     * Jumps the calendar to the current month
     */
    this.onTodayClick = function() {
        this.calendarDate.set({
            'year':     this.dateToday.get('year'),
            'month':    this.dateToday.get('month'),
            'date':      1
        });
        this.refreshCalendar();
    };

    /**
     * Event fired when a calendar day box is clicked
     *
     * todo: this whole process feels dirty to me. I think it could be cleaned up and optimized.
     * @param target
     */
    this.onDayClick = function(target) {
        if(target) {
            this.setSelectedDay(target);
            this.selectDayOnCalendar();
        }

        this.updateAgenda();
    };

    this.setSelectedDay = function(dayEl) {
        // get the day, month, and year from the dayID (if it's valid)
        var y   = this.calendarDate.year();
        var m   = this.calendarDate.month();
        var d   = 0;

        if(dayEl) {
            try { d = parseInt( dayEl.getElementsByClassName('day-num')[0].innerHTML ); }
            catch(e) {}

            //console.log("day: " + d); // debug
            if(d > 0) {
                this.dateSelected.year(y);
                this.dateSelected.month(m);
                this.dateSelected.date(d);

                // check if the previous or next month was clicked
                // todo: create alternative for browsers that don't support classList
                if(dayEl.classList.contains('prev-month')) {
                    this.dateSelected.subtract(1, 'months');
                    this.onPrevMonthClick();
                }
                else if(dayEl.classList.contains('next-month')) {
                    this.dateSelected.add(1, 'months');
                    this.onNextMonthClick();
                }

                //console.log("date Selected: " + this.dateSelected.format()); // debug

            } else {
                console.log("invalid day!: " + dayEl.id); // debug
            }
        }


        this.selectDayOnCalendar = function() {
            // todo: if no date is selected, don't show anything in the agenda view.
            var dayEls = document.getElementsByClassName('day');

            for(var i in dayEls) {
                if(dayEls[i].classList){
                    dayEls[i].classList.remove('active');

                    var d = parseInt( dayEls[i].getElementsByClassName('day-num')[0].innerHTML );
                    if(
                        d == this.dateSelected.date() &&
                        !dayEls[i].classList.contains('prev-month') &&
                        !dayEls[i].classList.contains('next-month')
                    ) {
                        dayEls[i].className += ' active';
                    }
                }
            }
        };

        // set this.dateSelected
        // deselect all days on the calendar (remove the selected class name)
        // add selected class name to the day selected
        // update the agenda view

    };

    this.apiGet = function(model, action, args, callback) {
        this.apiRequest('GET', model, action, args, callback);
    };

    this.apiPost = function(model, action, args, callback) {
        this.apiRequest('POST', model, action, args, callback);
    };

    this.apiRequest = function(method, model, action, args, callback) {
        if(!(model.length > 0)) {
            console.log("Request failed: Must specify model!");
            callback('');
            return;
        }

        if(!(action.length > 0)) {
            console.log("Request failed: Must specify action!");
            callback('');
            return;
        }

        var url = this.apiUrl + model + '/' + (action == 'all' ? '' : action + '/');

        if(method === 'GET' && args != null) {
            var urlAdd = '?';
            for(var key in args) {
                urlAdd += key + '=' + encodeURIComponent(args[key]) + '&';
            }
            url += urlAdd.slice(0, -1);
        }

        var xhr = new XMLHttpRequest();
        xhr.open(method, url, true);
        xhr.responseType = 'json';
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    callback(xhr.response);
                } else {
                    console.log('Request failed.  Returned status of ' + xhr.status);
                    callback('');
                }
            }
        };

        if(method === 'POST' && args != null) { xhr.send(JSON.stringify(args)); }
        else { xhr.send(); }
    };

    this.init();
};

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
};

/*

// this should extract the number from a day ID, if I ever need this
if(/(day-)\d+/.test(dayID)) {
    var day = parseInt( dayID.replace('day-', '') );
}
 */
