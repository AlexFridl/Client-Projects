@extends('layout.index')

@section('keywords')  
    @foreach($podaci as $p)
        {{$p->keywords}}  
    @endforeach
@endsection

@section('keywords')  
    @foreach($podaci as $p)
        {{$p->description}}  
    @endforeach
@endsection

@section('title')
    Blog
@endsection

@section('content')
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_padding blogSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="col-lg-4 searchBlog">
                        <div class="blog_right_sidebar">
                        </div>
                    </div>
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" style="margin:0px auto;" src="{{asset('/')}}img/blog/{{$oneBlog->putanja_slika_blog}}" alt="$oneBlog->putanja_slika_blog}}"/>
                        </div>
                        <div class="blog_details">
                            <h2>{!! $oneBlog->naslov_blog !!}</h2>
                            <p class="excert">
                                {!! $oneBlog->podnaslov_blog !!}
                            </p>
                            <p>
                               {!! $oneBlog->text_blog !!}
                            </p>
                            <p>
                                {!! date("d.m.Y",$oneBlog->postavljeno) !!}
                            </p>
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            <img class="radius" src="{{asset('/')}}img/spela4.gif" alt="spela">
                            <div class="media-body">
                                <a href="#">
                                    <h4>Špela Klajnšček Mikosavljević</h4>
                                </a>
                                <p>"Spelin citat"</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </section>
    <!--================Blog Area end =================-->
    </div>
    </div>
    </div>
    </section>

@endsection
