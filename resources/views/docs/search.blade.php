@extends('layouts.docs')

@section('title', 'Search')

@section('content')
    @parent

    <h1>Search: <?=isset($searchQuery) ? $searchQuery : ''?></h1>

    <span>Sorry, this feature is not yet available.</span>

@endsection