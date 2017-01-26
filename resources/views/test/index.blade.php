@extends('layouts.test')

@section('title', 'Home')

@section('content')
    @parent

    <h1 class="sidebar-link" id="admin">Admin</h1>
    <code>todo</code>

    <hr />

    <h1 class="sidebar-link" id="appointment">Appointment</h1>
    <code>todo</code>

    <hr />

    <h1 class="sidebar-link" id="calendar">Calendar</h1>
    <h2 class="sidebar-link" id="calendar-embed"><code><a href="/api/v1/docs/calendar#embed" target="_blank" class="docs-link">embed</a></code></h2>
    <div>
        <?php
        $year   = (int)date('Y');
        $month  = (int)date('n');
        $day    = (int)date('j');
        ?>
        <iframe id="calendar-iframe" scrolling="no" src="/calendar/embed/<?=$year?>/<?=$month?>/<?=$day?>"></iframe>
    </div>

    <hr />

    <h1 class="sidebar-link" id="config">Config</h1>
    <code>todo</code>

    <hr />

    <h1 class="sidebar-link" id="member">Member</h1>
    <code>todo</code>

    <hr />

    <h1 class="sidebar-link" id="user">User</h1>
    <code>todo</code>

    <hr />

@endsection