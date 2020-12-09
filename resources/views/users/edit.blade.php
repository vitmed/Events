@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit User</h1>
        <hr>
        @if (Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-info">{{ Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
        <form action="{{route('admin.users.update', [$user])}}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="name">User name</label>
                <input type="text" value="{{$user->name}}" class="form-control" id="userAddress" name="name" readonly>
                @if ($roles ->count())
                    @foreach($roles as $role)
                        <div class="form-check">
                            <input type="checkbox" name="roles[]" value="{{$role->id}}">
                            <lable>{{$role->role}}</lable>
                        </div>
                    @endforeach
                @endif
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
