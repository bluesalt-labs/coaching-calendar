<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coaching Calendar Admin</title>


    <!-- Stylesheets -->
    <?php if( strpos($_SERVER['SERVER_NAME'], 'herokuapp') !== false):?>
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php else:?>
        <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/bower_components/font-awesome/css/font-awesome.min.css" />
    <?php endif;?>

    <link rel="stylesheet" type="text/css" href="/styles/back-end-styles.css" />

    <!-- Javascript -->
    <?php if( strpos($_SERVER['SERVER_NAME'], 'herokuapp') !== false):?>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php else:?>
        <script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <?php endif;?>

    <script type="text/javascript" src="/scripts/scripts.js"></script>
    <script type="text/javascript" src="/scripts/back-end-scripts.js"></script>
</head>
<body>
<div class="container">

<pre id="test-data"></pre>
    </div>
</body>
</html>
