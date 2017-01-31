@extends('layouts.base')

@section('base-title') Admin | @yield('title') @endsection

@section('base-stylesheets')
    <link rel="stylesheet" type="text/css" href="/styles/admin-styles.css" />
@endsection

@section('base-scripts')
    <script type="text/javascript" src="/scripts/scripts.js"></script>
    <script type="text/javascript" src="/scripts/admin-scripts.js"></script>
@endsection

@section('base-content')
<div id="page-container" class="sidebar-active">
    <!-- Admin Navbar -->
    <header id="main-header">
        <button id="btn-nav-toggle" onclick="onNavBtnClick();">
            <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
        </button>
        <a id="header-brand" href="{{ $navLinks['Dashboard']['active'] ? '#' : $navLinks['Dashboard']['url'] }}">
            <span>Coaching Calendar Admin</span>
        </a>
        <div class="pull-right">
            <!--{ { Auth::user()->getName(); } }-->
        </div>
    </header><!-- Admin Navbar -->

    <!-- Admin Sidebar -->
    <nav id="main-sidebar">
        <ul id="sidebar-links">
            @foreach($navLinks as $name => $data)
                <li<?=($data['active'] ? ' class="active"' : '')?>>
                    <a href="<?=$data['url']?>"><?=$name?></a>
                </li>
                @if($data['nested'])
                    <ul>
                        @foreach($data['nested'] as $name => $data)
                            <li<?=($data['active'] ? ' class="active"' : '')?>>
                                <a href="<?=$data['url']?>"><?=$name?></a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            @endforeach
        </ul>
    </nav><!-- #main-sidebar -->

    <!-- Page Content -->
    @section('content')
        <div class="container-fluid" id="page-content">
            @if($breadcrumbs)
                <ol class="breadcrumb">
                    @foreach($breadcrumbs as $name => $data)
                        <li<?=($data['active'] ? ' class="active"' : '')?>>
                            @if($data['active'])
                                <?=$name?>
                            @else
                                <a href="<?=$data['url']?>"><?=$name?></a>
                            @endif
                        </li>
                    @endforeach
                </ol>
            @endif
            @show
        </div><!-- content container -->
</div><!-- #page-container -->

<!-- Footer -->
<footer id="main-footer">
    <div class="container">

    </div><!-- footer container -->
</footer><!-- #main-footer -->
@endsection
