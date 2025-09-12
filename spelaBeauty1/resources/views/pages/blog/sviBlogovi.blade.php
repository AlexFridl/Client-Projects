
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
    Blogovi
@endsection

@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="mt-5">
                <h3 class="nav-link naslovAdminTable">Blog</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="pb-3">
                <label class="mb-3" style="color: #515828;font-size: 16px;">Sortiraj po datumu:</label>
                <input type="date"name="sortByDateBlog" id="sortByDateBlog" class="aktivanNeaktivan"/>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 text-right">
                @if(session()->has('user') && session()->get('user')->naziv == 'admin')
                    <div style="width: 500px;padding-left: 1200px;">
                        <h5><a class="linkA"  class="nav-link" href="{{route('adminPanel_blog_insert')}}">Dodaj blog</a></h5>
                    </div>
                @endif
                <div id="ispis">
                    <table class="table table-striped adminTable">
                        <thead>
                            <tr>
                                <th scope="col" class="zaglavljeTabele">#</th>
                                <th scope="col" class="zaglavljeTabele">Naslov</th>
                                <th scope="col" class="zaglavljeTabele">Podnaslov</th>
                                <th scope="col" class="zaglavljeTabele">Text</th>
                                <th scope="col" class="zaglavljeTabele">Slika</th>
                                <th scope="col" class="zaglavljeTabele">Postavljeno</th>
                                <th scope="col" class="zaglavljeTabele">Status</th>
                                <th scope="col" class="zaglavljeTabele">Izmeni</th>
                                <th scope="col" class="zaglavljeTabele">Obrisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_GET['page'])){
                                $perPage = $_GET['page'];
                                if(!isset($perPage) || $perPage == 1){
                                    $i = 1;
                                }
                                else{
                                    $i = (($perPage -1 ) * 6) + 1;
                                }
                            }else{
                                $i = 1;
                            }
                            ?>
                            @foreach($blog as $b)
                                <tr>
                                    <th scope="row" class="tekstTabela">{{$i}}</th>
                                    <?php $i++ ?>
                                    <td class="tekstTabela">{!! $b->naslov_blog !!}</td>
                                    <td class="tekstTabela">{!! $b->podnaslov_blog !!}</td>
                                    <td class="tekstTabela">{!! $b->text_blog !!}</td>
                                    <td>  <img class="img-fluid" src="{{asset('/')}}img/blog/{{$b->putanja_slika_blog}}" width="200px" height="250px" alt="{{$b->naslov_blog}}"/></td>
                                    <td class="tekstTabela">{!! date('d.m.Y.',$b->postavljeno) !!}</td>
                                    @if($b->status == 1)
                                        <td class="tekstTabela">Aktivan</td>
                                    @else
                                        <td class="tekstTabela">Neaktivan</td>
                                    @endif
                                    <td><a class="linkA"  href="{{route('blog_update',['id_blog'=>$b->id_blog])}}">Izmeni</a></td>
                                    <td><a  class="linkA"  href="{{route('blog_delete',['id_blog'=>$b->id_blog])}}">Obrisi</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-5  ">
            <div class="col-md-3">
                {{ $blog->links() }}
            </div>
        </div>

    </div>
    </div>
    </section>

@endsection
