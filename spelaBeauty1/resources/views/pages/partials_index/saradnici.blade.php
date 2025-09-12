<div class="product_list">
    <div class="col-lg-10 col-md-10 offset-md-1">
        <div class="row justify-content-center">
            @foreach ( $saradnici as $saradnik )
                <div class="col-lg-2 col-sm-2 col-md-2">
                    <div class="single_product_item">
                        <img class="img-fluid radius" src="{{asset('/')}}img/saradnici/{{$saradnik['putanja_slika']}}"
                            width="150px" height="100px" alt="{{ $saradnik['ime_saradnika'] }}"/>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
