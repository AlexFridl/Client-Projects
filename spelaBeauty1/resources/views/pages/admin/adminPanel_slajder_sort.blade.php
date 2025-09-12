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

    <div class="col-md-7 text-center mx-auto mt-3">
        <h3>Sortiraj slike za slajder</h3>
    </div>
    <div class="col-md-7 text-center poruka mx-auto mb-3">
        @empty(!session('poruka'))
            {{session('poruka')}}
        @endempty
    </div>
    <form id="myForm">
        @csrf
        <div class="col-md-11 mx-auto mb-3" >
            <table class="table table-striped table-bordered table-light adminTable " id="sortTable">
                <thead>
                    <tr>
                        <th scope="col" class="zaglavljeTabele align-middle">Slika</th>
                        <th scope="col" class="zaglavljeTabele align-middle">Postavljeno</th>
                        <th scope="col" class="zaglavljeTabele  align-middle ">Redosled</th>
                        <th scope="col" class="zaglavljeTabele">
                            <button type="submit" class="linkA btn adminTable" name="btnSort" id="btnSort">Sortiraj</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slajder as $s)
                        <tr>
                            <td class="tekstTabela">{{$s->naslov_slajder}}</td>
                            <td class="tekstTabela">
                                <a href="{{asset('/')}}img/slajder/{{$s->putanja_slajder}}" data-lightbox="roadtrip">
                                    <img src="{{asset('/')}}img/slajder/{{$s->putanja_slajder}}" width="100px" height="100px" alt="{{$s->naslov_slajder}}"/>
                                </a>
                            </td>
                            <td class="tekstTabela">{{date('d.m.Y',$s->postavljeno)}}</td>
                            <td class="tekstTabela">
                                <input type="hidden" class="id_slider" name="id_slider" value="{{ $s->id_slajder }}"/>
                                <input type="text" class="sort_value {{ in_array($s->id_slajder, $duplikatniIdjevi) ? 'is-invalid border-danger' : '' }}"  id="sort" name="sort" value="{{ $s->sort }}"/>
                                @if(in_array($s->id_slajder, $duplikatniIdjevi))
                                   <div class="text-danger error_message">Ne duplirati poziciju!</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
@endsection
