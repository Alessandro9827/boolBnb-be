@extends('layouts.app')

@section('head-title')
    @yield('page-title')
@endsection

@section('content')
    @foreach ($apartment->leads as $message)                             
        <li>                                 
            <p class="m-0">messaggio da:{{ $message->name }}</p>                                 
            <p>{{ $message->message }}</p>                             
        </li>                         
    @endforeach
@endsection