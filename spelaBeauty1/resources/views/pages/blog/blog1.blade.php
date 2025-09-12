@extends('layout.index')

@section('keywords')
    {{-- @foreach($podaci as $p) --}}
        {{$podaci->keywords}}
    {{-- @endforeach --}}
@endsection

@section('keywords')
    {{-- @foreach($podaci as $p) --}}
        {{$podaci->description}}
    {{-- @endforeach --}}
@endsection

@section('title')
    Blog1
@endsection
@section('content')
    <section class="about_us " style="padding-top: 50px;">
        <div class="container">
            <div class="row justify-content-center" style="padding-bottom: 50px;">
                <div class="col-lg-12">
                    <div class="blog_right_sidebar" style="float: right; ">
                        <aside class="single_sidebar_widget search_widget pozadinaSearchBloger radius" style="background-color: rgba(255,222,173,0.5);">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="searchBlog1" id="searchBlog1" class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Search Keyword'" />
                                </div>
                            </div>
                            <input class="button rounded-0 primary-bg text-white w-100 btn_1 btnSearch pozadinaSearchBlogerDugme" name="btnSearchBlog1" id="btnSearchBlog1"
                                type="submit" value="Search"/>
                        </aside>
                    </div>
                    <h2 class="naslovBlog">Blogovi</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-3">
                        {{-- <div style="float: none;"> --}}
                            @foreach($blog as $b)
                                <div class="col-md-6 ">
                                    <div class="about_us_content" id="opisTretmana">
                                        <a class="tekst1 povecanjeNaslova" href="{{route('one_Blog',['id_blog'=>$b->id_blog])}}">{!! $b->naslov_blog !!}</a>
                                        <p class="aktivanNeaktivan ">
                                            {!! $truncated = Str::limit($b->text_blog, 200, ' (...)') !!}
                                        </p>
                                        <p class="skraceniBlog">
                                            <b><a href="{{route('one_Blog',
                                            ['id_blog'=>$b->id_blog])}}" class="navigacija" >Više</a></b>
                                        </p>
                                        <div class="about_us_video">
                                            <img class="img-fluid radius mt-5" src="{{asset('/')}}img/blog/{{$b->putanja_slika_blog}}" width="250px" height="150px" alt="{{$b->naslov_blog}}"/>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-5">
                        {{ $blog->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
