@extends('layouts.layout')

@section('title')
    Wall
@endsection

@section('content')

    <form method="post" action="/wall/write">
        @csrf
        <input type="text" name="message">
        <input type="submit" value="write one the wall !">
    </form>
    <br><br>

    <ul>
        @foreach($message as $m)
            <li>{{ $m->message }} - <a href="/wall/delete/{{ $m->id }}">delete</a></li>
        @endforeach
    </ul>
@endsection