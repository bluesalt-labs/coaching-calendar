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

    <script type="text/javascript" src="/scripts/scripts.js"></script>
    <script type="text/javascript" src="/scripts/docs-scripts.js"></script>
    <script async defer src="//buttons.github.io/buttons.js"></script>
@endsection

@section('base-content')
<div id="page-container" class="sidebar-active">
    <!-- Docs Navbar -->
    <header id="main-header">
        <button id="btn-nav-toggle" onclick="onNavBtnClick();">
            <i class="fa fa-caret-square-o-right" aria-hidden="true"></i>
        </button>
        <a id="header-brand" href="{{ $navLinks['Home']['active'] ? '#' : $navLinks['Home']['url'] }}">
            <span>Coaching Calendar API</span>
        </a>
    </header><!-- Docs Navbar -->

    <!-- Docs Sidebar -->
    <nav id="main-sidebar">
        <ul id="sidebar-links">
            <li class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="site-search">Search</label>
                    <input id="site-search" type="text" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </li>
            @foreach($navLinks as $name => $data)
                <li<?=($data['active'] ? ' class="active"' : '')?>>
                    <a href="<?=$data['url']?>"><?=$name?></a>
                </li>
            @endforeach
        </ul>
    </nav><!-- #main-sidebar -->

    <!-- Page Content -->
    @section('content')
    <div class="container-fluid" id="page-content">
        @show
    </div><!-- content container -->
</div><!-- #page-container -->

    <!-- Footer -->
    <footer id="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-offset-8">
                    <a class="github-button" href="https://github.com/bluesalt-labs/coaching-calendar" data-icon="octicon-star" data-count-href="/bluesalt-labs/coaching-calendar/stargazers" data-count-api="/repos/bluesalt-labs/coaching-calendar#stargazers_count" data-count-aria-label="# stargazers on GitHub" aria-label="Star bluesalt-labs/coaching-calendar on GitHub">Star</a>
                    <a class="github-button" href="https://github.com/bluesalt-labs" data-count-href="/bluesalt-labs/followers" data-count-api="/users/bluesalt-labs#followers" data-count-aria-label="# followers on GitHub" aria-label="Follow @bluesalt-labs on GitHub">Follow @bluesalt-labs</a>
                </div>
            </div>
        </div><!-- footer container -->
    </footer><!-- #main-footer -->
</div><!-- #page-container -->
@endsection
