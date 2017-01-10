<link rel="stylesheet" type="text/css" href="/bower_components/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/styles/calendar.css" />

<script type="text/javascript" src="/scripts/scripts.js"></script>
<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/scripts/calendar-scripts.js"></script>

<script type="text/javascript">
    $(window).bind("load", function() {
        var calendar = new CoachingCalendar(<?=$year?>, <?=$month?>, <?=$day?>);
    });
</script>

<table id="calendar">
    <thead>
        <tr>
            <td colspan="7" id="calendar-header">
                <button class="btn-month-nav" id="btn-prev-month" onclick="onPrevMonthClick">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </button>
                <button class="btn-month-nav" id="btn-next-month" onclick="onNextMonthClick">
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
            <td class="day" id="day-1"><span class="day-num">0</span></td>
            <td class="day" id="day-2"><span class="day-num">0</span></td>
            <td class="day" id="day-3"><span class="day-num">0</span></td>
            <td class="day" id="day-4"><span class="day-num">0</span></td>
            <td class="day" id="day-5"><span class="day-num">0</span></td>
            <td class="day" id="day-6"><span class="day-num">0</span></td>
            <td class="day" id="day-7"><span class="day-num">0</span></td>
        </tr>
        <tr class="week" id="week-1">
            <td class="day" id="day-8"><span class="day-num">0</span></td>
            <td class="day" id="day-9"><span class="day-num">0</span></td>
            <td class="day" id="day-10"><span class="day-num">0</span></td>
            <td class="day" id="day-11"><span class="day-num">0</span></td>
            <td class="day" id="day-12"><span class="day-num">0</span></td>
            <td class="day" id="day-13"><span class="day-num">0</span></td>
            <td class="day" id="day-14"><span class="day-num">0</span></td>
        </tr>
        <tr class="week" id="week-2">
            <td class="day" id="day-15"><span class="day-num">0</span></td>
            <td class="day" id="day-16"><span class="day-num">0</span></td>
            <td class="day" id="day-17"><span class="day-num">0</span></td>
            <td class="day" id="day-18"><span class="day-num">0</span></td>
            <td class="day" id="day-19"><span class="day-num">0</span></td>
            <td class="day" id="day-20"><span class="day-num">0</span></td>
            <td class="day" id="day-21"><span class="day-num">0</span></td>
        </tr>
        <tr class="week" id="week-3">
            <td class="day" id="day-22"><span class="day-num">0</span></td>
            <td class="day" id="day-23"><span class="day-num">0</span></td>
            <td class="day" id="day-24"><span class="day-num">0</span></td>
            <td class="day" id="day-25"><span class="day-num">0</span></td>
            <td class="day" id="day-26"><span class="day-num">0</span></td>
            <td class="day" id="day-27"><span class="day-num">0</span></td>
            <td class="day" id="day-28"><span class="day-num">0</span></td>
        </tr>
        <tr class="week" id="week-4">
            <td class="day" id="day-29"><span class="day-num">0</span></td>
            <td class="day" id="day-30"><span class="day-num">0</span></td>
            <td class="day" id="day-31"><span class="day-num">0</span></td>
            <td class="day" id="day-32"><span class="day-num">0</span></td>
            <td class="day" id="day-33"><span class="day-num">0</span></td>
            <td class="day" id="day-34"><span class="day-num">0</span></td>
            <td class="day" id="day-35"><span class="day-num">0</span></td>
        </tr>
        <tr class="week" id="week-5">
            <td class="day" id="day-36"><span class="day-num">0</span></td>
            <td class="day" id="day-37"><span class="day-num">0</span></td>
            <td class="day" id="day-38"><span class="day-num">0</span></td>
            <td class="day" id="day-39"><span class="day-num">0</span></td>
            <td class="day" id="day-40"><span class="day-num">0</span></td>
            <td class="day" id="day-41"><span class="day-num">0</span></td>
            <td class="day" id="day-42"><span class="day-num">0</span></td>
        </tr>
    </tbody>
</table>