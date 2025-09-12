{{-- @extends('layout.index')

@section('keywords')
        {{$podaci->keywords}}
@endsection

@section('description')
        {{$podaci->description}}
@endsection


@section('title') Kategorije tretmana @endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8 text-center mt-5 mb-5">
            <h3 style="color: #515828;font-weight: bold;">{{$kategorija['kat_naziv']}}</h3>
        </div>
    </div>
    @if(!empty($kategorija['text_kat']))
        <div class="row justify-content-center">
            <div class="col-md-8 mb-5 text-justify multi-column-text">
                <p class="tekst aktivanNeaktivan mb-5" >{!! $kategorija['text_kat'] !!}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mb-5 text-justify">
                @if($kategorija['slika_putanja'] != null)
                    <img class="img-fluid radius mb-5 text-center" src="{{asset('/')}}img/tretmani/{{$kategorija['slika_putanja']}}" width="400px" height="300px"
                        alt="{{$kategorija['kat_naziv']}}"/>
                @endif
            </div>
        </div>
    @elseif(!empty($kategorija['text_kat']) && !($podkategorije->isEmpty()))
        @include('components.sidebar_nav_podkategorije')
        <div class="row justify-content-center ">
            <div class="col-md-10 mb-5 text-justify multi-column-text ">
                <p class="tekst aktivanNeaktivan mb-5" >{!! $kategorija['text_kat'] !!}</p>
            </div>
            @if($kategorija['slika_putanja'] != null)
                <img class="img-fluid radius mb- 5 text-center" src="{{asset('/')}}img/tretmani/{{$kategorija['slika_putanja']}}" width="400px" height="300px"
                    alt="{{$kategorija['kat_naziv']}}"/>
            @endif
        </div>
    @endif
</section>

</div>
</div>

@endsection --}}
