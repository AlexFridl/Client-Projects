@extends('layout.index')

@section('keywords')
    {{ $podaci->keywords }}
@endsection

@section('description')
    {{ $podaci->description }}
@endsection

@section('title')
    Blog
@endsection

@section('content')
    <!--================Blog Area =================-->
    <section class="single-post-area mb-3">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-10 mt-5 mb-3 text-center">
                    <h2>
                        <a href="{{ route('one_Blog', ['id_blog' => $oneBlog->id_blog]) }}">
                            {!! $oneBlog->naslov_blog !!}
                        </a>
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center align-items-start">
                <div class="col-lg-4 mt-2"
                    style="border:3px solid #515828;border-radius:5px;">
                    <img class=" img-fluid p-1"
                        src="{{ asset('/') }}img/blog/{{ $oneBlog->putanja_slika_blog }}"
                        alt="{{ $oneBlog->naslov_blog }}" />
                </div>
                <div class="col-lg-6">
                    <p class="aktivanNeaktivan ">
                        {!! $oneBlog->text_blog !!}
                    </p>
                    @if ($oneBlog->video_link)
                        <div class="d-flex justify-content-end mt-4">
                            <div class="feature-img">
                                {!! $oneBlog->video_link !!}
                            </div>
                        </div>
                    @endif
                    <div class="d-flex justify-content-end">
                        <p class="datum">
                            <i>Postavljeno {!! date('d.m.Y', $oneBlog->postavljeno) !!} </i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center blog-author" style="background-color: rgba(255,222,173,0.5);padding:0px;">
                <div class="col-md-4 d-flex  align-items-center justify-content-end">
                    <img src="{{ asset('/') }}img/IMG_9850.jpg" alt="spela" class="img-fluid rounded ms-auto">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-start">
                    <p class="tekst mt-3">
                        "Ljubavlju prema sebi negujemo unutrašnju i spoljašnju
                        lepotu."
                    </p>
                    <h4 class="naslov mt-4"> - Špela Klajnšček Mikosavljević</h4>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area end =================-->
@endsection
