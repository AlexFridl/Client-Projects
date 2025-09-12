@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('description')
    {{$podaci->description}}
@endsection

@section('title') Blog1 @endsection

@section('content')
    <section  class="about_us pt-5">
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
                            <input class="button rounded-0 primary-bg text-white w-100 btn_1 btnSearch pozadinaSearchBlogerDugme"
                                name="btnSearchBlog1" id="btnSearchBlog1"
                                type="submit" value="Search"/>
                        </aside>
                    </div>
                    <h2 class="naslovBlog">Blog</h2>
                </div>
                <div id="ispis" class="row justify-content-center">
                    <div class="col-md-12 mt-3">
                        @foreach($blog as $b)
                            <div class="col-md-6 float-left">
                                <div class="about_us_content" id="opisTretmana">
                                    <h4><a class="tekst1 povecanjeNaslova text-center" href="{{route('one_Blog',['id_blog'=>$b->id_blog])}}">{!! $b->naslov_blog !!}</a></h4>
                                    <div class="about_us_video text-center mt-5">
                                        <img class="img-fluid radius" src="{{asset('/')}}img/blog/{{$b->putanja_slika_blog}}"  alt="{{$b->naslov_blog}}"/>
                                    </div>
                                    <p class="aktivanNeaktivan mt-3">
                                        {!! $truncated = Str::limit($b->text_blog, 200, ' (...)') !!}
                                    </p>
                                    <p class="skraceniBlog text-start">
                                        <b><a href="{{route('one_Blog',
                                        ['id_blog'=>$b->id_blog])}}" class="navigacija" >Više</a></b>
                                    </p>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row justify-content-center mb-4" id="ispis">
                        <div class="col-md-12 col-12 mt-5">
                            {{ $blog->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

@endsection
