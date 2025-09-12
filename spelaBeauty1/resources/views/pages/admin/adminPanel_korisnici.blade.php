@extends('layout.index')

@section('keywords')
        {{$podaci->keywords}}
@endsection

@section('description')
        {{$podaci->description}}
@endsection


@section('title')
    Admin Panel - Korisnici
@endsection

@section('content')

            <div class="col-md-7 text-center mt-3 mx-auto">
                <h2>Korisnici</h>
            </div>
            <div class="col-md-7 text-center poruka mx-auto">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <div class="col-md-11 text-right mb-2" >
               <a class="linkA btn" href="{{route('adminPanel_korisnik_insert')}}">Dodaj korisnika</a>
            </div>
            <div class="col-md-11 mx-auto">
                <table class="table table-hover table-bordered table-light table-responsive-sm table-responsive-md
                                table-responsive-lg adminTable">
                    <thead>
                    <tr>
                        <th scope="col" class="zaglavljeTabele">#</th>
                        <th scope="col" class="zaglavljeTabele">Korisnicko ime</th>
                        <th scope="col" class="zaglavljeTabele">Uloga</th>
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
                        @foreach($korisnici as $k)
                            <tr>
                                <th scope="row" class="tekstTabela">{{$i}}</th>
                                <?php $i++ ?>
                                <td class="tekstTabela">{{$k->korisnicko_ime}}</td>
                                <td class="tekstTabela">{{$k->naziv}}</td>

                                @if($k->status == 0)
                                    <td class="tekstTabela">Nektivan</td>
                                @else
                                    <td class="tekstTabela">Aktivan</td>
                                @endif
                                <td><a class="linkA"  href="{{route('adminPanel_korisnici_update',['id_korisnik'=>$k->id_korisnik])}}">Izmeni</a></td>
                                <td><a  class="linkA"  href="{{route('adminPanel_korisnici_delete',['id_korisnik'=>$k->id_korisnik])}}">Obriši</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="paginacija_search">
                <div class="col-md-12 col-12">
                    {{ $korisnici->links('vendor.pagination.custom') }}
                </div>
            </div>

        </div>

    </div>
    </div>

    </section>

@endsection
