@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('description')
    {{$podaci->description}}
@endsection


@section('title')
    Admin Panel - Slajder
@endsection

@section('content')

    <div class="col-md-7 mt-3 text-center mx-auto">
        <h2>Slajder</h2>
    </div>
    <div class="col-md-7 text-center poruka mx-auto">
        @empty(!session('poruka'))
            {{session('poruka')}}
        @endempty
    </div>
    <div class="col-md-11 mx-auto">
        <div class="d-flex justify-content-end align-items-center flex-wrap mb-2">
            <div class="mr-3 ">
                <a class="linkA btn mr-5" href="{{route('adminPanel_slajder_sort')}}">Sortiraj slike</a>
                <a class="linkA btn mr-5" href="{{route('adminPanel_slajder_insert')}}">Dodaj sliku</a>
            </div>
        </div>
    </div>
    <div class="col-md-11 mx-auto"  id="ispis">
        <table class="table table-hover table-bordered table-light table-responsive-sm table-responsive-md
                        table-responsive-lg adminTable">
            <thead>
            <tr>
                <th scope="col" class="zaglavljeTabele">#</th>
                <th scope="col" class="zaglavljeTabele">Naslov</th>
                <th scope="col" class="zaglavljeTabele w-55">Slika</th>
                <th scope="col" class="zaglavljeTabele">Postavljeno</th>
                <th scope="col" class="zaglavljeTabele">Status</th>
                  <th scope="col" class="zaglavljeTabele">Redosled</th>
                <th scope="col" class="zaglavljeTabele">Izmeni</th>
                <th scope="col" class="zaglavljeTabele">Obriši</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($_GET['page'])){
                $perPage = $_GET['page'];
                if(!isset($perPage) || $perPage == 1){
                    $i = 1;
                }
                else{
                    $i = (($perPage -1 ) * 6) + 1;
                }
            }else{
                $i = 1;
            }
            ?>
            @foreach($slajder as $s)
                <tr>
                    <th scope="row" class="tekstTabela">{{$i}}</th>
                    <?php $i++ ?>
                    <td class="tekstTabela">{{$s->naslov_slajder}}</td>
                    <td class="tekstTabela">
                        <a href="{{asset('/')}}img/slajder/{{$s->putanja_slajder}}" data-lightbox="roadtrip">
                            <img src="{{asset('/')}}img/slajder/{{$s->putanja_slajder}}" width="100px" height="100px" alt="{{$s->naslov_slajder}}"/>
                        </a>
                    </td>
                    <td class="tekstTabela">{{date('d.m.Y',$s->postavljeno)}}</td>
                    @if($s->status == 1)
                        <td class="tekstTabela">Aktivan</td>
                    @else
                        <td class="tekstTabela">Neaktivan</td>
                    @endif
                    <td class="tekstTabela">{{ $s->sort == null ? 'Ne prikazuje se' : $s->sort }}</td>
                    <td><a class="linkA"  href="{{route('adminPanel_slajder_update',['id_slajder'=>$s->id_slajder])}}">Izmeni</a></td>
                    <td><a class="linkA"  href="{{route('adminPanel_slajder_delete',['id_slajder'=>$s->id_slajder])}}">Obriši</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div id="paginacija_search">
            <div class="col-md-12 col-12 mx-auto">
                {{ $slajder->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>

    </section>

@endsection
