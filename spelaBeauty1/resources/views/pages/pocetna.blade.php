@extends('layout.index')

@section('keywords')
        {{$podaci->keywords}}
@endsection

@section('description')
        {{$podaci->description}}
@endsection

@section('title')
    Špela Beauty
@endsection

@section('content')
    {{-- <div class="move_right poruka">
        @empty(!session('poruka'))
            {{session('poruka')}}
        @endempty
    </div> --}}

        @include('components.carusel')

        <div class="col-md-9 radius mx-auto mt-3 mb-3 py-3 px-3 multi-column-text"
            style="background-color: rgba(255,222,173,0.8); ">
            <p class="aktivanNeaktivan pt-5 " style="font-weight: 500;">{!! $podaci->text !!}</p>
        </div>

        @include('pages.partials_index.saradnici')

@endsection
