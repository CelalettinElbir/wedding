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
                                <td>{{ $company->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Şirket Adı </th>
                                <td>{{ $company->company_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Telefon </th>
                                <td>{{ $company->telno }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Açıklama </th>
                                <td>{{ $company->description }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Açıklama </th>
                                <td>{{ $company->description }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Mekan kapasitesi </th>
                                <td>{{ $company->capasity }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Yemek kapasitesi </th>
                                <td>{{ $company->mealcapacity }}</td>
                            </tr>
                            <tr>
                                <th scope="row">konum </th>
                                <td>{{ $company->location }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email </th>
                                <td>{{ $company->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">şifre </th>
                                <td>{{ $company->password }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>
@endsection
