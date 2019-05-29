@extends('layouts.layout')

@section('title')
  Bonjour
@endsection

@section('content')
                  bonjour, {{$prenom}}, ça va {{$bien}} ?
                  <br>
                  bonjour, <?= $prenom; ?>, ça va <?= $bien; ?> ?
@endsection
