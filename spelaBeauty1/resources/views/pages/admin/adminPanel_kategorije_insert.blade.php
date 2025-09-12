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
            <h3>Dodaj kategoriju</h3>
        </div>
        @if($errors->any())
            <div class="alert alert-danger greske_error mx-auto col-md-6" >
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
        <div class="col-md-11 mx-auto adminTable" style="background-color:rgb(255,255,255,.3)">
            <form method="POST" action="{{route('doAdminPanel_kategorije_insert')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row justify-content-center">
                    <table class="form-group">
                        <tr>
                            <td class="unos pr-5">
                                <label for="tbNaziv">
                                    <h5>Naziv kategorije:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="aktivanNeaktivan form-control" name="tbNaziv" id="tbNaziv" placeholder="Unesite naziv kategorije" />
                                {{-- <textarea class="form-control" name="tbNaziv" id="tbNaziv" rows="2" cols="60" placeholder="Unesite naziv kategorije" ></textarea> --}}
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="taTekst">
                                    <h5>Tekst kategorije:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <textarea class="textEditor form-control" name="taTekst" rows="8" cols="80"  id="taTekst"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="ddlTretmana">
                                    <h5>Tretman:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <select id="ddlTretmana" name="ddlTretmana" class="aktivanNeaktivan form-control">
                                    <option value="0">Izaberi...</option>
                                    @foreach($tretmani as $tretman)
                                        <option value="{{$tretman['id_tretman']}}">{{$tretman['t_naziv']}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
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
                            <td class="unos">
                                <label for="exampleFormControlTextarea1">
                                    <h5>Unesi cenu:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" name="tbCena" id="tbCena" class="aktivanNeaktivan form-control" placeholder="Unesite cenu"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos pr-5">
                                <label for="description">
                                    <h5>Description:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="form-control" name="description" id="description" placeholder="Unesite description"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="keywords">
                                    <h5>Keywords:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Unesite keywords"/>
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
                                    <option value="0">Neaktivan</option>
                                    <option value="1">Aktivan</option>
                                </select>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="2" align="center" class="pozicijaDugmeta">
                                <input type="submit" name="btnUnesi" id="btnUnesi" class="btn dugme" value="Unesi kategoriju"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>

    </section>

@endsection
