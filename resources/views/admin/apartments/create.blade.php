@extends('admin.apartments.layouts.create-or-edit')
@section('page-title', 'Create apartment')
@section('form-action')
    {{ route('admin.apartments.store', $apartment) }}
@endsection

@section('form-method')
    @method('POST')
@endsection