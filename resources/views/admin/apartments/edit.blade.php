@extends('admin.apartments.layouts.create-or-edit')

@section('page-title', 'Edit apartment')


@section('form-action')
    {{ route('admin.apartments.update', $apartment) }}
@endsection

@section('form-method')
    @method('PUT')
@endsection