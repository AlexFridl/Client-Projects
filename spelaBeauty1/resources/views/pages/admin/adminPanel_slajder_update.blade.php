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

    <div class="naslovUnosaSlajdera col-md-7 mx-auto mt-3 text-center">
        <h3 class="naslovAdminTable" class="nav-link">Izmena slike slajdera</h3>
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
    <div class="col-md-10 mx-auto adminTable mb-3" style="background-color:rgb(255,255,255,.3)">
        <form method="POST" action="{{route('doAdminPanel_slajder_update',['id_slajder'=>$slajder->id_slajder])}}" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="row justify-content-center">
                <table class="form-group">
                    <tr>
                        <td class="unos">
                            <label for="tbNaslov">
                                <h5>Naslov:</h5>
                            </label>
                        </td>
                        <td class="izmena">
                            <input type="text" class="form-control aktivanNeaktivan" name="tbNaslov" id="tbNaslov" value="{{$slajder->naslov_slajder}}"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="unos">
                            <label for="slika_slajdera">
                                <h5>Slika:</h5>
                            </label>
                        </td>
                        <td class="izmena">
                            <a href="{{asset('/')}}img/slajder/{{$slajder->putanja_slajder}}" data-lightbox="roadtrip">
                                <img id="slika_slajdera" src="{{asset('/')}}img/slajder/{{$slajder->putanja_slajder}}" width="200px" height="150px" alt="{{$slajder->naslov_slajder}}"/>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="unos pr-5">
                            <label for="fSlika">
                                <h5>Izmeni sliku:</h5>
                            </label>
                        </td>
                        <td class="izmena">
                            <input type="file" name="fSlika" id="fSlika" class="form-control aktivanNeaktivan"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="unos">
                            <label for="ddlStatus">
                                <h5>Aktivan:</h5>
                            </label>
                        </td>
                        <td class="izmena">
                            <select id="ddlStatus" name="ddlStatus" class="form-control aktivanNeaktivan">
                                @if($slajder->status == '0')
                                    <option value="0" selected>Neaktivan</option>
                                    <option value="1">Aktivan</option>
                                @else($slajder->status == '1')
                                    <option value="0">Neaktivan</option>
                                    <option value="1" selected>Aktivan</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" class="pozicijaDugmeta">
                            <input type="submit" name="btnIzmeni" id="btnIzmeni" value="Izmeni sliku za slajder" class="btn dugme"/>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

@endsection
