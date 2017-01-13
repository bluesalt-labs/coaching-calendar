<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coaching Calendar @yield('base-title')</title>

    <!-- Stylesheets -->
    <?php if( strpos($_SERVER['SERVER_NAME'], 'herokuapp') !== false):?>
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php else:?>
    <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bower_components/font-awesome/css/font-awesome.min.css" />
    <?php endif;?>
    @yield('base-stylesheets')

    <!-- Javascript -->
    @yield('base-scripts')
</head>
<body>
    @yield('base-content')
</body>
</html>