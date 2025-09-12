@extends('layout.index')

@section('keywords')
    @foreach($podaci as $p)
        {{$p->keywords}}
    @endforeach
@endsection

@section('description')
    {{-- This is the description for the salon rules page --}}
    @foreach($podaci as $p)
        {{$p->description}}
    @endforeach
@endsection

@section('title') Ponuda @endsection

@section('content')
    {{-- @include('components.sidebar_nav') --}}

    <section class="blog_area single-post-area section_padding blogSection blogContainer" >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img slikaIspodTxt">
                            <img class="img-fluid radius" style="display: block;margin:0px auto;margin-left:400px;" src="{{asset('/')}}img/tretmani/{{$tretman->putanja_slika}}" width="400px" height="300px" alt="{{$tretman->t_naziv}}"/>
                        </div>
                        <div class="blog_details">
                            <h5 style="color: #515828;font-weight: bold;">{{$tretman->t_naziv}}</h5>
                            <p class="tekst aktivanNeaktivan" >{!! $tretman->text_tretman !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </section>


@endsection
