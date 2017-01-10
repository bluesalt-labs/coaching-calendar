<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Coaching Calendar</title>

        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/bower_components/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="/styles/front-end-styles.css" />

        <!-- Javascript -->
		<script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
		<!--<script type="text/javascript" src="bower_components/lodash/dist/lodash.min.js"></script>-->
        <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
        <script type="text/javascript" src="/scripts/front-end-scripts.js"></script>
    </head>
    <body>
        <!-- Dev Container -->

        <style type="text/css">
            #dev .string { color: green; }
            #dev .number { color: darkorange; }
            #dev .boolean { color: blue; }
            #dev .null { color: magenta; }
            #dev .key { color: red; }
        </style>

        <div class="container-fluid" id="dev">
            <div class="row">
                <div class="col-sm-8" id="testing">

                </div>
                <div class="col-sm-4" id="output">
                    <h2>Users</h2>
                    <pre id="users" class="well">

                    </pre>
                    <hr />
                    <h2>Appointments</h2>
                    <pre id="appointments" class="well">

                    </pre>
                    <button class="btn btn-success" id="refresh-dev-display" onclick="refreshDevDisplay();">Refresh</button>
                </div>
            </div>
        </div>
        <!-- End Dev Container -->
    </body>
</html>
