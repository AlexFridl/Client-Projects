@extends('layout.index')

@section('keywords')
        {{$podaci->keywords}}
@endsection

@section('description')
        {{$podaci->description}}
@endsection


@section('title') Kontakt @endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-10 text-center mt-3">
                <h2 class="aktivanNeaktivan">Kontaktirajte nas</h2>
            </div>
        </div>
            <div class="row justify-content-center">
                <div class=" poruka">
                    @empty(!session('poruka'))
                        {{session('poruka')}}
                    @endempty
                </div>
            </div>
        <div class="row justify-content-center ">
            <div class="col-lg-8">
                <form class="form-contact " action="{{ route('doKontakt') }}" method="POST" id="contactForm"
                    novalidate="novalidate">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control kontakt_input_border kontakt_input"
                                    name="name" id="name"
                                    type="text" onfocus="this.placeholder = ''"
                                    placeholder='Unesite Ime i Prezime'>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control kontakt_input_border kontakt_input"
                                    name="email" id="email"
                                    type="email" onfocus="this.placeholder = ''"
                                    placeholder='Unesite Email'>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control kontakt_input_border kontakt_input"
                                    name="subject" id="subject"
                                    type="text" onfocus="this.placeholder = ''"
                                    placeholder='Unesite Subject'>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100 kontakt_input_border kontakt_input"
                                    name="message" id="message" cols="30" rows="9"
                                    onfocus="this.placeholder = ''"
                                    placeholder='Unesite Poruku'></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-left">
                        <div class="col-md-4">
                            <input type="submit" name="tbPotvrdi" id="tbPotvrdi" class="btn dugme mb-3"  value="Pošaljite poruku"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
</div>

@endsection
