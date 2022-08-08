@extends('layout')

@section('content')
    @foreach ($company->takePackage() as $item)
        {{ $company }}
    @endforeach
@endsection
