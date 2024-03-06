@extends('apartments.layouts.edit-or-create')

@section('form-action')
    {{ route('user.apartments.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection