<body id="background_img">
    <div id="omot">
        <!--::header part start::-->
        <header class="main_menu home_menu"  style="background-color: #fff">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff">
                <a class="navbar-brand ml-5" href="#">
                    <img class="radius" id="logo_img" src="{{asset('/')}}img/spela_beauty3.png" width="50px" alt="logo"/>
                </a>
                <button id="dugme" class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu_icon"><i class="fas fa-bars"></i></span>
                </button>

                <div class="collapse navbar-collapse main-menu-item"  id="navbarSupportedContent">
                    {{-- ADMIN--}}
                    @if(session()->has('user') && session()->get('user')->naziv == 'admin')
                        <ul class="navbar-nav  mr-5 mb-2">
                            <li class="nav-item mt-4">
                                <a class="nav-link navigacija" href="{{route('adminPanel_tipTretman')}}">Tip tretmana</a>
                            </li>
                            <li class="nav-item mt-4 dropdown">
                                <a class="nav-link dropdown-toggle navigacija" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Tretmani
                                </a>
                                <ul class="dropdown-menu"  aria-labelledby="navbarDropdown" >
                                    {{-- style="background-color:#FFDEAD;color: #152e15;" --}}
                                    @foreach($tipTretmana as $tt)
                                        <li>
                                            <a class="dropdown-item" href="{{route('adminPanel_tretmani',['id_tt'=>$tt->id_tt])}}">
                                                {{$tt->tt_naziv}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link navigacija"  href="{{route('adminPanel_kategorije')}}">Kategorije</a>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link navigacija"  href="{{route('adminPanel_podkategorije')}}">Podkategorije</a>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link navigacija"  href="{{route('adminPanel_slajder')}}">Slajder</a>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link navigacija" href="{{route('adminPanel_korisnici')}}">Korisnici</a>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link navigacija"  href="{{route('adminPanel_blog')}}">Blog</a>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link navigacija" href="{{route('adminPanel_saradnici')}}">Saradnici</a>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link navigacija" href="{{route('adminPanel_podaci')}}">Podaci</a>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link navigacija log" href="{{route('logout')}}"
                                {{-- style="font-family:'Rubik';sans-serif:line-height: 2;font-size: 15px;margin-bottom: 0px;color: #515828;font-weight: 400;" --}}
                                >
                                    Odjava
                                </a>
                            </li>
                        </ul>

                    @elseif(!session()->has('user'))
                        <ul class="navbar-nav nav mr-5 mb-2" id="nav_accordion">
                            <li class="nav-item mt-4">
                                <a class="nav-link " href="{{route('index')}}">
                                    Početna
                                </a>
                            </li>
                            <li class="nav-item mt-4 dropdown has-submenu">
                                <a class="nav-link dropdown-toggle navigacija" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-expanded="false">
                                        Tretmani
                                </a>
                                <ul class=" dropdown-menu "  aria-labelledby="navbarDropdown"
                                    style="background-color:#FFDEAD;color: #152e15;width:250px;">
                                    @foreach($tipTretmana as $tt)
                                        <li>
                                            <a class="nav-link " href="#" value="{{$tt->id_tt}}" >
                                                {{$tt->tt_naziv}}
                                            </a>
                                            <ul class="submenu podmeni">

                                                @foreach ($tretmani as $t )
                                                    @if($tt->id_tt == $t['tt_id'] )
                                                        <li>
                                                            <a class="nav-link "
                                                            href="{{route('tretmani',['id_tt' => $t['tt_id'],'id_tretman' => $t['id_tretman']])}}"
                                                            value="{{$t['tt_id']}}">
                                                                {{ $t['t_naziv'] }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                                    </ul>
                                                </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link " href="{{route('blog1')}}">Blog1</a>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link " href="{{route('blog2')}}">Blog2</a>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link " href="{{route('blog3')}}">Blog3</a>
                            </li>
                            <li class="nav-item mt-4">
                                <a class="nav-link " href="{{route('kontakt')}}">Kontakt</a>
                            </li>
                        </ul>
                    @endif
                </div>
            </nav>
        </header>
        <!-- Header part end-->

    </div>
