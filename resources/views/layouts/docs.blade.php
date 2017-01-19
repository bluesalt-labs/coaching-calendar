@extends('layouts.base')

@section('base-title') API Documentation | @yield('title') @endsection

@section('base-stylesheets')
    <link rel="stylesheet" type="text/css" href="/styles/docs-styles.css" />
    <?php if( strpos($_SERVER['SERVER_NAME'], 'herokuapp') !== false):?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/androidstudio.min.css">
    <?php else:?>
    <link rel="stylesheet" type="text/css" href="/bower_components/highlightjs/styles/androidstudio.css" />
    <?php endif;?>
@endsection

@section('base-scripts')
    <?php if( strpos($_SERVER['SERVER_NAME'], 'herokuapp') !== false):?>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
    <?php else:?>
    <script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/bower_components/highlightjs/highlight.pack.min.js"></script>
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
            <li id="search-container">
                <form class="form-inline" action="/api/v1/docs/search" method="GET">
                    <div class="form-group">
                        <label class="sr-only" for="q">Search</label>
                        <input id="q" name="q" type="text" class="form-control" placeholder="Search..." value="<?=isset($searchQuery) ? $searchQuery : ''?>"/>
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>
            </li>
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
