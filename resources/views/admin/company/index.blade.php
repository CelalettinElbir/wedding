@extends('admin.layouts.master')

@section('css')
    <link href="{{ asset('back/') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-primary">
                            <tr>
                                <th>Id</th>
                                <th>Şirket Adı</th>
                                <th>açıklama</th>
                                <th>kapasite</th>
                                <th>yemek kapasite</th>
                                <th>Fiyat</th>
                                <th>konum</th>
                                <th>İşlemler</th>

                                <th>email</th>
                                <th>password</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Şirket Adı</th>
                                <th>açıklama</th>
                                <th>kapasite</th>
                                <th>yemek kapasite</th>
                                <th>Fiyat</th>
                                <th>konum</th>
                                <th>İşlemler</th>

                                <th>email</th>
                                <th>password</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($allCompanies as $company)
                                <tr>

                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->company_name }}</td>
                                    <td>{{ $company->capasity }}</td>
                                    <td>{{ $company->mealcapacity }}</td>
                                    <td>{{ $company->price }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('admin.company.show', [$company]) }}" class="btn btn-primary"><i
                                                class="fa fa-eye "></i></a>

                                        <form action="{{ route('admin.company.destroy', [$company]) }}" type="submit"
                                            method='post'>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-times"></i></button>
                                        </form>


                                        <a href="{{ route('admin.company.edit', $company) }}" class="btn btn-warning"> <i
                                                class="fa fa-edit  fa-0.5x"></i></a>
                                    </td>
                                    <td>{{ substr($company->location, 0, -6) }}</td>

                                    <td>{{ $company->password }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>



{{-- @section('js')
    <script src="{{ asset('back/') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('back/') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('back/') }}/js/demo/datatables-demo.js"></script>
@endsection --}}
