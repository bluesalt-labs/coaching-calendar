@extends('layouts.base')

@section('base-title') API Documentation - @yield('title') @endsection

@section('base-stylesheets')
    <link rel="stylesheet" type="text/css" href="/styles/docs-styles.css" />
@endsection

@section('base-scripts')
    <?php if( strpos($_SERVER['SERVER_NAME'], 'herokuapp') !== false):?>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php else:?>
    <script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <?php endif;?>

    <!--<script type="text/javascript" src="/scripts/scripts.js"></script>--> <!-- may or may not need this. -->
@endsection

@section('base-content')
    @yield('sidebar')
    <!-- todo: sidebar -->
    @yield('content')
@endsection
