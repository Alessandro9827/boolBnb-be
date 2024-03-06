@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <h1>
                        {{$apartment->title}}
                    </h1>
                    {{-- @if (isset(filetype($apartment->imgs)))
                            <img src="{{$apartment->imgs}}" alt="">
                        
                    @else
                        @foreach (json_decode($apartment->imgs) as $img)
                        <img src="{{$img}}" alt="">
                        
                        @endforeach
                    @endif --}}
                    {{-- @dump(json_decode($apartment->imgs)) --}}

                </div>
            </div>
        </div>
    </div>
@endsection

