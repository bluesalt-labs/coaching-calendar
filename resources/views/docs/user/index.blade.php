@extends('layouts.docs')

@section('title', 'User')

@section('content')
    @parent

    <h1>User</h1>
    <span><strong>Base url: </strong><code>/api/v1/user/</code></span>
    <hr />

    <h2 id="getAll"><code>/</code></h2>
    Gets all users as a JSON string.

    <h2 id="get"><code>get/{id}</code></h2>
    Gets user by id as a JSON string.

    <h2 id="create"><code>create</code></h2>
    Creates a new user

    <h2 id="delete"><code>delete/{id}</code></h2>
    Deletes a user
@endsection