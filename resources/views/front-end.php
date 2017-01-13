<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Coaching Calendar - Home</title>

        <!-- Stylesheets -->
        <?php if( strpos($_SERVER['SERVER_NAME'], 'herokuapp') !== false):?>
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php else:?>
        <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/bower_components/font-awesome/css/font-awesome.min.css" />
        <?php endif;?>

        <link rel="stylesheet" type="text/css" href="/styles/front-end-styles.css" />

        <!-- Javascript -->
        <?php if( strpos($_SERVER['SERVER_NAME'], 'herokuapp') !== false):?>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <?php else:?>
        <script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <?php endif;?>

        <script type="text/javascript" src="/scripts/scripts.js"></script>
        <script type="text/javascript" src="/scripts/front-end-scripts.js"></script>

    </head>
    <body>
        <div class="container">
            <!-- Calendar View -->
            <?php
                $year   = (int)date('Y');
                $month  = (int)date('n');
                $day    = (int)date('j');
            ?>
            <iframe id="calendar-iframe" scrolling="no" src="/api/v1/calendar/get/<?=$year?>/<?=$month?>/<?=$day?>"></iframe>

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
    </body>
</html>
