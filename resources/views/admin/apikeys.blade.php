@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    @parent

    <div class="container" id="vue-container">
        <!--<div id="passport-clients"></div>-->


        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>

        <!--
        <passportClients></passportClients>
        <passportAuthorizedClients></passportAuthorizedClients>
        <passportPersonalAccessTokens></passportPersonalAccessTokens>
        -->

    </div>


@endsection