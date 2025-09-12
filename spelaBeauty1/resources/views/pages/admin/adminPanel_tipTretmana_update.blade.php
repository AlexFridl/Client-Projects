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


        <div class=" col-md-7 mx-auto mt-3 text-center">
            <h3>Izmeni tip tretman</h3>
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
            <form method="POST" action="{{route('doAdminPanel_tipTretman_update',['id_tt'=>$tipTretman->id_tt])}}">
                {{csrf_field()}}
                @method('PUT')
                <div class="row justify-content-center">
                    <table class="form-group">
                        <tr>
                            <td class="unos">
                                <label for="naziv">
                                    <h5>Naziv:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" name="tbNazivTipTretmana" id="naziv" class="form-control aktivanNeaktivan" value="{!! $tipTretman->tt_naziv !!}"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos pr-5">
                                <label for="description">
                                    <h5>Description:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" name="description" id="description" class="form-control aktivanNeaktivan" value="{!! $tipTretman->description !!}"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="keywords">
                                    <h5>Keywords:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" name="keywords" id="keywords" class="form-control aktivanNeaktivan" value="{!! $tipTretman->keywords !!}"/>
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
                                    @if($tipTretman->tt_status == '0')
                                        <option value="0" selected>Neaktivan</option>
                                        <option value="1">Aktivan</option>
                                    @else($tipTretman->tt_status == '1')
                                        <option value="0">Neaktivan</option>
                                        <option value="1" selected>Aktivan</option>
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center" class="pozicijaDugmeta">
                            <input type="submit" name="btnIzmena" id="btnIzmena" class="btn dugme" value="Izmeni tip tretmana"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>

    </section>

@endsection
