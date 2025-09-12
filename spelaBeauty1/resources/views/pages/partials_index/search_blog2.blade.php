   {{-- {{ dd($blog)}} --}}
   @foreach ($blogovi as $key => $blog)
        <div class="row justify-content-center">
            @if ($key % 2 === 0)
                <div class="col-lg-4 col-md-4 col-sm-4 text-center mt-2 ml-5 mr-5 d-flex justify-content-center align-items-center overflow-hidden object-fit-contain"
                    style="border:3px solid #515828;border-radius:5px;">
                    <img class=" mb-2 radius mt-2 fixed-image" {{-- class=" mb-2 radius mt-2 w-auto h-auto img-fluid" --}}
                        src="{{ asset('/') }}img/blog/{{ $blog->putanja_slika_blog }}" alt="{{ $blog->naslov_blog }}" />
                </div>
                <div class="col-lg-6 col-sm-6 mt-5">
                    <h2>
                        <a href="{{ route('one_Blog', ['id_blog' => $blog->id_blog]) }}">{!! $blog->naslov_blog !!}</a>
                    </h2>
                    <p class="aktivanNeaktivan mt-3">
                        {!! $truncated = Str::limit($blog->text_blog, 500, ' (...)') !!}
                    </p>
                    <a href="{{ route('one_Blog', ['id_blog' => $blog->id_blog]) }}"
                        class="navigacija" class="btn_3">
                        <b>Više</b>
                    </a>
                </div>
            @else
                <div class="col-lg-6 col-sm-6 mt-5 ml-5 mr-5">
                    <h2>
                        <a href="{{ route('one_Blog', ['id_blog' => $blog->id_blog]) }}">{!! $blog->naslov_blog !!}</a>
                    </h2>
                    <p class="aktivanNeaktivan mt-3">
                        {!! $truncated = Str::limit($blog->text_blog, 500, ' (...)') !!}
                    </p>
                    <a href="{{ route('one_Blog', ['id_blog' => $blog->id_blog]) }}"
                        class="navigacija" class="btn_3">
                        <b>Više</b>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center mt-2 d-flex justify-content-center align-items-center overflow-hidden object-fit-contain"
                    style="border:3px solid #515828;border-radius:5px;">
                    <img class=" mb-2 radius mt-2  fixed-image"
                        src="{{ asset('/') }}img/blog/{{ $blog->putanja_slika_blog }}" alt="{{ $blog->naslov_blog }}" />
                </div>
            @endif
        </div>
    @endforeach
    {{-- Pagination --}}
    <div class="row justify-content-center mb-4">
        <div class="col-md-12 col-12 mt-5">
            {{ $blogovi->links('vendor.pagination.custom') }}
        </div>
    </div>
    {{-- End Pagination --}}

