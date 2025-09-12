
@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('description')
    {{$podaci->description}}
@endsection


@section('title')
    Admin Panel - Saradnici
@endsection

@section('content')

        <div class="col-md-7 text-center mt-3 mx-auto">
                <h2>Saradnici</h2>
            </div>
        </div>
        <div class="col-md-7 text-center poruka mx-auto mb-3 ">
            @empty(!session('poruka'))
                {{session('poruka')}}
            @endempty
        </div>

        <div class="col-md-11 mx-auto">
            <div class="d-flex justify-content-end align-items-center flax-wrap" >
               <div class="d-flex align-items-center mb-2" style="margin-right: 60px;">
                    <label  for="sortByDateGalerijaAP" class="mb-0" style="color: #515828;font-size: 16px;">Sortiraj po datumu:</label>
                    <input type="date" name="sortByDateGalerijaAP" id="sortByDateGalerijaAP"style="width: auto;" class="aktivanNeaktivan form-control form-control-sm d-inline-block aktivanNeaktivan" />
                </div>
                <div class="mb-2 mr-5">
                    @if(session()->has('user') && session()->get('user')->naziv == 'admin')
                        <a class="linkA btn" href="{{route('adminPanel_saradnici_insert')}}">Dodaj sliku saradnika</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-11 mx-auto" id="ispis">
            <table class="table table-hover table-bordered table-light table-responsive-sm table-responsive-md
                            table-responsive-lg adminTable">
                <thead>
                <tr>
                    <th scope="col" class="zaglavljeTabele">#</th>
                    <th scope="col" class="zaglavljeTabele">Slika</th>
                    <th scope="col" class="zaglavljeTabele">Ime saradnika</th>
                    <th scope="col" class="zaglavljeTabele">Postavljeno</th>
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
                @foreach($saradnici as $s)
                    <tr>
                        <th scope="row" class="tekstTabela">{{$i}}</th>
                        <?php $i++ ?>
                        <td>
                            <img class="img-fluid" src="{{asset('/')}}img/saradnici/{{$s['putanja_slika']}}" width="100px" height="50px"
                                alt="{{$s['ime_saradnika']  }}"/>
                        </td>
                        <td>{{ $s['ime_saradnika'] }}</td>
                        <td class="tekstTabela">{{date('d.m.Y.',$s->postavljeno)}}</td>
                        @if($s['status_slika'] == 1)
                            <td class="tekstTabela">Aktivan</td>
                        @else
                            <td class="tekstTabela">Neaktivan</td>
                        @endif
                        <td><a class="linkA"  href="{{route('adminPanel_saradnici_update',['id_saradnici'=>$s['id_saradnici']]) }}">Izmeni</a></td>
                        <td><a  class="linkA"  href="{{route('adminPanel_saradnici_delete',['id_saradnici'=>$s['id_saradnici']]) }}">Obrisi</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div id="paginacija_search">
                <div class="col-md-12 col-12">
                    {{ $saradnici->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>

    </section>

@endsection
