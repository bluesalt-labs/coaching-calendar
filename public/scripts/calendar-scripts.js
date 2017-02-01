var CoachingCalendar = function(year, month, day) {
    this.apiUrl = '/api/v1/';
    this.dateToday = new moment();
    this.calendarDate = new moment( {year: year, month: (month - 1), day: day} );

    this.cacheArr = [];

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

        // Create this month's cache if it doesn't exist
        if(this.cacheArr[thisYear][thisMonth] === undefined) { this.cacheArr[thisYear][thisMonth] = []; }

        var firstDayOfWeek = tempMoment.day();
        var daysInMonth = tempMoment.daysInMonth();

        // See if we should shift the calendar down a week
        if(41 - (daysInMonth + firstDayOfWeek) > 8) { firstDayOfWeek += 7; }

        tempMoment.subtract(1, 'months').endOf('month').subtract(firstDayOfWeek - 1, 'days');

        for(var i = 0; i <= firstDayOfWeek; i++){
            var d = document.getElementById('day-'+i);
            var dSpan = d.getElementsByClassName('day-num')[0];

            d.className += " outside-month";
            //d.addEventListener('click', this.onClick.bind(this));
            dSpan.innerHTML = tempMoment.date();

            tempMoment.add(1, 'days');
        }

        // We didn't need to add a day the last time through the loop above. Subtract that day.
        tempMoment.subtract(1, 'days');

        for(var i = firstDayOfWeek; i < 42; i++) {
            var d = document.getElementById('day-'+i);
            var dSpan = d.getElementsByClassName('day-num')[0];

            if(tempMoment.month() != thisMonth) {
                //d.addEventListener('click', this.onClick.bind(this));
                d.className += ' outside-month';
            } else {
                // todo: enable more caching ability with `this.cacheArr`?
                var tempDay = tempMoment.date();
                //d.removeEventListener('click', this.onClick.bind(this));
                //d.removeEventListener('click', this.onClick.bind(this));
                if(this.cacheArr[thisYear][thisMonth][tempDay] === undefined) {
                    this.cacheArr[thisYear][thisMonth][tempDay] = [];
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

        //console.log(this.cacheArr); // debug

        this.refreshAppointments();
    };

    /**
     * gets appointments for the selected via API
     */
    this.getAppointments = function() {

        // todo: check cache for appointments (and refresh it?)

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

        var apiData = this.apiGet('appointment', 'getByDateRange', reqData, this.getAppointmentsCallback.bind(this));
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
        // todo: clear from cache (this.cacheArr)
        var toRemove = document.getElementsByClassName('cal-event');
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
            //var thisYear    = this.calendarDate.get('year');
            //var thisMonth   = this.calendarDate.get('month');

            // Add elements to the calendar todo: add to cache (this.cacheArr)
            for(var key in data) {
                // Find the day this appointment belongs to
                var startDate   = new moment(data[key]['start_datetime']);
                var endDate     = new moment(data[key]['end_datetime']);

                var dayElID = this.findDayIDByDate(startDate);

                if(dayElID !== "") {
                    var dayEl = document.getElementById(dayElID);
                    var eventEl = document.createElement("span");

                    // Add appropriate class names
                    eventEl.className = ("cal-event " + this.getApptStatusText(data[key]['status'])).trim();
                    eventEl.innerHTML = startDate.format('hh:mm a');

                    dayEl.appendChild(eventEl);
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
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
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
