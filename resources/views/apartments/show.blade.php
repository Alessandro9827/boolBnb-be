@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <h1>
                        {{$apartment->title}}
                    </h1>
                    @if (str_starts_with($apartment->img, 'http'))
                    <img src="{{$apartment->img}}" alt="" >
                        
                    @else
                        
                        <img src="{{ asset ('storage') . '/' . $apartment->img}}" alt="">
                 
                    @endif 
                </div>
            </div>
        </div>
    </div>
@endsection

