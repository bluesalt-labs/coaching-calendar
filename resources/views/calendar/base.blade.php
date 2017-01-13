<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coaching Calendar</title>

    <!-- Stylesheets -->
    <?php if( strpos($_SERVER['SERVER_NAME'], 'herokuapp') !== false):?>
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php else:?>
    <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bower_components/font-awesome/css/font-awesome.min.css" />
    <?php endif;?>

    <link rel="stylesheet" type="text/css" href="/styles/calendar-styles.css" />

    <!-- Javascript -->
    <?php if( strpos($_SERVER['SERVER_NAME'], 'herokuapp') !== false):?>
    <script type="text/javascript" src=//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js></script>
    <?php else:?>
    <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
    <?php endif;?>

    <script type="text/javascript" src="/scripts/calendar-scripts.js"></script>


    <script type="text/javascript">
        console.log("From PHP - year: <?=$year?> month: <?=$month?> day: <?=$day?>"); // debug
    </script>
</head>
<body>
    @yield('content')
</body>
</html>
