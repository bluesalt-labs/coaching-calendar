@extends('layouts.base')

@section('base-title') Calendar - @yield('title') @endsection

@section('base-stylesheets')
    <link rel="stylesheet" type="text/css" href="/styles/calendar-styles.css" />

    <style type="text/css">
        html, body {
            position: absolute;
            top: 0; right: 0; bottom: 0; left: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 4px;
            overflow: hidden;
        }
    </style>
@endsection

@section('base-scripts')
    <?php if( strpos($_SERVER['SERVER_NAME'], 'herokuapp') !== false):?>
    <script type="text/javascript" src=//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js></script>
    <?php else:?>
    <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
    <?php endif;?>

    <script type="text/javascript" src="/scripts/calendar-scripts.js"></script>
@endsection

@section('base-content')
    @yield('content')
@endsection