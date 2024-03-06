@extends('apartments.layouts.create-or-edit')

@section('form-action')
    {{ route('user.apartments.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection