@extends('layout.app')

@section('content')

<section class="" id="apartments">
    <div class="container">
        <div class="row">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-3 mb-3">
                @foreach ($apartments as $apartment)
                    <div class="col">
                        <a href="{{ route('guest.apartments.show', $apartment->id) }}">
                            <div class="card">
                                <img src="{{ $apartment->img }}" alt="{{ $apartment->title }} picture">
                                <div class="card-body">
                                    <p class="text-uppercase">
                                        {{ $apartment->title }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>






@endsection