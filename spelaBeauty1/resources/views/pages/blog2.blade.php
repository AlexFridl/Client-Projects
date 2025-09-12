@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('description')
    {{$podaci->description}}
@endsection

@section('title') Blog2 @endsection

@section('content')

<section class="single_product_list">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog_right_sidebar" style="float: right; ">
                    <div class="blog_right_sidebar" style="float: right;">
                        <nav class="navbar navbar-light" style="background-color: rgba(255,222,173,0.5);">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" name="searchBlog2" id="searchBlog2" type="search" placeholder="Search" aria-label="Search">
                                    <i class="bi bi-search"></i>
                            </form>
                        </nav>
                    </div>
                </div>
                <h2 class="naslovBlog">Blog</h2>
            </div>
            <div id="search_blog2">
                @include('pages.partials_index.search_blog2')
                @if(isset($blogovi) && $blogovi->isEmpty())
                    <p class="text-center">Nema blogova za prikaz.</p>
                @endif
            </div>
        </div>

    </div>
</section>

@endsection
