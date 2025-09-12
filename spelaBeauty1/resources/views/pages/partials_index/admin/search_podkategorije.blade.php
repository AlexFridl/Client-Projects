<div class="col-md-11 mx-auto">
    <table class="table table-hover table-bordered table-light table-responsive-sm table-responsive-md
                table-responsive-lg adminTable">
        <thead class="">
            <tr>
                <th scope="col" class="zaglavljeTabele">#</th>
                <th scope="col" class="zaglavljeTabele">Naziv podkategorije</th>
                <th scope="col" class="zaglavljeTabele">Tekst</th>
                <th scope="col" class="zaglavljeTabele">Tretman</th>
                <th scope="col" class="zaglavljeTabele">Kategorija</th>
                <th scope="col" class="zaglavljeTabele">Slika</th>
                <th scope="col" class="zaglavljeTabele">Cena</th>
                <th scope="col" class="zaglavljeTabele">Description</th>
                <th scope="col" class="zaglavljeTabele">Keywords</th>
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
            @foreach($podkategorije as $podkat)
                <tr>
                    <th scope="row" class="tekstTabela">{{$i}}</th>
                    <?php $i++ ?>
                    <td class="tekstTabela"> {{ $podkat->podkat_naziv }}</td>
                    <td class="tekstTabela">{!! $podkat->tekst_podkat !!}</td>
                    <td class="tekstTabela">{{ $podkat->kategorija->tretman->t_naziv }}</td>
                    <td class="tekstTabela">{{  $podkat->kategorija->kat_naziv }}</td>
                    <td class="tekstTabela">
                        @if($podkat['slika_putanja'] != null)
                            <a href="{{asset('/')}}img/tretmani/{{$podkat->slika_putanja}}" data-lightbox="roadtrip">
                            <img src="{{asset('/')}}img/tretmani/{{$podkat->slika_putanja}}"  alt="{!! $podkat->podkat_naziv !!}"/>
                        </a>
                        @else
                            Nema slike
                        @endif
                    </td>
                    <td class="tekstTabela">
                        @if ($podkat->cena)
                            <span class="bi bi-tags-fill">{!! $podkat->cena !!}</span>
                        @else
                            Nema cenu
                        @endif
                    </td>
                    <td class="tekstTabela">{!! $podkat->description !!}</td>
                    <td class="tekstTabela">{!! $podkat->keywords !!}</td>
                    @if($podkat->podkat_status == '1')
                        <td class="tekstTabela">Aktivan</td>
                    @elseif($podkat->podkat_status == '0')
                        <td class="tekstTabela">Neaktivan</td>
                        @else
                        <td></td>
                    @endif
                    <td><a class="linkA"  href="{{route('adminPanel_podkategorija_update',['id_podkategorija'=>$podkat->id_podkategorija])}}">Izmeni</a></td>
                    <td><a class="linkA"  href="{{route('adminPanel_podkategorija_delete',['id_podkategorija'=>$podkat->id_podkategorija])}}">Obrisi</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="paginacija_search">
        <div class="col-md-12 col-12 mx-auto">
            {{ $podkategorije->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>
