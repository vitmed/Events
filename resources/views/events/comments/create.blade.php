@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Add New Status</h1>
        <hr>
        @if (Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-info">{{ Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
        <form action="/events" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="status">Status name</label>
                <input type="text" class="form-control" id="statusName" name="status"  value="{{ old('name') }}" required autocomplete="status" autofocus>
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
