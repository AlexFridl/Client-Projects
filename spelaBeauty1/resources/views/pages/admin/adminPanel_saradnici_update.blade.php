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

        <div class=" col-md-7 text-center mt-3 mx-auto" >
            <h3 class="naslovAdminTable">Izmeni sliku saradnika</h3>
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
        <div class="move_right poruka">
            @empty(!session('poruka'))
                {{session('poruka')}}
            @endempty
        </div>
            <div class="col-md-11 adminTable mx-auto"  style="background-color:rgb(255,255,255,.3)">
                @if($saradnici)
                    <form method="POST" action="{{route('doAdminPanel_saradnici_update',['id_saradnici'=>$saradnici['id_saradnici']])}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @method('PUT')
                        {{-- {{ dd($saradnici['id_slika']) }} --}}
                        <div class="row justify-content-center">
                            <table class="form-group">
                                <tr>
                                    <td class="unos">
                                        <label for="tbNaziv">
                                            <h5>Slika:</h5>
                                        </label>
                                    </td>
                                    <td class="izmena">
                                        <a href="{{asset('/')}}img/saradnici/{{$saradnici['putanja_slika']}}" data-lightbox="roadtrip">
                                            <img class="img-fluid" src="{{asset('/')}}img/saradnici/{{$saradnici['putanja_slika']}}" width="200px" height="250px" alt="{{$saradnici->ime_saradnika}}"/>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="unos pr-5">
                                        <label for="tbNaziv">
                                            <h5>Ime saradnika:</h5>
                                        </label>
                                    </td>
                                    <td class="izmena">
                                        <input type="text" name="tbSaradnik" id="tbSaradnik" class="aktivanNeaktivan form-control" value="{{ $saradnici['ime_saradnika'] }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="unos">
                                        <label for="tbNaziv">
                                            <h5>Slika:</h5>
                                        </label>
                                    </td>
                                    <td class="izmena">
                                        <input type="file" name="fSlika" id="fSlika" class="aktivanNeaktivan form-control"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="unos">
                                        <label for="tbNaziv">
                                            <h5>Status:</h5>
                                        </label>
                                    </td>
                                    <td class="izmena">
                                        <select id="ddlStatus" name="ddlStatus" class="aktivanNeaktivan form-control">
                                            @if($saradnici['status_slika'] == '0')
                                                <option value="0" selected>Neaktivan</option>
                                                <option value="1">Aktivan</option>
                                            @else
                                                <option value="0">Neaktivan</option>
                                                <option value="1" selected>Aktivan</option>
                                            @endif
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="unos ">
                                        <label for="tbNaziv">
                                            <h5>Postavljeno:</h5>
                                        </label>
                                    </td>
                                    <td class="izmena">
                                        <label class="pl-2"> {{ date('d-m-Y', $saradnici['postavljeno'] ) }}</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center">
                                        <input type="submit" name="btnIzmeni" id="btnIzmeni" class="dugme btn" value="Izmeni"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                @endif
            </div>

    </section>

@endsection
