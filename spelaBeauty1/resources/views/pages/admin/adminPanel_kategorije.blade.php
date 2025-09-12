@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('keywords')
    {{$podaci->description}}

@endsection


@section('title')
    Admin Panel - Kategorije
@endsection

@section('content')

        <div class="mt-3">
            <div class="col-md-7 text-center mx-auto">
                <h2> Kategorije</h2>
            </div>
            <div class="col-md-7 text-center poruka mx-auto">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <div class="col-md-11 mx-auto">
                <div class="d-flex justify-content-end align-items-center ">
                    <div class="mr-3 mb-3">
                        <nav class="navbar navbar-light" style="background-color: rgba(255,222,173,0.5);">
                            <form class="form-inline" id="formSearchKategorije">
                                <input class="form-control mr-sm-2" name="searchKeategorije" id="searchKeategorije" type="search" placeholder="Search" aria-label="Search">
                                    <i class="bi bi-search"></i>
                            </form>
                        </nav>
                    </div>
                    <div class="mb-2 mr-5">
                          <a class="linkA btn" href="{{route('adminPanel_kategorije_insert')}}">Dodaj kategoriju</a>
                    </div>
                </div>
            </div>
            <div id="search_kategorija">
                @include('pages.partials_index.admin.search_kategorije')
                {{-- <div class="col-md-11 mx-auto"> --}}
                    {{-- <table class="table table-hover table-bordered table-light table-responsive-sm table-responsive-md
                                    table-responsive-lg adminTable">
                        <thead>
                            <tr>
                                <th scope="col" class="zaglavljeTabele">#</th>
                                <th scope="col" class="zaglavljeTabele">Naziv kategorije</th>
                                <th scope="col" class="w-75 zaglavljeTabele">Tekst</th>
                                <th scope="col" class="zaglavljeTabele">Tretman</th>
                                <th scope="col" class="zaglavljeTabele">Slika</th>
                                <th scope="col" class="zaglavljeTabele">Cena</th>
                                <th scope="col" class="zaglavljeTabele">Description</th>
                                <th scope="col" class="zaglavljeTabele">Keywords</th>
                                <th scope="col" class="zaglavljeTabele">Status</th>
                                <th scope="col" class="zaglavljeTabele">Izmeni</th>
                                <th scope="col" class="zaglavljeTabele">Obrisi</th>
                            </tr>
                        </thead>
                        <tbody> --}}
                            <?php
                            // if(isset($_GET['page'])){
                            //     $perPage = $_GET['page'];
                            //     if(!isset($perPage) || $perPage == 1){
                            //         $i = 1;
                            //     }
                            //     else{
                            //         $i = (($perPage -1 ) * 6) + 1;
                            //     }
                            // }else{
                            //     $i = 1;
                            // }
                            ?>
                            {{-- @foreach($kategorije as $kat)
                                <tr>
                                    <th scope="row" class="tekstTabela">{{$i}}</th>
                                    <?php $i++ ?>
                                    <td class="tekstTabela"> {!! $kat->kat_naziv !!}</td>
                                    <td class="tekstTabela"> {!!  $kat->text_kat   !!} </td>
                                    <td class="tekstTabela">
                                        {{ $kat->tretman === NULL ? 'Ne postoji tretman kojem ova kategorija pripada' : $kat->tretman['t_naziv']   }}
                                    </td>
                                    <td class="tekstTabela">
                                        @if($kat->slika_putanja !== NULL)
                                            <p>Nema slike</p>
                                        @else
                                            <a href="{{asset('/')}}img/tretmani/{{$kat->slika_putanja}}" data-lightbox="roadtrip">
                                                <img src="{{asset('/')}}img/tretmani/{{$kat->slika_putanja}}" width="" height="" alt="{!! $kat->kat_naziv !!}"/>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="tekstTabela">
                                        @if ($kat->cena != NULL)
                                            <span class="bi bi-tags-fill">{!! $kat->cena !!}</span>
                                        @else
                                            Nema cenu
                                        @endif
                                    </td>
                                    <td class="tekstTabela">{!! $kat->description ?? null !!}</td>
                                    <td class="tekstTabela">{!! $kat->keywords ?? null !!}</td>
                                    @if($kat->k_status == '1')
                                        <td class="tekstTabela">Aktivan</td>
                                    @elseif($kat->k_status == '0')
                                        <td class="tekstTabela">Neaktivan</td>
                                        @else
                                        <td></td>
                                    @endif
                                    <td><a class="linkA"  href="{{route('adminPanel_kategorija_update',['id_kategorija'=>$kat->id_kategorija])}}">Izmeni</a></td>
                                    <td><a class="linkA"  href="{{route('adminPanel_kategorija_delete',['id_kategorija'=>$kat->id_kategorija])}}">Obrisi</a></td>
                                </tr>
                            @endforeach --}}
                        {{-- </tbody>
                    </table>
                    <div id="paginacija_search">
                        <div class="col-md-12 col-12 mx-auto">
                            {{ $kategorije->links('vendor.pagination.custom') }}
                        </div>
                    </div> --}}
                {{-- </div> --}}
            </div>
        </div>

{{--
    </div>
    </div> --}}

    </section>

@endsection
