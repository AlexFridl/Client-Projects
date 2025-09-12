@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('keywords')
    {{$podaci->description}}
@endsection


@section('title')
    Admin Panel
@endsection

@section('content')


        <div class=" col-md-7 text-center mx-auto mt-3">
            <h3>Izmeni kategoriju</h3>
        </div>
        @if($errors->any())
            <div class="alert alert-danger mx-auto greske_error col-md-6" >
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

        <div class="col-md-10 mx-auto adminTable" style="background-color:rgb(255,255,255,.3)">
            <form method="POST" action="{{route('doAdminPanel_kategorija_update',['id_kategorija' => $id_kategorija])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')
                <div class="row justify-content-center">
                    <table class="form-group">
                        <tr>
                            <td class="unos pr-5">
                                <label for="tbNaziv">
                                    <h5>Naziv kategorije:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="aktivanNeaktivan form-control" name="tbNaziv" id="tbNaziv" placeholder="Unesite naziv kategorije" value="{{ $kategorija->kat_naziv }}" />
                                {{-- <textarea class="form-control" name="tbNaziv" id="tbNaziv" cols="76" placeholder="Unesite naziv kategorije"> --}}
                                    {{-- {{ $kategorija->kat_naziv }} --}}
                                {{-- </textarea> --}}
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="taTekst">
                                    <h5>Tekst kategorije:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <textarea class="textEditor" name="taTekst" rows="8" cols="80"  id="taTekst">
                                    {{ $kategorija->text_kat }}
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="ddlTretmanv">
                                    <h5>Tretman:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <select id="ddlTretman" name="ddlTretman" class="aktivanNeaktivan form-control">
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
                        </tr>
                        @if($kategorija->slika_putanja)
                            <tr>
                                <td class="unos">
                                    <label for="postojeca_slika">
                                        <h5>Slika:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <img id="postojeca_slika" class="img-fluid form-control" src="{{ asset('/')}}img/tretmani/{{$kategorija->slika_putanja}} }}" alt="{{ $kategorija->kat_naziv }}" width="200px" height="250px" />
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td class="unos">
                                <label for="fSlika">
                                    <h5>Unesi sliku:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="file" name="fSlika" id="fSlika" class="aktivanNeaktivan form-control" placeholder="Unesite sliku"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos ">
                                <label for="tbCena" >
                                    <h5>Unesi cenu:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" name="tbCena" id="tbCena" class="aktivanNeaktivan form-control" placeholder="{{ ($kategorija->cena != NULL) ? $kategorija->cena : 'Unesite cenu' }}"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="description">
                                    <h5>Description:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <textarea rows="8" cols="80" class="textEditor tinymce" name="description" id="description" placeholder="Unesi description">
                                    {{  $kategorija->description }}
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="keywords">
                                    <h5>Keywords:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <textarea rows="8" cols="80" class="textEditor" name="keywords" id="keywords" placeholder="Unesi keywords">
                                    {{ $kategorija->keywords }}
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="ddlStatus">
                                    <h5>Status:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <select id="ddlStatus" name="ddlStatus" class="aktivanNeaktivan form-control">
                                    @if($kategorija->k_status == '0')
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
                            <input type="submit" name="btnIzmeni" id="btnIzmeni" class="btn dugme" value="Izmeni kategoriju"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>

    </section>

@endsection
