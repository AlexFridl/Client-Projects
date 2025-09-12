@extends('layout.index')

@section('keywords')
        {{$podaci->keywords}}
@endsection

@section('keywords')
        {{$podaci->description}}
@endsection


@section('title') Tretmani @endsection

@section('content')

<section class="about_us mt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center mb-3 ">
                <h2 style="color: #515828;font-weight: bold;">{{$tretman['t_naziv']}}</h2>
            </div>
        </div>
        <div id="podaci_kategorije">
            <div class="row justify-content-center">
                @if(count($kategorija->podkategorijas) > 1)
                    <div class="sidebar col-md-3 pl-5" >
                        <nav class="mt-3 mb-3">
                            <ul class="nav flex-column" id="nav_accordion">`;
                                {{-- {{ dd(count($kategorija->podkategorijas)) }} --}}
                                @foreach ( $kategorija->podkategorijas as $podkategorija)
                                {{-- {{ dd($status) }} --}}
                                    <li class="nav-item">
                                        <a class="nav-link tekst link_podkategorije"
                                            href="{{ route('podkategorija',
                                                    ['id_tt' => $tretman['tt_id'],
                                                    'id_tretman' => $tretman['id_tretman'],
                                                    'id_kategorija' => $podkategorija->kategorija_id,
                                                    'id_podkategorija' => $podkategorija->id_podkategorija ]) }}"
                                            data-id_podkategorija="{{ $podkategorija->id_podkategorija }}"
                                            data-id_kategorija="{{ $podkategorija->kategorija_id }}"
                                            data-id_t="{{ $tretman['id_tretman'] }}"
                                            data-id_tt="{{ $tretman['tt_id'] }}"
                                            >
                                            {!!  $podkategorija->podkat_naziv  !!}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                    <div class="col-md-8 ml-5 mb-5">
                        <h3>
                            @if($status === 'podkategorija')
                                {!! $podkategorija->podkat_naziv !!}
                            @else
                                {!! $kategorija->kat_naziv !!}
                            @endif
                        </h3>
                        <div class="tekst aktivanNeaktivan  px-3 multi-column-text">
                            @if($status === 'podkategorija')
                                {!! $podkategorija->tekst_podkat !!}
                            @else
                                {!! $kategorija->text_kat !== null ? $kategorija->text_kat : '' !!}
                            @endif
                        </div>
                        <div class="tekst aktivanNeaktivan mt-3 px-3" id="podaci_podkategorije"></div>
                    </div>
                @else
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-8 text-center ">
                            <h3>
                                @if($status === 'podkategorija')
                                    {!! $podkategorija->podkat_naziv !!}
                                @else
                                    {!! $kategorija->kat_naziv !!}
                                @endif
                            </h3>
                            <div class="tekst aktivanNeaktivan  multi-column-text">
                                @if($status === 'podkategorija')
                                    {!! $podkategorija->tekst_podkat !!}
                                @else
                                    {!! $kategorija->text_kat !== null ?  $kategorija->text_kat  : '' !!}
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>



</section>

</div>
</div>

@endsection
