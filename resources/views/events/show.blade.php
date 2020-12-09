@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Showing Status: {{ $event['name']}}</h1>
        <div class="jumbotron text-center">
            <p>
                <strong>Status:</strong> {{ $event['name'] }}<br>
            </p>
        </div>
        <div class="col-9 pt-5">
            <a href="/statuses">Go to all statuses</a>
        </div>
    </div>
@endsection
