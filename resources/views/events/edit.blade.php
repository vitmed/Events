@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Status</h1>
        <hr>
        @if (Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-info">{{ Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
        <form action="{{url('events', [$event['id']])}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" value="{{$event['name']}}" class="form-control" id="statusName" name="status">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
