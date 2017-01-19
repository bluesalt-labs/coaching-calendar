@extends('layouts.docs')

@section('title', 'Home')

@section('content')
    @parent

    <h1>Coaching Calendar</h1>
    <h4>A basic scheduling calendar UI</h4>
    <div>
        <a class="github-button" href="https://github.com/bluesalt-labs/coaching-calendar" data-icon="octicon-star" data-count-href="/bluesalt-labs/coaching-calendar/stargazers" data-count-api="/repos/bluesalt-labs/coaching-calendar#stargazers_count" data-count-aria-label="# stargazers on GitHub" aria-label="Star bluesalt-labs/coaching-calendar on GitHub">Star</a>
        <a class="github-button" href="https://github.com/bluesalt-labs" data-count-href="/bluesalt-labs/followers" data-count-api="/users/bluesalt-labs#followers" data-count-aria-label="# followers on GitHub" aria-label="Follow @bluesalt-labs on GitHub">Follow @bluesalt-labs</a>
    </div>
    <br /><br />
    <span>This project is currently in development (and thus the develop branch is currently the default).</span>
    <br />
    <ul>
        <li>Based on the <a href="https://lumen.laravel.com/" target="_blank">Lumen Framework</a> (v5.3)</li>
        <li>Front end currently utilizing:</li>
        <ul>
            <li><a href="http://getbootstrap.com/" target="_blank">Bootstrap</a> (v3.3.7)</li>
            <li><a href="http://fontawesome.io/" target="_blank">Font Awesome</a> (v4.7.0)</li>
            <li><a href="http://momentjs.com/" target="_blank">Moment.js</a> (v2.17.1)</li>
        </ul>
        <li>Docs are utilizing:</li>
        <ul>
            <li><a href="https://highlightjs.org/" target="_blank">highlight.js</a> (v9.9.0)</li>
        </ul>
        <li>Author: BlueSalt Labs - Luke Sontrop</li>
        <li>Coaching Calendar is open-sourced software licensed under the <a href="http://opensource.org/licenses/MIT" target="_blank">MIT license</a></li>
    </ul>
@endsection