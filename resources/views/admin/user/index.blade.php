@extends("admin.layouts.master")


@section('content')
<div class="container">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kullanıcılar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>Id</th>
                            <th>İsim</th>
                            <th>Email</th>
                            <th>password</th>
                            <th>İşlemler</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>İsim</th>
                            <th>Email</th>
                            <th>password</th>
                            <th>İşlemler</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($allUsers as $user)
                            <tr>

                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>

                                <td class="d-flex gap-1">
                                    <a href="{{ route('admin.user.show', [$user]) }}" class="btn btn-primary"><i
                                            class="fa fa-eye "></i></a>

                                    <form action="{{ route('admin.user.destroy', [$user]) }}" type="submit"
                                        method='post'>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fa fa-times"></i></button>
                                    </form>


                                    <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-warning"> <i
                                            class="fa fa-edit  fa-0.5x"></i></a>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    

@endsection