@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <h1>
                        {{$apartment->title}}
                    </h1>
                    @foreach (json_decode($apartment->imgs) as $img)
                    <img src="{{$img}}" alt="">
                        
                    @endforeach
                    {{-- @dump(json_decode($apartment->imgs)) --}}

                </div>
            </div>
        </div>
    </div>
@endsection

<?php 
$imgs = json_decode($apartment->imgs);
// dd($imgs[0])

?>