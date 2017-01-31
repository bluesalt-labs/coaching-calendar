@extends('layouts.base')

@section('base-title') Admin | @yield('title') @endsection

@section('base-stylesheets')
    <link rel="stylesheet" type="text/css" href="/styles/admin-styles.css" />
@endsection

@section('base-content')
    @section('content')
    <div id="page-container">
        <div class="container" id="login-content">
        @show
        </div>
    </div>
@endsection