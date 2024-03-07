@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <h1>
                My apartment
            </h1>
            @foreach ($apartments as $apartment)
                <div class="col-3">
                    <div class="card">
                        <h3>
                            {{$apartment->title}}
                        </h3>
                        {{-- @dump(json_decode($apartment->imgs)) --}}
                       {{--  @foreach (json_decode($apartment->imgs) as $img)
                        <img src="{{$img}}" alt="">
                            
                        @endforeach --}}
                        <img src="{{$apartment->img}}" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection