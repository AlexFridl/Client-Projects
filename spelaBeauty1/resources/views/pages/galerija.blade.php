{{-- @extends('layout.index')

@section('description')  @endsection
@section('keywords')  @endsection

@section('title')
    Galerija
@endsection

@section('content')
<section class="about_us " style="padding-top: 50px;">
    <div class="container">
        <div class="row justify-content-center mt-3" id="ispis">
            @foreach($galerija as $g)
                <div class="col-md-4 mt-3 mb-5 text-center">
                    <h4>
                        <a class="tekst1 povecanjeNaslova "
                            href="">
                            <img class="img-fluid radius image over galAlignSlika"   src="{{asset('/')}}img/galerija/{{$g['putanja_slika']}}" width="70%" height="50%" data-alt="{{$g->t_naziv}}" data-title="My caption"/>
                            {{ $g['putanja_slika'] }}
                        </a>
                    </h4>
                </div>
            @endforeach

            <div class="paginacijaTretmani">
                {{ $galerija->links() }}
            </div>
        </div>
    </div>
</section>


@endsection --}}
