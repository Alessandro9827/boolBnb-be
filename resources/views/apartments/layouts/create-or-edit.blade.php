@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">

            @include('partials.error')

            <form action="@yield('form-action')" method="POST" enctype="multipart/form-data">
                @csrf
                @yield('form-method')
                
                <div class="form-group mb-3">
                    <label for="title">Insert title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title', $apartment->title)}}">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Please type a description</label>
                    <textarea type="description" class="form-control" id="description" name="description"> {{old('imgs', $apartment->imgs)}}
                    </textarea>
                </div>
                <div class="form-group mb-3">
                    <div>
                        <label for="no_rooms">Number of rooms</label>
                        <input type="number" class="form-control d-inline w-50" id="no_rooms" name="no_rooms" value="{{old('no_rooms', $apartment->no_rooms)}}">
                    </div>
                </div>
                
                <div class="form-group mb-3">
                    <label for="no_beds">Number of beds:</label>
                    <input type="number" class="form-control" id="no_beds" value="{{old('no_beds', $apartment->no_beds)}}" name="no_beds">
                </div>

                <div class="form-group mb-3">
                    <label for="no_bathrooms">Number of bath</label>
                    <input type="text" class="form-control" id="no_bathrooms" name="no_bathrooms" value="{{old('no_bathrooms', $apartment->no_bathrooms)}}">
                </div>
                <div class="form-group mb-3">
                    <label for="square_meters">Square meters</label>
                    <input type="number" class="form-control" id="square_meters" name="square_meters" value="{{old('square_meters', $apartment->square_meters)}}">
                </div>
                <div class="form-group mb-3">
                    <label for="address">Address of the apartment</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{old('address', $apartment->address)}}">
                </div>
                <div class="form-group mb-3">
                    <label for="img" class="form-label">Images</label>
                    <input type="file" class="form-control" id="img" name="img" value="{{old('img', $apartment->img)}}">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="visible" class="form-label">Visible?</label>
                    <input type="radio" class="form-control" id="visible" name="visible" value="{{old('visible', $apartment->visible)}}">
                </div> --}}
                <div class="form-group mb-3">
                    <label for="price">Prices</label>
                    <input type="float" class="form-control" id="price" name="price" value="{{old('price', $apartment->price)}}">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
        </div>
    </div>
</div>




@endsection