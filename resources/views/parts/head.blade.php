<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MMTest</title>

    <!-- CSS -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- JS -->
    <script src="/js/app.js" type="text/javascript"></script>
</head>

@include('parts.navigation')

<body>
<div class="container">
<div id="session-message">
    @if(Session::has('message'))
        <div class="alert @if(Session::has('alert-type'))alert-{{Session::get('alert-type')}}@else alert-info @endif">
            <strong>Alert</strong> {{Session::get('message')}}
        </div>
    @endif
</div>
<div id="laravel-errors">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul class="container">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>



