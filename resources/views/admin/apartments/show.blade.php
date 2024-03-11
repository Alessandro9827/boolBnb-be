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
                        <p>
                            Square meters {{ $apartment->square_meters}}mq, and is located in {{ $apartment->address}}.
                        </p>
                    </div>
                    <a href="{{ route('admin.apartments.edit', $apartment) }}" class="text-decoration-none d-inline-block">
                        <button class="btn btn-sm btn-success">
                            Edit
                        </button>
                    </a>

                    <form class="d-inline-block apartment-eraser"  action="{{ route('admin.apartments.destroy', $apartment) }}" method="POST" data-apartment-name="{{ $apartment['title'] }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-warning" >
                            elimina
                        </button>
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const form = document.querySelector('form.apartment-eraser');
        form.addEventListener('click', function(event) {
            event.preventDefault();

            const name = this.getAttribute('data-apartment-name');
            const confirmWindow = window.confirm(`Vuoi tu eliminare definitivamente ${name}?`);
            if (confirmWindow) this.submit();
        });
    </script>
@endsection