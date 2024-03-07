@extends('apartments.layouts.create-or-edit')

@section('page-title', 'Edit apartment')


@section('form-action')
    {{ route('user.apartments.update', $apartment) }}
@endsection

@section('form-method')
    @method('PUT')
@endsection