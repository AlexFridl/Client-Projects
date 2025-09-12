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

        <div class="col-md-7 mx-auto mt-3 text-center">
            <h3>Dodaj korisnika</h3>
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

        <div class="col-md-8 mx-auto adminTable" style="background-color:rgb(255,255,255,.3)">
            <form action="{{route('doAdminPanel_korisnik_insert')}}" method="POST">
                {{csrf_field()}}
                <div class="row justify-content-center">
                    <table class="form-group">
                        <tr>
                            <td class="unos pr-5">
                                <label for="tbKorIme">
                                    <h5>Korisničko ime:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="form-control" name="tbKorIme" id="tbKorIme" placeholder="Unesi korisničko ime"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="tbLozinka">
                                    <h5>Lozinka:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="password" class="form-control" name="tbLozinka" id="tbLozinka" placeholder="Unesi lozinku"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="ddlUloga">
                                    <h5>Uloga:</h5>
                                </label>
                            </td>
                            <td>
                                <select id="ddlUloga" name="ddlUloga" class="aktivanNeaktivan form-control">
                                    <option value="0">Izaberi</option>
                                        @foreach($uloga as $u)
                                            <option value="{{$u->id_uloga}}">{{$u->naziv}}</option>
                                        @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center" class="pozicijaDugmeta">
                                <input type="submit" name="btnUnesi" id="btnUnesi" value="Unesi korisnika" class="btn dugme"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>


    </section>

@endsection
