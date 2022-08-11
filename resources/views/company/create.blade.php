@extends('layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="content mt-2">

        <div class="col-md-6 mx-auto  bg-light">

            <div class="card-header">
                <h2 class="text-center">Firma olarak Kaydol </h2>
            </div>
            <form class="card-body container justify-content-center" method="POST" action="/company/create"
            enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Email adresi</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="name">Ad</label>
                    <input class="form-control" id="name" placeholder="Enter your Name" name="name">

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name">Firma Adı</label>
                            <input class="form-control" id="name" placeholder="Enter your Name" name="company_name">

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telno">Telefon numarasi</label>
                            <input class="form-control" id="telno" placeholder="Enter your Phone" name="telno"
                                type="number">
                        </div>

                    </div>


                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="password">şifre </label>
                            <input class="form-control" type="password" id="password" name="password">

                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="password_confirmation">Şifre onay </label>
                            <input type="password" class="form-control" id="password_confirmation"
                                placeholder="Confirm your Password" name="password_confirmation">
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="capasity">Mekan kapasitesi</label>
                            <input type="text" class="form-control" id="capasity" name="capasity">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mealcapacity">Yemek kapasitesi</label>
                            <input type="number" class="form-control" id="mealcapacity" name="mealcapacity">
                        </div>
                    </div>

                </div>





                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Fiyat</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="file_path">resim yükle</label>
                        <input type="file" class="form-control" id="file_path" name="file_path[]" multiple>
                    </div>

                </div>

                {{-- ----------------------------------------------- --}}
                <div class="form-group">
                    <label for="description">Açıklama </label>

                    <textarea name="description" class="form-control" id="description" cols="10" rows="2"></textarea>

                </div>

                <div class="form-group">
                    <label for="location">Konum </label>
                    <textarea name="location" class="form-control" id="location" cols="10" rows="2"></textarea>
                </div>


                <div class="mt-2 d-flex justify-content-between">
                    <a href="/user/login" class="btn btn-outline-primary">hesabınız var mı ? </a>
                    <button type="submit" class="btn btn-primary float-center ">Submit</button>
                </div>

            </form>

        </div>


    </div>
@endsection
