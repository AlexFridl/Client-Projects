@extends('layout.index')

@section('keywords')
        {{$podaci->keywords}}
@endsection

@section('description')
        {{$podaci->description}}
@endsection


@section('title') Tretmani @endsection

@section('content')
<section class="about_us " style="padding-top: 50px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center mt-3 mb-3 ">
                <h2 style="color: #515828;font-weight: bold;">{{$tretman['t_naziv']}}</h2>
            </div>
        </div>
        <div id="podaci_kategorije">
            {{-- NEMA TEXT T./ IMA TXT KAT. / NEMA PODKAT. (1.) --}}
        @if(isset($tretman) && empty($tretman['text_tretman'] && isset($kategorije)) )
            <div class="row justify-content-center mt-3" id="podaci">
                @foreach ($kategorije as $kategorija )
                    <div class="col-md-4 mt-3 mb-5 text-justify">
                        <h3>
                            <a  class="tekst1 povecanjeNaslova link_kategorije"
                                data-id_kategorija="{{ $kategorija->id_kategorija }}" {{-- $kategorija->id_kategorija --}}
                                {{-- data-id_t="{{ $kategorija->t_id }}" $id_tretman --}}
                                data-id_t="{{ $id_tretman }}"
                                {{-- data-id_tt="{{$kategorija->tretman['tt_id'] }}" $id_tt --}}
                                data-id_tt="{{$id_tt }}"
                                href="{{route('kategorija',['id_tt'=>$id_tt,'id_tretman' => $id_tretman, 'id_kategorija' => $kategorija->id_kategorija ]) }}">
                                {{-- href="{{route('kategorija',['id_tt'=>$id_tt,'id_tretman' => $id_tretman, 'id_kategorija' => $kategorija->id_kategorija ]) }}" --}}
                                    {{$kategorija->kat_naziv}}
                            </a>
                        </h3>
                        <p class="aktivanNeaktivan ">
                            {!! $truncated = Str::limit($kategorija->text_kat, 200, ' (...)') !!}
                        </p>
                        <div class="row justify-content-left">
                            <div class="col-md-4">
                                <b>
                                    <a class=" tekst"
                                        href="{{route('kategorija',['id_tt'=>$id_tt,'id_tretman' => $id_tretman, 'id_kategorija' => $kategorija->id_kategorija ]) }}">
                                        Više
                                    </a>
                                </b>
                            </div>
                            @if($kategorija->cena)
                                <div class="col-md-4 mb-5">
                                    <span class="tekst" >Cena:
                                        <i class="bi bi-tags-fill fs-normal">
                                            {!! $kategorija->cena !!} RSD
                                        </i>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="about_us_video">
                            @if($kategorija->slika_putanja)
                                <img class="img-fluid radius" src="{{asset('/')}}img/tretmani/{{$kategorija->slika_putanja}}" width="250px" height="150px" alt="{{$kategorija->kat_naziv}}"/>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif(isset($tretman) && !empty($tretman['text_tretman']) && $kategorije->isEmpty())
            {{-- IMA TXT / NEMA TXT KAT. / NEMA PODKAT. (2.) --}}

            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-justify multi-column-text">
                    <p class="tekst aktivanNeaktivan" >{!! $tretman['text_tretman'] !!}</p>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class="col-md-10 mb-5 text-justify">
                    <span class=" tekst " > Cena:
                        <i class="bi bi-tags-fill fs-normal">  {!! $tretman['cena'] !!} RSD</i>

                    </span>
                </div>
            </div>
            @if($tretman['putanja_slika'])
                <div class="about_us_video  mb-5 text-center">
                    <img class="img-fluid radius" src="{{asset('/')}}img/tretmani/{{$tretman['putanja_slika']}}" width="250px" height="150px" alt="{{$tretman['t_naziv']}}"/>
                </div>
            @endif
        @elseif(isset($tretman) && $tretman['text_tretman'] != null && isset($kategorije))
            {{-- IMA TXT T. / IMA TXT. KAT. / NEMA PODKAT. (3.) --}}
            @include('components.sidebar_nav_kategorije')
            <div class="row justify-content-center ">
                <div class="col-md-10 mb-3 text-justify multi-column-text ">
                    <p class="tekst aktivanNeaktivan mb-5" >{!! $tretman['text_tretman'] !!}</p>
                </div>
                @if($tretman['putanja_slika'] != null)
                    <img class="img-fluid radius mb- 5 text-center" src="{{asset('/')}}img/tretmani/{{$tretman['putanja_slika'] }}" width="400px" height="300px"
                        alt="{{$tretman['t_naziv']}}"/>
                @endif
            </div>
                <div id="podaci">
                    {{-- Ovde ide sadrzaj texta kategorije --}}
                </div>
            {{-- NEMA TXT. T. / IMA TXT. KAT. / IMA PODKAT. (4.) -> ODRADJEN PREKO AJAXA--}}
            {{-- IMA TXT. T. / IMA TXT. KAT. / IMA PODKAT. (5.) -> ODRADJEN PREKO AJAXA--}}
        @else
        {{-- OVO PREPAKOVATI DA NE TREBA --}}
        {{ dd('poz i razvijaj dalje') }}

        @endif
    </div>
    </div>


</section>

</div>
</div>

@endsection
