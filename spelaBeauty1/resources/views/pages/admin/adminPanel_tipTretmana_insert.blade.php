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

        <div class="col-md-7 mt-3 mx-auto text-center">
            <h3>Dodaj tip tretman</h3>
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

        <div class="col-md-11 mx-auto adminTable" style="background-color:rgb(255,255,255,.3)">
            <form method="POST" action="{{route('doAdminPanel_tipTretman_insert')}}">
                {{csrf_field()}}
                <div class="row justify-content-center">
                    <table class="form-group">
                        <tr>
                            <td class="unos pr-5">
                                <label for="tbNazivTipTretmana">
                                    <h5>Naziv:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="form-control" name="tbNazivTipTretmana" id="tbNazivTipTretmana" placeholder="Unesite naziv"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos aktivanNeaktivan">
                                <label for="ddlStatus">
                                    <h5>Status:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <select id="ddlStatus" name="ddlStatus" class="aktivanNeaktivan form-control">
                                    <option value="0" >Neaktivan</option>
                                    <option value="1" >Aktivan</option>
                                </select>
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
                        <tr >
                            <td colspan="2" align="center" class="pozicijaDugmeta">
                            <input type="submit" name="btnUnesi" id="btnUnesi" class="btn dugme" value="Unesi tip tretmana"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>


    </section>

@endsection
