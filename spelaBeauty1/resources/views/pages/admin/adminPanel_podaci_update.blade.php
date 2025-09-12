@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('description')
    {{$podaci->description}}
@endsection


@section('title')
    Admin Panel
@endsection

@section('content')

            <div class="col-md-7 mx-auto mt-3 text-center">
                <h3>Izmena podataka</h3>
            </div>
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <div class="col-md-10 mx-auto adminTable text-center" style="background-color:rgb(255,255,255,.3)">
                <form action="{{route('doAdminPanel_podaci_update',['id'=>$podaci2->id])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="row justify-content-center">
                        <table class="form-group mb-3">
                            <tr>
                                <td class="unos">
                                    <label for="text">
                                        <h5>Tekst:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <textarea class="textEditor form-control" rows="8" cols="80" name="text" id="text" class="aktivanNeaktivan">{{$podaci2->text}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="ulica">
                                        <h5>Ulica:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <input type="text" class="form-control" name="ulica" id="ulica" value="{{$podaci2->ulica}}" class="aktivanNeaktivan"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="mesto">
                                        <h5>Mesto:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <input type="text"  name="mesto" id="mesto" class="aktivanNeaktivan form-control" value="{{$podaci2->mesto}} "/>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="tell">
                                        <h5>Kontekt telefon:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <input type="text"  name="tell" id="tell" value="{{$podaci2->kontakt_tel}}" class="aktivanNeaktivan form-control"/>
                                </td>
                            </tr>

                            <tr>
                                <td class="unos">
                                    <label for="slika_sa_pocetne">
                                        <h5>Slika početne strane:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <img class="izmena" id="slika_sa_pocetne" src="{{asset('/')}}img/{{$podaci2->podaci_slika_pocetna}}" width="300px" height="150px" alt="{{$podaci2->podaci_slika_pocetna}}"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="slika">
                                        <h5>Izmeni sliku početne strane:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <input type="file" name="slika" id="slika" placeholder="Unesite sliku" class="aktivanNeaktivan form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="postojeca_profilna_slika">
                                        <h5>Profilna slika:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <img id="postojeca_profilna_slika" src="{{asset('/')}}img/{{$podaci2->profilna_slika}}" width="300px" height="150px" alt="{{$podaci2->profilna_slika}}"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="profilna_slika">
                                        <h5>Izmeni profilnu sliku:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <input type="file" name="profilna_slika" id="profilna_slika" placeholder="Unesite sliku" class="aktivanNeaktivan form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos pr-5">
                                    <label for="description">
                                        <h5>Description:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <input type="text" class="form-control" name="description" id="description" value="{{$podaci2->description}}"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="keywords">
                                        <h5>Keywords:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <input type="text" class="form-control" name="keywords" id="keywords" value="{{$podaci2->keywords}}"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center" class="pozicijaDugmeta">
                                    <input type="submit" name="btnIzmeni" id="btnIzmeni" value="Izmeni osnovne podatke" class="btn dugme"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        <div class="move_right poruka">
            @empty(!session('poruka'))
                {{session('poruka')}}
            @endempty
        </div>


    </section>

@endsection
