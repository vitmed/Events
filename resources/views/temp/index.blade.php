@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Komentarai</h1>
        <hr>
        <div class="col-9 pt-5">
            <a href="comments/create">Add new</a>
        </div>
        @if (Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-info">{{ Illuminate\Support\Facades\Session::get('message') }}</div>
        @endif
        <table class="table">
            @if(!empty($comments)) {{-- If there is data then display it --}}
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Text</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments ?? '' ?? '' as $comment)
                <tr>
                    <th scope="row">{{$comment['id']}}</th>
                    <td>{{$comment['text']}}</td>
                    <td>
                        @can('manage-crud')
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ URL::to('events/' . $comment['id'] . '/edit') }}">
                                    <input type="image" src="https://img.icons8.com/color/30/000000/edit-file.png">
                                </a>&nbsp;
                                <form action="{{url('events', [$comment['id']])}}" method="POST">
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
