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
            <h3>Izmeni korisnika</h3>
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
        <div class="col-md-10 mx-auto adminTable" style="background-color:rgb(255,255,255,.3)">
            <form action="{{route('doAdminPanel_korisnici_update',['id_korisnik'=>$korisnik->id_korisnik])}}" method="POST">
                {{csrf_field()}}
                @method('PUT')
                <div class="row justify-content-center">
                    <table class="form-group">
                        <tr>
                            <td class="unos pr-5">
                                <label for="tbKorIme">
                                    <h5>Korisničko ime:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="form-control aktivanNeaktivan" name="tbKorIme" id="tbKorIme" value="{{$korisnik->korisnicko_ime}}"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="tbLozinka">
                                    <h5>Lozinka:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="password" class="form-control"  name="tbLozinka" id="tbLozinka" value=""/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="ddlUloga">
                                    <h5>Uloga:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <select id="ddlUloga" name="ddlUloga" class="form-control aktivanNeaktivan">
                                    @isset($uloga)
                                    @foreach($uloga as $u)
                                        @if($u->id_uloga == $korisnik->uloga_id)
                                            <option value="{{$u->id_uloga}}" selected>{{$u->naziv}}</option>
                                        @else
                                            <option value="{{$u->id_uloga}}">{{$u->naziv}}</option>
                                        @endif
                                    @endforeach
                                    @endisset
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="ddlStatus">
                                    <h5>Status:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <select id="ddlStatus" name="ddlStatus" class="form-control aktivanNeaktivan">
                                    @if($korisnik->k_status == '0')
                                        <option value="0" selected>Neaktivan</option>
                                        <option value="1">Aktivan</option>
                                    @else($korisnik->k_status == '1')
                                        <option value="0">Neaktivan</option>
                                        <option value="1" selected>Aktivan</option>
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr  >
                            <td colspan="2" align="center" class="pozicijaDugmeta">
                                <input type="submit" name="btnIzmeni" id="btnIzmeni" value="Izmeni korisnik" class="btn dugme"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>

    </section>

@endsection
