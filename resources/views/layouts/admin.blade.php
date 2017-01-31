@extends('layouts.base')

@section('base-title') Admin | @yield('title') @endsection

@section('base-stylesheets')
    <link rel="stylesheet" type="text/css" href="/styles/admin-styles.css" />
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
        <div class="dropdown pull-right">
            <button class="btn btn-default dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span id="username">
                @if(Auth::user())
                    {{ Auth::user()->getName() }}
                @else
                    Guest
                @endif
                </span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a href="/admin/settings">Settings</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#" onclick="onLogoutClick()">Logout</a></li>
            </ul>



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

<script type="text/javascript">

    function onLogoutClick() {
        var form = document.createElement('form');
        form.innerHTML = '{{ csrf_field() }}';

        form.method = 'POST';
        form.action = '{{ url('/admin/logout') }}';

        form.submit();
    }
</script>