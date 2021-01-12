@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>events</h1>
        <hr>
        <div class="col-9 pt-5">
            <a href="events/create">Add new event</a>
        </div>
        @if (Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-info">{{ Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
        <table class="table">
            @if(!empty($events)) {{-- If there is data then display it --}}
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Location</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events ?? '' ?? '' as $event)
                <tr>
                    <th scope="row">{{$event['id']}}</th>
                    <td><a href="/events/{{$event['id']}}">{{$event['name']}}</a></td>
                    <td>{{$event['price']}}</td>
                    <td>{{$event['location']}}</td>
                    <td>
                        @can('manage-crud')
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ URL::to('events/' . $event['id'] . '/edit') }}">
                                    <input type="image" src="https://img.icons8.com/color/30/000000/edit-file.png">
                                </a>&nbsp;
                                <form action="{{url('events', [$event['id']])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="image" src="https://img.icons8.com/color/30/000000/delete-forever.png">
                                </form>
                            </div>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
            @else
                <tr>
                    <td>No record found</td>
                </tr>
            @endif
        </table>
    </div>

@endsection
