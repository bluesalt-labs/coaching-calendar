@extends('layouts.test')

@section('title', 'Home')

@section('content')
    @parent

    <h1 class="header-link" id="calendar">Calendar</h1>
    <h2 class="header-link" id="calendar-embed"><code>embed</code></h2>
    <div>
        Here is some dummy content
    </div>

    <hr />

    <h1 class="header-link" id="test1">Test1</h1>
    <h2 class="header-link" id="test1-test"><code>test</code></h2>
    <div>
        Here is some dummy content
    </div>

    <hr />

@endsection