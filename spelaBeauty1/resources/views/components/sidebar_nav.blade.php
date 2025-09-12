      {{-- {{ dd($kategorije) }} --}}

@if(!($kategorije->isEmpty()))

    <div class="sidebar col-md-3 mb-5" >
        <nav class=" py-2 mb-4">
            <ul class="nav flex-column" id="nav_accordion">

                @foreach($kategorije as $k)
                    <li class="nav-item">
                        <a class="nav-link tekst" id="dodaj_opis_tretmana"
                        href="{{route('kategorija',['id_tt'=>$id_tt,'id_tretman' => $k->t_id, 'id_kategorija' => $k->id_kategorija ]) }}">
                            {{$k->kat_naziv}}
                              {{-- <input type="hidden" value="{{ $k->id_kategorija }}" name="id_kategorija" id="id_kategorija"/> --}}
                        </a>

                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
@endif
