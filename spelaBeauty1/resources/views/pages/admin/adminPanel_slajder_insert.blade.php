@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('description')
    {{$podaci->description}}
@endsection



@section('title')
    Admin Panel - Slajder
@endsection


@section('content')

        <div class="col-md-7 text-center mx-auto mt-3" >
            <h3>Dodaj sliku za slajder</h3>
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
        <div class="col-md-8 mx-auto adminTable" style="background-color:rgb(255,255,255,.3)">
            <form method="POST" action="{{route('doAdminPanel_slajder_insert')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row justify-content-center">
                    <table class="form-group">
                        <tr>
                            <td class="unos pr-5">
                                <label for="tbNaslov">
                                    <h5>Naslov:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class="form-control" name="tbNaslov" id="tbNaslov" placeholder="Unesite naslov"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="fSlika">
                                    <h5>Slika:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="file" name="fSlika" id="fSlika" class="aktivanNeaktivan form-control"/>
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
                                <input type="submit" name="btnUnesi" id="btnUnesi" class="btn dugme" value="Unesi sliku za slajder"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>


    </section>

@endsection
