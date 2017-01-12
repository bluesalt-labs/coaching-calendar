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

        tempMoment.subtract(1, 'months').endOf('month').subtract(firstDayOfWeek, 'days');

        for(var i = 0; i <= firstDayOfWeek; i++){
            var d = document.getElementById('day-'+i);
            var dSpan = d.getElementsByClassName('day-num')[0];

            d.className += " outside-month";
            //d.addEventListener('click', this.onClick.bind(this));
            dSpan.innerHTML = tempMoment.date();

            tempMoment.add(1, 'days');
        }

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

        console.log(this.cacheArr); // debug

        this.refreshAppointments();
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
        this.clearAppointments();
        this.getAppointments();
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

    /**
     * Jumps the calendar to the current month
     */
    this.onTodayClick = function() {
        this.calendarDate.set({
            'year':     this.dateToday.get('year'),
            'month':    this.dateToday.get('month'),
            'date':      1,
        });
        this.refreshCalendar();
    };

    this.apiRequest = function(method, model, action, args = [], callback) {
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

        var xhr = new XMLHttpRequest();
        xhr.open(method, this.apiUrl + model + '/' + (action == 'all' ? '' : action), true);
        //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    callback(xhr.responseText);
                } else {
                    console.log('Request failed.  Returned status of ' + xhr.status);
                    callback('');
                }
            }
        };

        var toSend = '';
        if(Array.isArray(args) && args.length > 0) {


            for(var i = 0; i < args.length; i++) {
                toSend += args.key(i) + '=' + args[i]; // todo: make sure this works
            }
        }
        if(toSend !== '') { xhr.send(encodeURI(toSend)); }
        else { xhr.send(); }
    };

    this.init();
};
