@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('description')
    {{$podaci->description}}

@endsection


@section('title')
    Admin Panel - Tretmani
@endsection

@section('content')
    <div class="mt-3">
        <div class="col-md-11 text-center mx-auto">
            <h1> {{ $tt_naziv }} </h1>
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
                        <form class="form-inline" id="formSearchTretmani">
                            <input class="form-control mr-sm-2" name="searchTretmani" id="searchTretmani" type="search" placeholder="Search" aria-label="Search">
                                <i class="bi bi-search"></i>
                        </form>
                    </nav>
                </div>
                <div class="mb-3 mr-3">
                    <a class="linkA btn" href="{{route('adminPanel_tretmani_insert')}}">Dodaj tretman</a>
                </div>
            </div>
        </div>
        <div id="search_tretman">
            @include('pages.partials_index.admin.search_tretman')
            {{-- <div class="col-md-11 mx-auto">
                <table class="table table-hover table-bordered table-light table-responsive-sm table-responsive-md
                                table-responsive-lg adminTable">
                    <thead>
                        <tr>
                            <th scope="col" class="zaglavljeTabele">#</th>
                            <th scope="col" class="zaglavljeTabele">Naziv</th>
                            <th scope="col" class="zaglavljeTabele">Tekst</th>
                            <th scope="col" class="zaglavljeTabele">Tip tretmana</th>
                            <th scope="col" class="zaglavljeTabele">Slika</th>
                            <th scope="col" class="zaglavljeTabele">Cena</th>
                            <th scope="col" class="zaglavljeTabele">Description</th>
                            <th scope="col" class="zaglavljeTabele">Keywords</th>
                            <th scope="col" class="zaglavljeTabele">Status</th>
                            <th scope="col" class="zaglavljeTabele">Pregled</th>
                            <th scope="col" class="zaglavljeTabele">Izmeni</th>
                            <th scope="col" class="zaglavljeTabele">Obrisi</th>
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
                        @foreach($tretmani as $t)
                            <tr>
                                <th scope="row" class="tekstTabela">{{$i}}</th>
                                <?php $i++ ?>
                                <td class="tekstTabela"> {{ $t->t_naziv }}</td>
                                <td class="tekstTabela">{!! $t->text_tretman !!}</td>
                                <td class="tekstTabela">{!! $t->tt_naziv !!}</td>
                                <td class="tekstTabela">
                                    @if($t->putanja_slika == null)
                                        Nema slike
                                    @else
                                        <a href="{{asset('/')}}img/tretmani/{{$t->putanja_slika}}" data-lightbox="roadtrip">
                                            <img src="{{asset('/')}}img/tretmani/{{$t->putanja_slika}}"  alt="{!! $t->t_naziv !!}"/>
                                        </a>
                                    @endif
                                </td>
                                <td class="tekstTabela" >
                                    @if ($t->cena != NULL)
                                        <span class="bi bi-tags-fill">{!! $t->cena !!}</span>
                                    @else
                                        Nema cenu
                                    @endif
                                </td>
                                <td class="tekstTabela">{!! $t->description !!}</td>
                                <td class="tekstTabela">{!! $t->keywords !!}</td>
                                @if($t->t_status == '1')
                                    <td class="tekstTabela">Aktivan</td>
                                @elseif($t->t_status == '0')
                                    <td class="tekstTabela">Neaktivan</td>
                                    @else
                                    <td></td>
                                @endif
                                <td>
                                    <a class="linkA"  href="{{route('tretmani',['id_tt'=>$t->tt_id, 'id_tretman' => $t->id_tretman])}}">Pregled</a>
                                </td>
                                <td><a class="linkA"  href="{{route('adminPanel_tretmani_update',['id_tretman'=>$t->id_tretman])}}">Izmeni</a></td>
                                <td><a class="linkA"  href="{{route('adminPanel_tretmani_delete',['id_tt'=>$t->tt_id,'id_tretman'=>$t->id_tretman])}}">Obrisi</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="paginacija_search">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-12">
                            {{ $tretmani->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>

@endsection
