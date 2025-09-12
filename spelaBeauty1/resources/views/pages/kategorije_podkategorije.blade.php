{{-- @extends('layout.index')

@section('keywords')
        {{$podaci->keywords}}
@endsection

@section('description')
        {{$podaci->description}}
@endsection


@section('title') Tretmani @endsection

@section('content')
    <h4></h4>

    <div class="row justify-content-center">
        @foreach ($podkategorije as $podkategorija )
            <div class="col-md-4 float-left mt-5">
                <div class="about_us_content ">
                    <h4>
                        <a class="tekst1 povecanjeNaslova"
                            href="{{route('podkategorija',['id_tt'=>$id_tt,'id_tretman' => $id_tretman, 'id_kategorija' => $podkategorija->kategorija_id, 'id_podkategorija' => $podkategorija->id_podkategorija ]) }}"
                    >
                            {{$podkategorija->podkat_naziv}}

                        </a>
                    </h4>
                    <p class="aktivanNeaktivan ">
                        {!! $truncated = Str::limit($podkategorija->tekst_podkat, 200, ' (...)') !!}
                    </p>
                    <p class="skraceniBlog">
                        <b>
                            <a class="navigacija"
                                href="{{route('podkategorija',['id_tt'=>$id_tt,'id_tretman' => $id_tretman, 'id_kategorija' => $podkategorija->kategorija_id, 'id_podkategorija' => $podkategorija->id_podkategorija ]) }}"
                                >Više
                            </a>
                        </b>
                    </p>
                    <div class="about_us_video">
                        @if ($podkategorija->slika_putanja)
                            <img class="img-fluid radius" src="{{asset('/')}}img/tretmani/{{$podkategorija->slika_putanja}}" width="250px" height="150px" alt="{{$podkategorija->podkat_naziv}}"/>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        <div class="paginacijaTretmani">
            {{ $podkategorije->links() }}
        </div>
    </div>


</section>

</div>
</div>

@endsection --}}
