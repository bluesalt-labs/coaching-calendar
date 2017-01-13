@extends('member.base')

@section('title', 'Home')

@section('content')
    <div class="container">
        <!-- Calendar View -->
        <?php
        $year   = (int)date('Y');
        $month  = (int)date('n');
        $day    = (int)date('j');
        ?>
        <iframe id="calendar-iframe" scrolling="no" src="/calendar/embed/<?=$year?>/<?=$month?>/<?=$day?>"></iframe>

        <!-- Agenda View -->

        <!-- Search/Filters? -->

        <!--  -->
    </div>

    <!-- Dev -->
    <style type="text/css">
        #dev .output pre { color: #C3D3DE; background-color: #263238; }
        #dev .output pre .string { color: #C3E887; }
        #dev .output pre .number { color: #F77669; }
        #dev .output pre .boolean { color: #C792EA; }
        #dev .output pre .null { color: #C792EA; }
        #dev .output pre .key { color: #C3D3DE; }
    </style>

    <div class="container-fluid" id="dev">
        <hr />
        <button class="btn btn-success" id="refresh-dev-display" onclick="refreshDevDisplay();">Refresh Dev Output</button>
        <br />
        <div class="row">
            <div class="output col-sm-6">
                <h2>Users</h2>
                <pre id="users" class="well">
                            Loading...
                        </pre>
            </div>
            <div class="output col-sm-6">
                <h2>Appointments</h2>
                <pre id="appointments" class="well">
                            Loading...
                        </pre>
            </div>
        </div><!-- row -->
        <hr />
        <br /><br />
    </div><!-- container-fluid -->
    <!-- End Dev -->
@endsection
