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
        <h3>Dodaj sliku saradnika</h3>
    </div>
    @if($errors->any())
        <div class="alert alert-danger greske_error col-md-6" >
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-md-7 text-center poruka mx-auto mb-3">
        @empty(!session('poruka'))
            {{session('poruka')}}
        @endempty
    </div>
    <div class="col-md-11 adminTable mx-auto" style="background-color:rgb(255,255,255,.3)">
        <form action="{{route('doAdminPanel_saradnici_insert')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row justify-content-center">
                <table class="form-group">
                    <tr>
                        <td class="unos">
                            <label for="tbNaziv">
                                <h5>Unesi ime saradnika:</h5>
                            </label>
                        </td>
                        <td class="izmena">
                            <input type="text" name="tbSaradnik" id="tbSaradnik" class="aktivanNeaktivan form-control" placeholder="Unesite ime saradnika"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="unos pr-5">
                            <label for="tbNaziv">
                                <h5>Unesi sliku saradnika:</h5>
                            </label>
                        </td>
                        <td class="izmena">
                            <input type="file" name="unosSlikeSaradnika" id="unosSlikeSaradnika" class="aktivanNeaktivan form-control"/>
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
                    <tr>
                        <td colspan="2" align="center" class="pozicijaDugmeta">
                            <input type="submit" name="btnDodaj" id="btnDodaj" value="Dodaj saradnika" class="btn dugme"/>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

    </section>

@endsection
