@extends('layout')



@section('content')
    <div class="container">
        {{-- {{ dd($company->id) }} --}}
        <form action="{{ route('store-service') }}" method="POST" class="mt-3">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="addMoreInputFields[0][subject]" placeholder="Enter subject"
                            class="form-control" />
                           <input type="hidden" name="company" value={{$company->id}} />

                    </td>

                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-info">Add
                            Subject</button></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-outline-success btn-block">Save</button>

        </form>
    </div>


    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
                '][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>

@endsection
