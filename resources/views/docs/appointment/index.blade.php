@extends('layouts.docs')

@section('title', 'Appointment')

@section('content')
    @parent


    <h1>Appointment</h1>
    <span><strong>Base url: </strong><code>/api/v1/appointment/</code></span>
    <hr />

    <h2 id="getAll"><code>/</code></h2>
    Gets all appointments as a JSON string.

    <h2 id="getByDateRange"><code>getByDateRange</code></h2>
    Gets appointment by date range as a JSON string.

    <h2 id="get"><code>get/{id}</code></h2>
    Gets appointment by id as a JSON string.

    <h2 id="create"><code>create</code></h2>
    Creates an appointment

    <h2 id="schedule"><code>schedule</code></h2>
    Schedules a user for the selected appointment

@endsection