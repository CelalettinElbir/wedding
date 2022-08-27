@extends('layout2')
@include('partials.lastnavbarindex')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
    $user = Auth::guard('company')->user();
    @endphp

    <div class="col-md-6 mx-auto  bg-light">
        <div class="card-header">
            <h2 class="text-center">Firma düzenle</h2>
        </div>
        <form class="card-body container justify-content-center" method="POST"
            action="{{ route('company.update', [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
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

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="company_name">Firma Adı</label>
                        <input class="form-control" id="name" value="{{ old('company_name', $user->company_name) }}"
                            placeholder="Enter your Name" name="company_name">

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telno">Telefon numarasi</label>
                        <input class="form-control" value="{{ old('telno', $user->telno) }}" id="telno"
                            placeholder="Enter your Phone" name="telno" type="number">
                    </div>

                </div>


            </div>




            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="capasity">Mekan kapasitesi</label>
                        <input type="text" class="form-control" value="{{ old('capasity', $user->capasity) }}"
                            id="capasity" name="capasity">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mealcapacity">Yemek kapasitesi</label>
                        <input type="number" value="{{ old('mealcapacity', $user->mealcapacity) }}" class="form-control"
                            id="mealcapacity" name="mealcapacity">
                    </div>
                </div>

            </div>





            <div class="row">

                <div class="col">
                    <div class="form-group">
                        <label for="price">Fiyat</label>
                        <input type="text" value="{{ old('price', $user->price) }}" class="form-control" id="price"
                            name="price">
                    </div>



                </div>



                <div class="col">


                    <div class="form-group">
                        <!-- Modal -->
                        <div class="modal fade" id="imagemodel" tabindex="-1" aria-labelledby="imagemodel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">silmek istediğiniz fotoğrafları
                                            seçiniz
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if (count($user->takeimages()) === 0)
                                            <h1>silinecek fotoğraf yoktur. </h1>
                                        @else
                                            @foreach ($user->takeimages() as $item)
                                                <tr>

                                                    <img id="{{ $item->id }}"
                                                        src="{{ asset('/images/resource/' . $item->url) }}" width="360px"
                                                        height="240px">
                                                </tr>
                                            @endforeach
                                        @endif



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">vazgeç</button>
                                        <button type="button" class="btn btn-primary" id="deleteItems">sil</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file_path">resim yükle</label>

                        @if (count($user->takeimages()) === 0)
                            <button type="button" disabled class="btn btn-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#imagemodel">

                                silinecek fograf yoktur.

                            </button>
                        @else
                            <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#imagemodel">
                                resim sil
                            </button>
                        @endif
                        <input type="file" value="{{ old('file_path', $user->name) }}" class="form-control"
                            id="file_path" name="file_path[]" multiple>
                    </div>
                </div>




            </div>
            <div class="form-group">

                <div class="d-grid m-4  mx-auto">
                    <button class="btn btn-primary" data-bs-toggle="modal" type="button"
                        data-bs-target="#servicemodel">özellikleri düzenle</button>
                </div>



                <!-- Modal -->





            </div>

            {{-- ----------------------------------------------- --}}
            <div class="form-group">
                <label for="description">Açıklama </label>

                <textarea name="description" class="form-control" id="editor" cols="20" rows="4">
                   {{ old('description', $user->description) }}
                </textarea>

            </div>

            <div class="form-group">
                <label for="location">Konum </label>
                <textarea name="location" class="form-control" id="location" cols="10" rows="2">

                   {{ old('location', $user->location) }}

                </textarea>
            </div>








            <div class="mt-2 d-flex justify-content-between">
                <a href="" class="btn btn-outline-primary">hesabınız var mı ? </a>
                <button class="btn btn-primary float-center ">devam</button>
            </div>

        </form>








        <div class="modal fade " id="servicemodel" tabindex="-1" aria-labelledby="servicemodel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable  modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">özellikleri düzenle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <form action="{{ route('service.store') }}" method="POST" class="mt-3">
                            @csrf

                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>

                                @foreach (Auth::guard('company')->user()->takeservices() as $item)
                                    <tr class="container{{ $item->id }}">
                                        <td><input type="text" name="item{{ $item->id }}"
                                                placeholder="Enter subject" value="{{ $item->feature }}"
                                                class="form-control companyFeature" /></td>
                                        <td class="actions">
                                            <button class="btn btn-info update"
                                                name="{{ $item->id }}">güncelle</button>
                                            <button class="btn btn-danger deleteService"
                                                id="{{ $item->id }}">sil</button>


                                        </td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <td><input type="text" name="addMoreInputFields[0][subject]"
                                            placeholder="Enter subject" class="form-control" required />
                                        <input type="hidden" name="company"
                                            value={{ Auth::guard('company')->user()->id }} />

                                    </td>

                                    <td><button type="button" name="add" id="dynamic-ar"
                                            class="btn btn-outline-info">Yeni Satır Ekle</button></td>
                                </tr>
                            </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-success btn-block save-changed">Save</button>

                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


    <script>
        let updateServiceUrl = "{{ route('service.update') }}"

        $("input.companyFeature").change(function() {
            //    let CurrentUpdateButton = $(this).parents("tr").children("td.actions").children("button.update");
            let inputId = $(this).attr("name").substr("4");

            let changedInputValue = $(this).val();
            $(".update").click(function(event) {
                event.preventDefault();
                if (Number(inputId) == Number($(this).attr("name"))) {

                    $.ajax({
                        url: updateServiceUrl,
                        type: 'PUT',
                        data: {
                            "id": $(this).attr("name"),
                            "value": changedInputValue
                        },
                        success: function(result) {
                            alert(result);
                        }
                    });
                } else {
                    console.log(Number(inputId) == Number($(this).attr("name")))
                }
            });




        });






        // ilk olarak değiştirilne inputu bulman gerekşyor 
        //inputun içeriği değiştiğinde bir listeye at ->// listeye at 
        // post methoduyla birlikte güncelle.
        //  

        // let updateServiceUrl = "{{ route('service.update') }}"
        // let changedInput = [];






        // $(".save-changed").click(function() {


        //     $.ajax({
        //         url: updateServiceUrl,
        //         type: 'PUT',
        //         data: {
        //             "inputs": changedInput,

        //         },
        //         success: function(result) {
        //             console.log("dasdas",result);


        //         }
        //     });
    </script>

    <script type="text/javascript">
        let ajax_url = "{{ route('delete-images') }}";
        let token = "{{ csrf_token() }}";
        let userId = "{{ Auth::guard('company')->user()->id }}"

        $(document).ready(function() {

            $.fn.hasBorder = function() {
                if ((this.outerWidth() - this.innerWidth() > 0) || (this.outerHeight() - this.innerHeight() >
                        0)) {
                    return true;
                } else {
                    return false;
                }
            };

            var selectedImgsArr = [];
            $("img").click(function() {

                if ($(this).hasBorder()) {
                    $(this).css("border", "");
                    //you can remove the id from array if you need to
                    selectedImgsArr.delete($(this).attr("id"));

                } else {
                    $(this).css("border", "2px solid red");
                    selectedImgsArr.push($(this).attr("id"));
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });
            $("#deleteItems").click(function() {
                var e = confirm("silmek istediğinize emin misiniz?");

                if (e) {

                    $.ajax({
                        url: ajax_url,
                        type: 'DELETE',
                        data: {
                            "userId": userId,
                            "selectedImages": selectedImgsArr

                        },
                        success: function(result) {
                            console.log(result);
                            selectedImgsArr.forEach(element => {
                                document.getElementById(`${element}`).style.display =
                                    "none";


                            });

                        }
                    });
                }

            });


        });
    </script>

    <script type="text/javascript">
        $(".deleteService").click(function() {
            let parentId = $(this).attr("id");
            let deleteItemUrl = " {{ route('service.destroy') }}";


            if (confirm("silmek istediğine emin misiniz ?")) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: deleteItemUrl,
                    type: 'DELETE',
                    data: {
                        _token: token,
                        "service": $(this).attr("id"),

                    },
                    success: function(result) {

                        $(`.container${parentId}`).hide();
                    }
                });
            }
        });
    </script>



    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
                '][subject]" placeholder="özellik giriniz" class="form-control" required /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">sil</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>






@endsection


@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
