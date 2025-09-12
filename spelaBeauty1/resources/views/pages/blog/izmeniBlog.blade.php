@extends('layout.index')

@section('keywords')
    @foreach($podaci as $p)
        {{$p->keywords}}
    @endforeach
@endsection

@section('keywords')
    @foreach($podaci as $p)
        {{$p->description}}
    @endforeach
@endsection

@section('title')
    Admin Panel
@endsection

@section('content')
    <div>
        <div class="mt-3">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Unesi blog</h3>
            </div>
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
            <form action="{{route('doBlog_update',['id_blog'=>$blog->id_blog])}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td class="unos">Naslov bloga:</td>
                        <td class="izmena">
                            <input type="text" name="tbNaslovBlog" id="tbNaslovBlog" class="aktivanNeaktivan textEditor" value="{!! $blog->naslov_blog !!}"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="unos">Podnaslov bloga:</td>
                        <td class="izmena">
                            <textarea rows="8" cols="80"  name="tbPodnaslovBlog" id="tbPodnaslovBlog" class="aktivanNeaktivan textEditor">{!! $blog->podnaslov_blog !!}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="unos">Tekst bloga:</td>
                        <td class="izmena">
                            <textarea rows="8" cols="80" name="tbTekstBlog" id="tbTekstBlog" class="aktivanNeaktivan textEditor">{!! $blog->text_blog !!}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="unos">Slika:</td>
                        <td style="padding-top: 25px;">
                            <img class="img-fluid" src="{{asset('/')}}img/blog/{{$blog->putanja_slika_blog}}" width="200px" height="250px" alt="{!! $blog->naslov_blog !!}"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="unos">Izmeni sliku:</td>
                        <td class="izmena" >
                            <input type="file" class="aktivanNeaktivan" name="unosSlike" id="unosSlike" placeholder="Unesite sliku"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="unos">Status:</td>
                        <td class="izmena">
                            <select id="ddlBlog" name="ddlBlog" class="aktivanNeaktivan">
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
                    <tr>
                        <td colspan="2" align="center" style="padding-bottom:5px;padding-top: 15px;">
                            <input type="submit" name="btnIzmeni" id="btnIzmeni" value="Izmeni" class="dugme"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    </div>
    </div>

    </section>

@endsection
