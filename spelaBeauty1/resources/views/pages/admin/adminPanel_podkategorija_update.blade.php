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


        <div class=" col-md-7 text-center mx-auto mt-3">
            <h3>Izmeni podkategoriju</h3>
        </div>
        @if($errors->any())
            <div class="alert alert-danger greske_error col-md-6 mx-auto" >
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="move_right poruka mx-auto">
            @empty(!session('poruka'))
                {{session('poruka')}}
            @endempty
        </div>

        <div class="col-10 mx-auto adminTable" style="background-color:rgb(255,255,255,.3)">
            <form method="POST" action="{{route('doAdminPanel_podkategorija_update',['id_podkategorija' => $podkategorija->id_podkategorija])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')
                <div class="row justify-content-center">
                    <table class="form-group">
                        <tr>
                            <td class="unos pr-5">
                                <label for="tbNaziv">
                                    <h5>Naziv podkategorije:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" name="tbNaziv" id="tbNaziv" class="form-control aktivanNeaktivan" value="  {{ $podkategorija->podkat_naziv }} "/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="taTekst">
                                    <h5>Tekst podkategorije:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <textarea class="textEditor form-control" name="taTekst" rows="8" cols="80"  id="taTekst">
                                    {{ $podkategorija->tekst_podkat }}
                                </textarea>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td class="unos">Tretman:</td>
                            <td class="izmena">
                                <select id="ddlTipTretmana" name="ddlTipTretmana" class="aktivanNeaktivan">
                                    <option value="0">Izaberi...</option>
                                    @foreach($tretmani as $tretman)
                                        @if($kategorija->t_id == $tretman['id_tretman'])
                                            <option value="{{$tretman['id_tretman']}}" selected>{{$tretman['t_naziv']}}</option>
                                        @else
                                            <option value="{{$tretman['id_tretman']}}" >{{$tretman['t_naziv']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        </tr> --}}
                        <tr>
                            <td class="unos">
                                <label for="ddlKategorija">
                                    <h5>Kategorija:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <select id="ddlKategorija" name="ddlKategorija" class="form-control aktivanNeaktivan">
                                    <option value="0">Izaberi...</option>
                                    @foreach($kategorije as $kat)
                                        @if($podkategorija->kategorija_id == $kat->id_kategorija)
                                            <option value="{{$kat->id_kategorija}}" selected>{{$kat->kat_naziv}}</option>
                                        @else
                                            <option value="{{$kat->id_kategorija}}" >{{$kat->kat_naziv}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @if($podkategorija->slika_putanja)
                            <tr>
                                <td class="unos">
                                    <label for="ddlKategorija">
                                        <h5>Slika:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <img class="form-control img-fluid" src="{{ asset('/')}}img/tretmani/{{$podkategorija->slika_putanja}}" alt="{{ $podkategorija->kat_naziv }}" width="200px" height="250px" />
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td class="unos">
                                <label for="ddlKategorija">
                                    <h5>Unesi sliku:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="file" name="fSlika" id="fSlika" class="form-control aktivanNeaktivan" placeholder="Unesite sliku"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="ddlKategorija">
                                    <h5>Unesi cenu:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" name="tbCena" id="tbCena" class="form-control aktivanNeaktivan" value="{{ ($podkategorija->cena != NULL) ? $podkategorija->cena : 'Nema cenu' }}"/>
                            </td>
                        </tr>
                         <tr>
                            <td class="unos pr-5">
                                <label for="description">
                                    <h5>Description:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="form-control" name="description" id="description" placeholder=" {{  $podkategorija->description }} "/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="keywords">
                                    <h5>Keywords:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="form-control" name="keywords" id="keywords" placeholder=" {{ $podkategorija->keywords }} "/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="ddlKategorija">
                                    <h5>Status:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <select id="ddlStatus" name="ddlStatus" class="form-control aktivanNeaktivan">
                                    @if($podkategorija->podkat_status == '0')
                                        <option value="0" selected>Neaktivan</option>
                                        <option value="1">Aktivan</option>
                                    @else
                                        <option value="0" >Neaktivan</option>
                                        <option value="1" selected>Aktivan</option>
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="2" align="center" class="pozicijaDugmeta">
                                <input type="submit" name="btnIzmeni" id="btnIzmeni" class="btn dugme" value="Izmeni podkategoriju"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>


    </section>

@endsection
