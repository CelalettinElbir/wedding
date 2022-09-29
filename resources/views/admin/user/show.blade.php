@extends('admin.layouts.master')

@section('content')
    <div class="container">


        <div class="card shadow mb-4">
            <div class="card ">
                <div class="card-header">

                    <h4>Şirket özellikleri </h5>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">özellikler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Ad</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email </th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">şifre </th>
                                <td>{{ $user->password }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>
@endsection
