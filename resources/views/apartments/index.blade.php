@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <h1>
                My apartment
            </h1>
            @foreach ($apartments as $apartment)
                <div class="col-3">
                    {{$apartment -> title}}
                </div>
            @endforeach
        </div>
    </div>
@endsection