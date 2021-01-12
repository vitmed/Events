@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Showing Event: {{ $events['name']}}</h1>
        <div class="jumbotron text-center">
            <p>
                <strong>Event:</strong> {{ $events['name'] }}<br>
            </p>
        </div>
        <div class="col-9 pt-5">
            <a href="/statuses">Go to all statuses</a>
        </div>
    </div>
@endsection
