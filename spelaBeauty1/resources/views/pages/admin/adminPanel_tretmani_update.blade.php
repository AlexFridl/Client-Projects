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

        <div class="col-md-7 text-center mx-auto mt-3">
            <h3>Izmeni tretman</h3>
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
        <div class="col-md-10 adminTable mx-auto" style="background-color:rgb(255,255,255,.3)">
            <form method="POST" action="{{route('doAdminPanel_tretmani_update',['id_tretman'=>$tretman->id_tretman])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')
                <div class="row justify-content-center">
                    <table class="form-group mb-3">
                        <tr>
                            <td class="unos">
                                <label for="tbNaziv">
                                    <h5>Naziv:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <textarea name="tbNaziv" id="tbNaziv" class="form-control aktivanNeaktivan">{{$tretman->t_naziv}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="taTekst">
                                    <h5>Tekst:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <textarea name="taTekst" rows="8" cols="80" class="form-control aktivanNeaktivan textEditor" id="taTekst">{{$tretman->text_tretman}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos pr-5">
                                <label for="ddlTipTretmana">
                                    <h5>Tip tretmana:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <select id="ddlTipTretmana" name="ddlTipTretmana" class="form-control aktivanNeaktivan">
                                    @isset($tip_tretmana)
                                        @foreach($tip_tretmana as $tt)
                                            @if($tt->id_tt == $tretman->tt_id)
                                                <option value="{{$tt->id_tt}}" selected>{{$tt->tt_naziv}}</option>
                                            @else
                                                <option value="{{$tt->id_tt}}">{{$tt->tt_naziv}}</option>
                                            @endif
                                        @endforeach
                                    @endisset
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="postojeca_slika">
                                    <h5>Slika</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <a href="{{asset('/')}}img/tretmani/{{$tretman->putanja_slika}}" data-lightbox="roadtrip">
                                    <img id="postojeca_slika" src="{{asset('/')}}img/tretmani/{{$tretman->putanja_slika}}" width="100px" height="100px" alt="{{$tretman->t_naziv}}"/>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="tbCena">
                                    <h5>Unesi cenu:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" name="tbCena" id="tbCena" class="form-control aktivanNeaktivan" placeholder="{{ ($tretman->cena != NULL) ? $tretman->cena : 'Nema cenu' }}"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="fSlika">
                                    <h5>Izmeni sliku:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="file" class="form-control" name="fSlika" id="fSlika" placeholder="Unesite sliku"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="description">
                                    <h5>Description:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="form-control" name="description" id="description" value="{{$tretman->description}}"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="keywords">
                                    <h5>Keywords:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="form-control" name="keywords" id="keywords"  value="{{$tretman->keywords}}"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="keywords">
                                    <h5>Status:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <select id="ddlStatus" name="ddlStatus" class="form-control aktivanNeaktivan">
                                    @if($tretman->t_status == '0')
                                        <option value="0" selected>Neaktivan</option>
                                        <option value="1">Aktivan</option>
                                    @else($tretman->t_status == '1')
                                        <option value="0">Neaktivan</option>
                                        <option value="1" selected>Aktivan</option>
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="2" align="center" class="pozicijaDugmeta">
                            <input type="submit" name="btnIzmeni" id="btnIzmeni" value="Izmeni tretman" class="btn dugme"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>

    </section>

@endsection
