@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('keywords')
    {{$podaci->description}}
@endsection


@section('title')
    Admin Panel - Blog
@endsection

@section('content')

        <div class=" col-md-7 text-center mx-auto mt-3">
            <h3>Dodaj blog</h3>
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

        <div class="col-md-11 mx-auto adminTable mb-4" style="background-color:rgb(255,255,255,.3)">
            <form action="{{route('doAdminPanel_blog_insert')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row justify-content-center">
                    <table class="form-group">
                        <tr>
                            <td class="unos">
                                <label for="tbNaslovBlog">
                                    <h5>Naslov bloga:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="text" class=" form-control" name="tbNaslovBlog" id="tbNaslovBlog" placeholder="Unesi naslov bloga"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos pr-5">
                                <label for="tbPodnaslovBlog">
                                    <h5>Podnaslov bloga:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <textarea rows="8" cols="80"  class="textEditor form-control" name="tbPodnaslovBlog" id="tbPodnaslovBlog" placeholder="Unesi podnaslov bloga"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="tbTekstBlog">
                                    <h5>Tekst bloga:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <textarea rows="8" cols="80" class="textEditor form-control" name="tbTekstBlog" id="tbTekstBlog" placeholder="Unesi tekst bloga"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="unosSlike">
                                    <h5>Unesi sliku:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <input type="file" name="unosSlike" id="unosSlike" class="aktivanNeaktivan form-control"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="unos">
                                <label for="tbVideo">
                                    <h5>Unesi link videa:</h5>
                                </label>
                            </td>
                            <td class="izmena">
                                <textarea type="text" rows="4" cols="76" name="tbVideo" id="tbVideo" class="aktivanNeaktivan form-control" placeholder="Unesi link" >
                                </textarea>
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
                        <tr>
                            <td colspan="2" align="center" class="pozicijaDugmeta">
                                <input type="submit" name="btnDodaj" id="btnDodaj" value="Dodaj" class=" btn dugme"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>

    </section>

@endsection
