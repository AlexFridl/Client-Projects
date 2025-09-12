@extends('layout.index')

@section('keywords')
    {{$podaci->keywords}}
@endsection

@section('description')
    {{$podaci->description}}
@endsection

@section('title')
    Logovanje
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="move_right poruka">
            @empty(!session('poruka'))
                {{session('poruka')}}
            @endempty
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 ml-5  text-center" >
            <form method="POST" action="{{route('doLogovanje')}}">
                {{csrf_field()}}
                <div class="row justify-content-center mb-3">
                        <div class="col-md-4">
                            <h1 class="text-center">Logovanje</h1>
                        </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <label class="mb-0" for="tbKorIme">
                            <h4>Korisničko ime:</h4>
                        </label>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <input class="form-control text-center bg-white" type="text" name="tbKorIme" id="tbKorIme" placeholder="Korisnicko ime"/>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <label class="mb-0 mt-3" for="tbPassword">
                            <h4>Lozinka:</h4>
                        </label>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <input class="form-control text-center bg-white" type="password" name="tbPassword" id="tbPassword" placeholder="Lozinka"/>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <input type="submit" name="tbPotvrdi" id="tbPotvrdi" class="btn dugme mb-5 mt-3"  value="Uloguj se"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </section>


@endsection
