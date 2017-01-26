@extends('layouts.base')

@section('base-title') @yield('title') @endsection

@section('base-stylesheets')
    <link rel="stylesheet" type="text/css" href="/styles/member-styles.css" />
@endsection

@section('base-scripts')
    <script type="text/javascript" src="/scripts/scripts.js"></script>
    <script type="text/javascript" src="/scripts/member-scripts.js"></script>
@endsection

@section('base-content')
    @yield('content')
@endsection