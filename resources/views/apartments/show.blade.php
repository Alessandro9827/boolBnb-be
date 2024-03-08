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
                    <div>
                        <p>
                            {{ $apartment->description}}
                        </p>
                    </div>
                    <div>
                        <p>
                            La casa ha:
                            <ul>
                                <li>
                                    {{ $apartment->no_rooms}} stanze
                                </li>
                                <li>
                                    {{ $apartment->no_beds}} camere da letto
                                </li>
                                <li>
                                    {{ $apartment->no_bathrooms}} bagni
                                </li>
                            </ul>
                        </p>
                        <p>
                            E' una casa grande {{ $apartment->square_meters}}mq, ed è situata in {{ $apartment->address}}.
                        </p>
                    </div>
                    <a href="{{ route('user.apartments.edit', $apartment) }}" class="text-decoration-none">
                        <button class="btn btn-sm btn-success">
                            Edit
                        </button>
                    </a>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
@endsection

