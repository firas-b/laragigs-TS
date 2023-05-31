@extends('layout');
@section('content')
@include('partials._search')

    <h3> {{$listing['title']}}</h3>
    <p> {{$listing['description']}}</p>
    
@endsection
