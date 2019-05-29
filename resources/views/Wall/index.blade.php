@extends('layouts.layout')

@section('title')
  Wall
@endsection

@section('content')
  <form method="POST" action='/wall/write'>
    @csrf
    <input type="text" name='message'>
    <input type="submit" value='write on the wall'>
  </form>
  <br>
  <br>


    @foreach($messages as $message)
      <li>{{ $message->message}} - <a href="wall/delete/{{ $message->id}}">delete</a></li>
    @endforeach
  </ul>
@endsection
