<div class="col-md-11 mx-auto">
    <table class="table table-hover table-bordered table-light table-responsive-sm table-responsive-md
                    table-responsive-lg adminTable">
        <thead>
        <tr>
            <th scope="col" class="zaglavljeTabele">#</th>
            <th scope="col" class="zaglavljeTabele">Naslov</th>
            <th scope="col" class="zaglavljeTabele">Podnaslov</th>
            <th scope="col" class="zaglavljeTabele w-95">Text</th>
            <th scope="col" class="zaglavljeTabele">Slika</th>
            <th scope="col" class="zaglavljeTabele">Video</th>
            <th scope="col" class="zaglavljeTabele">Description</th>
            <th scope="col" class="zaglavljeTabele">Keywords</th>
            <th scope="col" class="zaglavljeTabele">Postavljeno</th>
            <th scope="col" class="zaglavljeTabele">Status</th>
            <th scope="col" class="zaglavljeTabele">Pregled</th>
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
                    <td class="tekstTabela">
                        <a href="{{asset('/')}}img/blog/{{$b->putanja_slika_blog}}" data-lightbox="roadtrip">
                            <img class="img-fluid" src="{{asset('/')}}img/blog/{!! $b->putanja_slika_blog !!}" width="200px" height="250px" alt="{!! $b->naslov_blog !!}"/>
                        </a>
                    </td>
                    <td class="tekstTabela">
                        @if($b->video_link)
                            <b class="naslovAdminTable">Ima video</b>
                        @else
                            <b class="naslovAdminTable">Nema video</b>
                        @endif
                    </td>
                    <td class="tekstTabela">{!! $b->description !!}</td>
                    <td class="tekstTabela">{!! $b->keywords !!}</td>
                    <td class="tekstTabela">{!! $b->created_at->toDateString() !!}</td>
                    @if($b->status == 1)
                        <td class="tekstTabela">Aktivan</td>
                    @else
                        <td class="tekstTabela">Neaktivan</td>
                    @endif
                    <td><a class="linkA"  href="{{route('adminPanel_pregled_blog',['id_blog'=>$b->id_blog])}}">Pregled</a></td>
                    <td><a class="linkA"  href="{{route('adminPanel_blog_update',['id_blog'=>$b->id_blog])}}">Izmeni</a></td>
                    <td><a  class="linkA"  href="{{route('adminPanel_blog_delete',['id_blog'=>$b->id_blog])}}">Obrisi</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="paginacija_search">
        <div class="col-md-12 col-12">
            {{ $blog->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>
