@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('description')
    {{$podaci->description}}
@endsection

@section('title') Blog3 @endsection

@section('content')
    <section  class="about_us pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="blog_right_sidebar" style="float: right;">
                        <nav class="navbar navbar-light" style="background-color: rgba(255,222,173,0.5);">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" name="searchBlog3" id="searchBlog3" type="search" placeholder="Search" aria-label="Search">
                                    <i class="bi bi-search"></i>
                            </form>
                        </nav>
                    </div>
                    <h2 class="naslovBlog">Blog</h2>
                </div>
            </div>
            {{-- Search Blog --}}
            <div id="search_blog3">
                @include('pages.partials_index.search_blog3')
                @if(isset($blogovi) && $blogovi->isEmpty())
                    <p class="text-center">Nema blogova za prikaz.</p>
                @endif
            </div>
            {{-- End Search Blog --}}
        </div>
    </section>

@endsection
