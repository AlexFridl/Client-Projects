@extends('layout.index')

@section('keywords')
    {{$podaci1->keywords}}
@endsection

@section('description')
    {{$podaci1->description}}
@endsection

@section('title')
    Admin Panel - Podaci
@endsection

@section('content')


        <div class="col-md-11 mt-3 text-center mx-auto">
            <h2>Podaci</h2>
        </div>
        <div class="col-md-7 mx-auto">
            <div class="poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
        </div>
        <div class="col-md-11 mx-auto">
            <table class="table table-hover table-bordered table-light table-responsive-sm table-responsive-md
                            table-responsive-lg adminTable">
                <thead>
                <tr>
                    <th scope="col" class="zaglavljeTabele w-75">Tekst</th>
                    <th scope="col" class="zaglavljeTabele">Ulica</th>
                    <th scope="col" class="zaglavljeTabele">Mesto</th>
                    <th scope="col" class="zaglavljeTabele">Kontakt</th>
                    <th scope="col" class="zaglavljeTabele">Slika</th>
                    <th scope="col" class="zaglavljeTabele">Profilna slika</th>
                    <th scope="col" class="zaglavljeTabele">Description</th>
                    <th scope="col" class="zaglavljeTabele">Keywords</th>
                    <th scope="col" class="zaglavljeTabele">Izmeni</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tekstTabela">{!! $podaci1->text !!}</td>
                        <td class="tekstTabela">{{$podaci1->ulica}}</td>
                        <td class="tekstTabela">{{$podaci1->mesto}}</td>
                        <td class="tekstTabela">{{$podaci1->kontakt_tel}}</td>
                        <td class="tekstTabelaPodaciImg">
                            <img src="{{asset('/')}}img/{{$podaci1->podaci_slika_pocetna}}" alt="{{$podaci1->podaci_slika_pocetna}}"/>
                        </td>
                        <td class="tekstTabelaPodaciImg">
                            <img src="{{asset('/')}}img/{{$podaci1->profilna_slika}}" alt="{{$podaci1->podaci_slika_pocetna}}" width="70%"/>
                        </td>
                        <td class="tekstTabela">{{$podaci1->keywords}}</td>
                        <td class="tekstTabela">{{$podaci1->description}}</td>
                        <td><a class="linkA"  href="{{route('adminPanel_podaci_update',['id'=>$podaci1->id])}}">Izmeni</a></td>
                    </tr>
                </tbody>
            </table>
        </div>


    </section>

@endsection
