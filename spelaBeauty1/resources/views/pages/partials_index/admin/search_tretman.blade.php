    @if($tretmani->isEmpty())
        <p class="col-md-7 text-center poruka mx-auto mb-4">Nema rezultata za zadatu pretragu.</p>
    @else
        <div class="col-md-11 mx-auto">
            <table class="table table-hover table-bordered table-light table-responsive-sm table-responsive-md
                            table-responsive-lg adminTable">
                <thead>
                    <tr>
                        <th scope="col" class="zaglavljeTabele">#</th>
                        <th scope="col" class="zaglavljeTabele">Naziv</th>
                        <th scope="col" class="zaglavljeTabele">Tekst</th>
                        <th scope="col" class="zaglavljeTabele">Tip tretmana</th>
                        <th scope="col" class="zaglavljeTabele">Slika</th>
                        <th scope="col" class="zaglavljeTabele">Cena</th>
                        <th scope="col" class="zaglavljeTabele">Description</th>
                        <th scope="col" class="zaglavljeTabele">Keywords</th>
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
                    @foreach($tretmani as $t)
                        <tr>
                            <th scope="row" class="tekstTabela">{{$i}}</th>
                            <?php $i++ ?>
                            <td class="tekstTabela"> {{ $t->t_naziv }}</td>
                            <td class="tekstTabela">{!! $t->text_tretman !!}</td>
                            <td class="tekstTabela">{!! $t->tt_naziv !!}</td>
                            <td class="tekstTabela">
                                @if($t->putanja_slika == null)
                                    Nema slike
                                @else
                                    <a href="{{asset('/')}}img/tretmani/{{$t->putanja_slika}}" data-lightbox="roadtrip">
                                        <img src="{{asset('/')}}img/tretmani/{{$t->putanja_slika}}"  alt="{!! $t->t_naziv !!}"/>
                                    </a>
                                @endif
                            </td>
                            <td class="tekstTabela" >
                                @if ($t->cena != NULL)
                                    <span class="bi bi-tags-fill">{!! $t->cena !!}</span>
                                @else
                                    Nema cenu
                                @endif
                            </td>
                            <td class="tekstTabela">{!! $t->description !!}</td>
                            <td class="tekstTabela">{!! $t->keywords !!}</td>
                            @if($t->t_status == '1')
                                <td class="tekstTabela">Aktivan</td>
                            @elseif($t->t_status == '0')
                                <td class="tekstTabela">Neaktivan</td>
                                @else
                                <td></td>
                            @endif
                            <td>
                                <a class="linkA"  href="{{route('tretmani',['id_tt'=>$t->tt_id, 'id_tretman' => $t->id_tretman])}}">Pregled</a>
                            </td>
                            <td><a class="linkA"  href="{{route('adminPanel_tretmani_update',['id_tretman'=>$t->id_tretman])}}">Izmeni</a></td>
                            <td><a class="linkA"  href="{{route('adminPanel_tretmani_delete',['id_tt'=>$t->tt_id,'id_tretman'=>$t->id_tretman])}}">Obrisi</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="searchTretmani">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-12">
                        {{ $tretmani->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>

    @endif
