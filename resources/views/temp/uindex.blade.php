@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Users</h1>
        <hr>
        @if (Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-info">{{ Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
        <table class="table">
            @if(count($users)>0) {{-- If there is data then display it --}}
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td><a href="/users/{{$user->id}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->toFormattedDateString()}}</td>
                    <td>{{implode(' , ', $user->roles()->get()->pluck('role')->toArray())}} </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            @can('edit-users')
                                <a href="{{ route('admin.users.edit',  $user->id) }}">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
                            @endcan
                            @can('delete-users')
                                <form action="{{route('admin.users.destroy', [$user])}}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tr>
                <td colspan="2">
                    <div class="pagination">{!! str_replace('/?', '?', $users->render()) !!}</div>
                </td>
            </tr>
            @else
                <tr>
                    <td>No record found</td>
                </tr>
            @endif
        </table>
    </div>

@endsection
