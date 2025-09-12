@extends('layout.index')

@section('keywords')
    {{-- @foreach($podaci as $p) --}}
        {{$podaci->keywords}}
    {{-- @endforeach --}}
@endsection

@section('keywords')
    {{-- @foreach($podaci as $p) --}}
        {{$podaci->description}}
    {{-- @endforeach --}}
@endsection

@section('title')
    Unos bloga
@endsection

@section('content')
    <div>
        <div class="mt-3">
            <div class="row justify-content-center">
                <div class=" col-md-7 text-center">
                    <h3>Unesi blog</h3>
                </div>
            </div>
            <div class="row justify-content-center">
            @if($errors->any())
                <div class="alert alert-danger greske_error">
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
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 adminTable">
                    <form action="{{route('doAdminPanel_blog_insert')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row justify-content-center">
                            <table>
                                <tr>
                                    <td class="unos">Naslov bloga:</td>
                                    <td class="izmena">
                                        <input type="text" class="textEditor" name="tbNaslovBlog" id="tbNaslovBlog" placeholder="Unesi naslov bloga"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="unos">Podnaslov bloga:</td>
                                    <td class="izmena">
                                        <textarea rows="8" cols="80"  class="textEditor" name="tbPodnaslovBlog" id="tbPodnaslovBlog" placeholder="Unesi podnaslov bloga"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="unos">Tekst bloga:</td>
                                    <td class="izmena">
                                        <textarea rows="8" cols="80" class="textEditor" name="tbTekstBlog" id="tbTekstBlog" placeholder="Unesi tekst bloga"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="unos">Unesi sliku:</td>
                                    <td class="izmena">
                                    <input type="file" name="unosSlike" id="unosSlike" class="aktivanNeaktivan"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="unos">Description:</td>
                                    <td class="izmena">
                                        <textarea rows="8" cols="80" class="textEditor" name="descritpion" id="descritpion" placeholder="Unesi description"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="unos">Keywords:</td>
                                    <td class="izmena">
                                        <textarea rows="8" cols="80" class="textEditor" name="keywords" id="keywords" placeholder="Unesi keywords"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center" class="pozicijaDugmeta">
                                        <input type="submit" name="btnDodaj" id="btnDodaj" value="Dodaj" class="dugme"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    </section>

@endsection
