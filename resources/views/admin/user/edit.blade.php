@extends('admin.layouts.master')

@section('content')
    <div class="container">


        <form method="POST" action="{{ route('admin.user.update', $user) }}">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="email">Email adresi</label>
                <input type="text" class="form-control" value="{{ old('email', $user->email) }}" id="email"
                    placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="name">Ad</label>
                <input class="form-control" id="name" value="{{ old('name', $user->name) }}"
                    placeholder="Enter your Name" name="name">

            </div>

            <button type="submit" class="btn btn-primary">kaydet</button>
        </form>
    </div>
@endsection
