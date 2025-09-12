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

            <div class="col-md-7 text-center mx-auto mt-3">
                <h3>Izmeni blog</h3>
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
            <div class="col-md-10 adminTable mx-auto mb-4" style="background-color:rgb(255,255,255,.3)">
                <form action="{{route('doAdminPanel_blog_update',['id_blog'=>$blog->id_blog])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="row justify-content-center">
                        <table class="form-group">
                            <tr>
                                <td class="unos">
                                    <label for="tbNaslovBlog">
                                        <h5>Naslov bloga:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <input type="text" class="aktivanNeaktivan form-control" name="tbNaslovBlog" id="tbNaslovBlog" value="{{$blog->naslov_blog}}"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos pr-5">
                                    <label for="tbPodnaslovBlog">
                                        <h5>Podnaslov bloga:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <textarea class="aktivanNeaktivan textEditor form-control" rows="8" cols="80"  name="tbPodnaslovBlog" id="tbPodnaslovBlog" >{{$blog->podnaslov_blog}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="tbTekstBlog">
                                        <h5>Tekst bloga:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <textarea rows="8" cols="80" class="aktivanNeaktivan textEditor form-control" name="tbTekstBlog" id="tbTekstBlog" >
                                        {{$blog->text_blog}}
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="postojeca_slika">
                                        <h5>Slika:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <a href="{{asset('/')}}img/blog/{{$blog->putanja_slika_blog}}" data-lightbox="roadtrip">
                                        <img id="postojeca_slika" class="img-fluid" src="{{asset('/')}}img/blog/{{$blog->putanja_slika_blog}}" width="200px" height="250px" alt="{{$blog->naslov_blog}}"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="unosSlike">
                                        <h5>Izmeni sliku:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <input type="file" class="form-control" name="unosSlike" id="unosSlike" placeholder="Unesite sliku"/>
                                </td>
                            </tr>
                            @if($blog->video_link)
                                <tr>
                                    <td class="unos">
                                        <label for="postojeci_video">
                                            <h5>Video:</h5>
                                        </label>
                                    </td>
                                    <td class="izmena" id="postojeci_video">
                                        {!! $blog->video_link !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="unos">
                                        <label for="tbVideo">
                                            <h5>Izmeni video:</h5>
                                        </label>
                                    </td>
                                    <td class="izmena">
                                        <textarea type="text" class="textEditor form-control" name="tbVideo" id="tbVideo" class="aktivanNeaktivan" placeholder="Unesi link" >
                                        </textarea>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="unos">
                                        <label for="tbVideo">
                                            <h5>Video:</h5>
                                        </label>
                                    </td>
                                    <td class="izmena">
                                        <textarea type="text" rows="4" cols="76" name="tbVideo" id="tbVideo" class="form-control aktivanNeaktivan" placeholder="Unesi link" >
                                        </textarea>
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td class="unos">
                                    <label for="description">
                                        <h5>Description:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <textarea rows="8" cols="80" class="form-control aktivanNeaktivan textEditor" name="description" id="description" >{{$blog->text_blog}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="keywords">
                                        <h5>Keywords:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <textarea rows="8" cols="80" class="form-control aktivanNeaktivan textEditor" name="keywords" id="keywords" >{{$blog->text_blog}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="unos">
                                    <label for="ddlBlog">
                                        <h5>Status:</h5>
                                    </label>
                                </td>
                                <td class="izmena">
                                    <select id="ddlBlog" name="ddlBlog" class="form-control aktivanNeaktivan">
                                        @if($blog->status == '0')
                                            <option value="0" selected>Neaktivan</option>
                                            <option value="1">Aktivan</option>
                                        @else($blog->status == '1')
                                            <option value="0">Neaktivan</option>
                                            <option value="1" selected>Aktivan</option>
                                        @endif
                                    </select>
                                </td>
                            </tr>
                            <tr  >
                                <td colspan="2" align="center" class="pozicijaDugmeta" style="">
                                    <input type="submit" name="btnIzmeni" id="btnIzmeni" value="Izmeni blog" class="btn dugme"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>

    </section>

@endsection
