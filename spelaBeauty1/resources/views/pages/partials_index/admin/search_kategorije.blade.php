<div class="col-md-11 mx-auto">
    <table class="table table-hover table-bordered table-light table-responsive-sm table-responsive-md
                    table-responsive-lg adminTable">
        <thead>
            <tr>
                <th scope="col" class="zaglavljeTabele">#</th>
                <th scope="col" class="zaglavljeTabele">Naziv kategorije</th>
                <th scope="col" class="w-75 zaglavljeTabele">Tekst</th>
                <th scope="col" class="zaglavljeTabele">Tretman</th>
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
            @foreach($kategorije as $kat)
                <tr>
                    <th scope="row" class="tekstTabela">{{$i}}</th>
                    <?php $i++ ?>
                    <td class="tekstTabela"> {!! $kat->kat_naziv !!}</td>
                    <td class="tekstTabela"> {!!  $kat->text_kat   !!} </td>
                    <td class="tekstTabela">
                        {{ $kat->tretman === NULL ? 'Ne postoji tretman kojem ova kategorija pripada' : $kat->tretman['t_naziv']   }}
                    </td>
                    <td class="tekstTabela">
                        @if($kat->slika_putanja !== NULL)
                            <p>Nema slike</p>
                        @else
                            <a href="{{asset('/')}}img/tretmani/{{$kat->slika_putanja}}" data-lightbox="roadtrip">
                                <img src="{{asset('/')}}img/tretmani/{{$kat->slika_putanja}}" width="" height="" alt="{!! $kat->kat_naziv !!}"/>
                            </a>
                        @endif
                    </td>
                    <td class="tekstTabela">
                        @if ($kat->cena != NULL)
                            <span class="bi bi-tags-fill">{!! $kat->cena !!}</span>
                        @else
                            Nema cenu
                        @endif
                    </td>
                    <td class="tekstTabela">{!! $kat->description ?? null !!}</td>
                    <td class="tekstTabela">{!! $kat->keywords ?? null !!}</td>
                    @if($kat->k_status == '1')
                        <td class="tekstTabela">Aktivan</td>
                    @elseif($kat->k_status == '0')
                        <td class="tekstTabela">Neaktivan</td>
                        @else
                        <td></td>
                    @endif
                    <td><a class="linkA"  href="{{route('adminPanel_kategorija_update',['id_kategorija'=>$kat->id_kategorija])}}">Izmeni</a></td>
                    <td><a class="linkA"  href="{{route('adminPanel_kategorija_delete',['id_kategorija'=>$kat->id_kategorija])}}">Obrisi</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="paginacija_search">
        <div class="col-md-12 col-12 mx-auto">
            {{ $kategorije->links('vendor.pagination.custom') }}
        </div>
    </div>
</div
