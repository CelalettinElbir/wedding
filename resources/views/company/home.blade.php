@extends('layout2')
@include('partials.lastnavbarindex')
@section('content')
    <div class="container">

        <div class="company-info d-flex justify-content-center m-3 ">

            <div class="card mb-3" style="max-width: 400px; ">


                @if (Auth::guard('company')->user()->takeimages()->isEmpty())
                    <img src="{{ asset('/img/no-image.jpg') }}" class="card-img-top" alt="...">
                @else
                    <img src="{{ asset('/images/resource/' .Auth::guard('company')->user()->takeimages()->last()->url) }}"
                        class="card-img-top">
                @endif


                <div class="card-body">
                    <h5 class="card-title">{{ Auth::guard('company')->user()->company_name }}</h5>
                    <div>
                        {{-- <p class="card-text">{{ Auth::guard('company')->user()->description }}</p> --}}
                        {!! Auth::guard('company')->user()->description !!}

                    </div>


                    <div class="card-actions d-flex justify-content-between  ">
                        {{-- <form action="{{ route('company.delete', [Auth::guard("company")->user()]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                delete
                            </button>
                        </form>
                        <div> --}}

                            <a class="btn btn-primary"
                                href="{{ route('company.edit', [Auth::guard('company')->user()->id]) }}">edit
                            </a>

                        </div>
                    </div>






                </div>





            </div>


        </div>


    </div>




    </div>
@endsection
