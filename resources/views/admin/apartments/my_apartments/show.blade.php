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
                            The house has:
                            <ul>
                                <li>
                                    {{ $apartment->no_rooms}} rooms
                                </li>
                                <li>
                                    {{ $apartment->no_beds}} beds
                                </li>
                                <li>
                                    {{ $apartment->no_bathrooms}} bathrooms
                                </li>
                            </ul>
                        </p>
                        <p class="card-text">
                            User of the apartment: {{isset($apartment->user_id) ? $apartment->user->name : 'Nessuno'  }}          
                          </p>
                        <p>
                            Square meters {{ $apartment->square_meters}}mq, and is located in {{ $apartment->address}}.
                        </p>
                        <p>
                            Services: @foreach ( $apartment->services as $service )

                            <ul>
                                <li>
                                    {{ $service->name }}
                                </li>
                            </ul>
                                
                            @endforeach
                        </p>
                        {{-- @foreach ($apartment->leads as $message)                             
                            <li>                                 
                                <p class="m-0">messaggio da:{{ $message->name }}</p>                                 
                                <p>{{ $message->message }}</p>                             
                            </li>                         
                        @endforeach --}}
                        <p>
                            {{-- messaggio: {{isset($apartment->lead->message) ? $apartment->lead->message : 'Non ci sono messaggi!' }} --}}
                            {{-- Messaggio: {{ $leadCorrect->message }} --}}
                           
                        </p>
                        @if (count($apartment->sponsors) !== 0)
                            <h1>Sponsored</h1>
                        @endif

                        <a href="{{ route('admin.my_apartments.messages', $apartment) }}" class="btn btn-primary">
                            Messages
                        </a>
                    </div>
                    <a href="{{ route('admin.my_apartments.edit', $apartment) }}" class="text-decoration-none">
                        <button class="btn btn-sm btn-success">
                            Edit
                        </button>
                    </a>
                    <form class="d-inline-block apartment-eraser"  action="{{ route('admin.apartments.destroy', $apartment) }}" method="POST" data-apartment-name="{{ $apartment['title'] }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-warning" >
                            Delete
                        </button>
                    </form>
                    {{-- @dump(count($apartment->sponsors)) --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('admin.sponsor', $apartment)}}" method="GET">
                                    <div class="modal-body">
                                        {{-- @dump($apartment) --}}
                                        <h5>Sponsors</h5>
                                        <select name="sponsors" id="sponsors">
                                            @foreach ($sponsors as $sponsor)
                                                <option value="{{$sponsor->id}}"> {{$sponsor->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @include('admin.apartments.my_apartments.sponsor')
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

