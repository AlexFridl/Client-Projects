
@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('keywords')
    {{$podaci->description}}
@endsection

@section('title')
    Admin Panel - Blog
@endsection

@section('content')

    <div class="col-md-7 text-center mx-auto mt-3">
        <h2>Blog</h2>
    </div>
    <div class="col-md-7 text-center poruka mx-auto mb-3">
            @empty(!session('poruka'))
                {{session('poruka')}}
            @endempty
    </div>
        <div class="col-md-11 mx-auto">
            <div class="d-flex justify-content-end align-items-center flex-wrap">
                <div class="d-flex align-items-center mb-2" style="margin-right: 60px;">
                    <label for="sortByDateBlogAP" class="mb-0" style="color: #515828;font-size: 16px;">Sortiraj po datumu:</label>
                    <input type="date" name="sortByDateBlogAP" id="sortByDateBlogAP"  style="width: auto;" class="aktivanNeaktivan form-control form-control-sm d-inline-block "/>
                </div>
                <div class="mb-2 mr-5">
                    @if(session()->has('user') && session()->get('user')->naziv == 'admin')
                        <a class="linkA btn"  class="nav-link" href="{{route('adminPanel_blog_insert')}}">Dodaj blog</a>
                    @endif
                </div>
            </div>
        </div>
    <div id="blog_table">
        @include('pages.partials_index.admin.search_by_date_blog')

    </div>

@endsection
