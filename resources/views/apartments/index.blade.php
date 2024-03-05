@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <h1>
                My apartment
            </h1>
            @foreach ($apartments as $apartment)
                <div class="col-3">
                    <h3>
                        {{$apartment -> title}}
                    </h3>
                </div>
            @endforeach
        </div>
    </div>
@endsection