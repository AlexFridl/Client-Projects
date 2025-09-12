@extends('layout.index')

@section('keywords')
        {{$podaci->keywords}}
@endsection

@section('description')
        {{$podaci->description}}
    {{$podaci->description}}
@endsection



@section('title')
    Admin Panel - Tip tretmana
@endsection

@section('content')

    <div class=" col-md-7 text-center mt-3 mx-auto">
        <h2>Tipovi tretmana</h2>
    </div>
    <div class="col-md-5 poruka mx-auto">
        @empty(!session('poruka'))
            {{session('poruka')}}
        @endempty
    </div>
    <div class="col-md-11 text-right mb-2" >
        <a class="linkA btn"  class="nav-link" href="{{route('adminPanel_tipTretman_insert')}}">
                Dodaj tip tretmana
        </a>
    </div>
    <div class="col-md-11 mx-auto">
        <table class="table table-hover table-bordered table-light table-responsive-sm table-responsive-md
                        table-responsive-lg adminTable">
            <thead>
            <tr>
                <th scope="col" class="zaglavljeTabele">#</th>
                <th scope="col" class="zaglavljeTabele">Naziv</th>
                <th scope="col" class="zaglavljeTabele">Description</th>
                <th scope="col" class="zaglavljeTabele">Keywords</th>
                <th scope="col" class="zaglavljeTabele">Status</th>
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
            @foreach($tipTretman as $tt)
                <tr>
                    <th scope="row" class="tekstTabela">{{$i}}</th>
                    <?php $i++ ?>
                    <td class="tekstTabela">{{$tt->tt_naziv}}</td>
                    <td class="tekstTabela">{!! $tt->description !!}</td>
                    <td class="tekstTabela">{!! $tt->keywords !!}</td>
                    @if($tt->tt_status == '1')
                        <td class="tekstTabela">Aktivan</td>
                    @elseif($tt->tt_status == '0')
                        <td class="tekstTabela">Neaktivan</td>
                    @else
                        <td></td>
                    @endif
                    <td><a class="linkA"  href="{{route('adminPanel_tipTretman_update',['id_tt'=>$tt->id_tt])}}">Izmeni</a></td>
                    @if($tt->tt_status == '0')
                        <td><a class="linkA"  href="{{route('adminPanel_tipTretman_delete',['id_tt'=>$tt->id_tt])}}">Obrisi</a></td>
                    @else
                        <td><a class="linkA"  href="{{route('adminPanel_tipTretman_delete',['id_tt'=>$tt->id_tt])}}">Obrisi</a></td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div id="paginacija_search">
        <div class="col-md-12 col-12 mx-auto">
            {{ $tipTretman->links('vendor.pagination.custom') }}
        </div>
    </div>

    </section>

@endsection
