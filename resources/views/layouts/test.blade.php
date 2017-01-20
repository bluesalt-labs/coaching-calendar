@extends('layouts.base')

@section('base-title') Tests | @yield('title') @endsection

@section('base-stylesheets')
    <link rel="stylesheet" type="text/css" href="/styles/test-styles.css" />
@endsection

@section('base-scripts')
    <script type="text/javascript" src="/scripts/scripts.js"></script>
    <script type="text/javascript" src="/scripts/test-scripts.js"></script>
    <script type="text/javascript" src="/scripts/sidebar-links.js"></script>
@endsection

@section('base-content')
<div id="page-container">
    <!-- Tests Navbar -->
    <header id="main-header">
        <button id="btn-nav-toggle" onclick="openSidebar();">
            <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
        </button>
    </header><!-- #main-header -->

    <!-- Test Sidebar -->


    @section('content')
        <div class="container-fluid" id="page-content">
            <!-- show page content -->
            @show
        </div><!-- #page-content -->
        <nav id="main-sidebar">
            <ul id="sidebar-links"></ul>
        </nav><!-- #main-sidebar -->
</div><!-- page-container -->
<!-- end 'base-content' -->
@endsection