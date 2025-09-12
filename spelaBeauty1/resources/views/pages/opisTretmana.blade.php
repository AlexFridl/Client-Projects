@extends('layout.index')

@section('keywords')
@endsection

@section('description')
@endsection


@section('title') Tretmani @endsection

@section('content')

        <div class="row justify-content-center" >
            <div class="col-md-10 text-center mt-3 mb-3 multi-column-text">
                <h3 style="color: #515828;font-weight: bold;">{{$podkategorija['podkat_naziv']}}</h3>
            </div>

            <div class="col-md-10 mb-5 text-justify multi-column-text">
                <p class="tekst aktivanNeaktivan" >{!! $podkategorija['tekst_podkat'] !!}</p>
            </div>
            @if($podkategorija['podkat_naziv'])
                <img class="img-fluid radius mb-5 text-center" src="{{asset('/')}}img/tretmani/{{$podkategorija['slika_putanja']}}" width="400px" height="300px"
                    alt="{{$podkategorija['podkat_naziv']}}"/>
            @endif
        </div>

    </section>

@endsection
