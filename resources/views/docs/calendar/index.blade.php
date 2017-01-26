@extends('layouts.docs')

@section('title', 'Calendar')

@section('content')
    @parent

    <h1>Calendar</h1>
    <span><strong>Base url: </strong><code>/api/v1/calendar/</code></span>
    <hr />

    <h2 id="embed"><code>embed/{year}/{month}/{day}</code></h2>
    The calendar can be embedded with an iframe. Examples:

    <h3>PHP</h3>
    <span>This ensures that the server time is used (?)</span>
    <pre>
        <code class="php">
<?php echo htmlspecialchars(
'<?php
    $year   = (int)date(\'Y\');
    $month  = (int)date(\'n\');
    $day    = (int)date(\'j\');
?>'
);?>
        </code>
        <code class="html">
<?php echo htmlspecialchars('<iframe id="calendar-iframe" scrolling="no" src="/calendar/embed/<?=$year?>/<?=$month?>/<?=$day?>"></iframe>'); ?>
        </code>
    </pre>

    <h3>JavaScript</h3>
    <pre>
        <code class="javascript">
function attachCalendar(targetID) {
    var targetEl = document.getElementById(targetID);

    if(targetEl != null) {
        var today = new Date();
        var iframe = document.createElement('iframe');
        iframe.id = 'calendar-iframe';
        iframe.src = '/calendar/embed/' + today.getFullYear() + '/' + (today.getMonth() + 1) + '/' + today.getDate();

        targetEl.appendChild(iframe);
    }
}

document.addEventListener("DOMContentLoaded", function() {
    attachCalendar('calendar-container');
});
        </code>

        <code class="html">
<?php echo htmlspecialchars('<div id="calendar-container"></div>'); ?>
        </code>
    </pre>

    <h3>CSS</h3>
    <span>Here is some example styling for the calendar iframe:</span>
    <pre>
        <code class="css">
#calendar-iframe {
    position: relative;
    width: 100%;
    border: none;
    height: 100%;
    min-height: 650px;
    overflow: hidden;
}
        </code>
    </pre>
<hr />

    <script type="text/javascript">
        hljs.initHighlightingOnLoad();
    </script>
@endsection