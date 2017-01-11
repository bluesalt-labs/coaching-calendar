<link rel="stylesheet" type="text/css" href="/bower_components/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/styles/calendar.css" />


<!--<script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>-->
<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>

<script type="text/javascript" src="/scripts/scripts.js"></script>
<!--<script type="text/javascript" src="/scripts/calendar-scripts.js"></script>-->

<script type="text/javascript">
    //var cal;

    //document.addEventListener("onload", function(event) {
        //cal = new CoachingCalendar(<?=$year?>, <?=$month?>, <?=$day?>);
    //});

    console.log("From PHP - year: <?=$year?> month: <?=$month?> day: <?=$day?>"); // debug
</script>

<table id="calendar">
    <thead>
        <tr>
            <td colspan="7" id="calendar-header">
                <button class="btn-month-nav" id="btn-prev-month" onclick="cal.onPrevMonthClick();">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </button>
                <button class="btn-month-nav" id="btn-next-month" onclick="cal.onNextMonthClick();">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </button>
                <span id="calendar-month">...</span>
            </td>
        </tr>
        <tr>
            <td class="day-header" id="sunday">Sunday</td>
            <td class="day-header" id="monday">Monday</td>
            <td class="day-header" id="tuesday">Tuesday</td>
            <td class="day-header" id="wednesday">Wednesday</td>
            <td class="day-header" id="thursday">Thursday</td>
            <td class="day-header" id="friday">Friday</td>
            <td class="day-header" id="saturday">Saturday</td>
        </tr>
    </thead>
    <tbody>
        <tr class="week" id="week-0">
            <td class="day" id="day-0"><span class="day-num">0</span></td>
            <td class="day" id="day-1"><span class="day-num">0</span></td>
            <td class="day" id="day-2"><span class="day-num">0</span></td>
            <td class="day" id="day-3"><span class="day-num">0</span></td>
            <td class="day" id="day-4"><span class="day-num">0</span></td>
            <td class="day" id="day-5"><span class="day-num">0</span></td>
            <td class="day" id="day-6"><span class="day-num">0</span></td>
        </tr>
        <tr class="week" id="week-1">
            <td class="day" id="day-7"><span class="day-num">0</span></td>
            <td class="day" id="day-8"><span class="day-num">0</span></td>
            <td class="day" id="day-9"><span class="day-num">0</span></td>
            <td class="day" id="day-10"><span class="day-num">0</span></td>
            <td class="day" id="day-11"><span class="day-num">0</span></td>
            <td class="day" id="day-12"><span class="day-num">0</span></td>
            <td class="day" id="day-13"><span class="day-num">0</span></td>
        </tr>
        <tr class="week" id="week-2">
            <td class="day" id="day-14"><span class="day-num">0</span></td>
            <td class="day" id="day-15"><span class="day-num">0</span></td>
            <td class="day" id="day-16"><span class="day-num">0</span></td>
            <td class="day" id="day-17"><span class="day-num">0</span></td>
            <td class="day" id="day-18"><span class="day-num">0</span></td>
            <td class="day" id="day-19"><span class="day-num">0</span></td>
            <td class="day" id="day-20"><span class="day-num">0</span></td>
        </tr>
        <tr class="week" id="week-3">
            <td class="day" id="day-21"><span class="day-num">0</span></td>
            <td class="day" id="day-22"><span class="day-num">0</span></td>
            <td class="day" id="day-23"><span class="day-num">0</span></td>
            <td class="day" id="day-24"><span class="day-num">0</span></td>
            <td class="day" id="day-25"><span class="day-num">0</span></td>
            <td class="day" id="day-26"><span class="day-num">0</span></td>
            <td class="day" id="day-27"><span class="day-num">0</span></td>
        </tr>
        <tr class="week" id="week-4">
            <td class="day" id="day-28"><span class="day-num">0</span></td>
            <td class="day" id="day-29"><span class="day-num">0</span></td>
            <td class="day" id="day-30"><span class="day-num">0</span></td>
            <td class="day" id="day-31"><span class="day-num">0</span></td>
            <td class="day" id="day-32"><span class="day-num">0</span></td>
            <td class="day" id="day-33"><span class="day-num">0</span></td>
            <td class="day" id="day-34"><span class="day-num">0</span></td>
        </tr>
        <tr class="week" id="week-5">
            <td class="day" id="day-35"><span class="day-num">0</span></td>
            <td class="day" id="day-36"><span class="day-num">0</span></td>
            <td class="day" id="day-37"><span class="day-num">0</span></td>
            <td class="day" id="day-38"><span class="day-num">0</span></td>
            <td class="day" id="day-39"><span class="day-num">0</span></td>
            <td class="day" id="day-40"><span class="day-num">0</span></td>
            <td class="day" id="day-41"><span class="day-num">0</span></td>
        </tr>
    </tbody>
</table>

<script type="text/javascript">
    var CoachingCalendar = function(year, month, day) {
        this.dateToday = new moment();
        this.calendarDate = new moment( {year: year, month: (month - 1), day: day} );

        this.init = function() {
            this.refreshCalendar();
        };

        /**
         *
         */
        this.refreshCalendar = function () {
            document.getElementById('calendar-month').innerHTML =
                this.calendarDate.format('MMMM') +
                " " +
                this.calendarDate.format('YYYY');

            /*
            * There are 42 days in this calendar.
            * find first day of month, set it's value to 1
            * if there are any days before the first day of the month,
            * traverse backwards through them and populate them with days of the previous month.
            * add .outside-month class to them as well
            * go back to the first day of the month and populate the rest of the
            * days of the month.
            * keep going until the end of the calendar is reached (even though we're going into
            * the next month). Don't forget to set .outside-month class to the end days as well.
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

            tempMoment.subtract(1, 'months').endOf('month').subtract(firstDayOfWeek, 'days');

            for(var i = 0; i <= firstDayOfWeek; i++){
                var d = document.getElementById('day-'+i);
                var dSpan = d.getElementsByClassName('day-num')[0];

                d.className += " outside-month";
                dSpan.innerHTML = tempMoment.date();

                tempMoment.add(1, 'days');
            }

            for(var i = firstDayOfWeek + 1; i < 42; i++) {
                var d = document.getElementById('day-'+i);
                var dSpan = d.getElementsByClassName('day-num')[0];

                if(tempMoment.month() > thisMonth) { d.className += " outside-month"; }
                else { d.className = 'day'; }
                dSpan.innerHTML = tempMoment.date();
                tempMoment.add(1, 'days');
            }
        };

        /**
         * gets appointments via API
         */
        this.getAppointments = function () {

        };

        /**
         * refreshes displayed appointments
         */
        this.refreshAppointments = function () {

        };

        /**
         * removes displayed appointments on the calendar
         */
        this.clearAppointments = function () {

        };

        /**
         * Selects previous month and refreshes calendar
         */
        this.onPrevMonthClick = function () {
            this.calendarDate.subtract(1, 'months');
            console.log(this.calendarDate.format()); // debug
            this.refreshCalendar();
        };

        /**
         * Selects next month and refreshes calendar
         */
        this.onNextMonthClick = function () {
            this.calendarDate.add(1, 'months');
            console.log(this.calendarDate.format()); // debug
            this.refreshCalendar();
        };

        this.init();
    };

    var cal = new CoachingCalendar(<?=$year?>, <?=$month?>, <?=$day?>);
</script>