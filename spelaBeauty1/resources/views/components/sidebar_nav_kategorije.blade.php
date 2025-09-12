
@if(!($kategorije->isEmpty()) )
    <div class="sidebar col-md-3 ml-2 pl-5 pt-3" style="background-color: rgb(255,255,255,1); opacity:0.8;" >
        <nav class=" py-2 mb-4">
            <ul class="nav flex-column" id="nav_accordion">

                @foreach($kategorije as $kategorija)
            <li class="nav-item">
                        <a class="nav-link tekst link_kategorije" id="dodaj_opis_tretmana"
                        href="{{route('kategorija',
                        ['id_tt'=>$id_tt,'id_tretman' => $kategorija->t_id, 'id_kategorija' => $kategorija->id_kategorija ]) }}"
                        data-id_kategorija="{{ $kategorija->id_kategorija }}"
                        data-id_t="{{ $kategorija->t_id }}"
                        data-id_tt="{{$kategorija->tretman['tt_id'] }}"
                        >
                            {{$kategorija->kat_naziv}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
@endif
