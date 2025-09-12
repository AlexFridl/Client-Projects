@extends('layout.index')

@section('keywords')
    @foreach($podaci as $p)
        {{$p->keywords}}
    @endforeach
@endsection

@section('description')
    {{-- This is the description for the salon rules page --}}
    @foreach($podaci as $p)
        {{$p->description}}
    @endforeach
@endsection

@section('title') Ponuda @endsection

@section('content')
    {{-- @include('components.sidebar_nav') --}}

        <div id="omotOpisaTretmana" style="">
            <div class="about_us_content" id="opisTretmana">
                <h5 style="color: #515828;font-weight: bold;margin-left:150px;margin-right:150px;padding-left:70px;">Pravila Salona Špela Beauty</h5>
                <p class="tekst aktivanNeaktivan" ></p>
                {{-- <div class="about_us_video slikaIspodTxt" >
                    <img class="img-fluid radius" src="" width="400px" height="300px" alt=""/>
                </div> --}}
            </div>
        </div>
        </div>


        </div>
        </div>
        </div>
        </div>
        </section>


@endsection
