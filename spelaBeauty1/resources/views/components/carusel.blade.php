
<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-md-8">
                <div class="breadcrumb_iner text-center">
                    <div class="col-md-12 ">

                        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                            <ol class="carousel-indicators">
                                @for($i=0; $i<count($slajder); $i++)
                                    <li data-target="#carouselExampleIndicators" @if($i == 0) class="active" @endif data-slide-to="{{$i+1}}">

                                    </li>
                                @endfor
                            </ol>
                            <div class="carousel-inner ">
                                @foreach($slajder as $s)
                                    <div class="carousel-item @if($loop->index == 0) active @endif ">
                                        <img src="{{asset('/')}}img/slajder/{{$s->putanja_slajder}}" class="d-block radius " alt="{{$s->naslov_slajder}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

