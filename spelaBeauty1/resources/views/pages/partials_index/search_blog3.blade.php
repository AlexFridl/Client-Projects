<div class="row justify-content-center">
    @foreach ($blogovi as $blog)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-sm">
                <img src="{{ asset('/') }}img/blog/{{ $blog->putanja_slika_blog }}"
                    class="img-fluid d-block object-fit-cover radius" alt="{{ $blog->naslov_blog }}">
                <div class="card-body">
                    <div class="cart title">
                        <h2>
                            <a class="blog_item_date" href="{{ route('one_Blog', ['id_blog' => $blog->id_blog]) }}">
                                {!! $blog->naslov_blog !!}
                            </a>
                        </h2>
                    </div>
                    <div class="card-text">
                        <p>{!! $truncated = Str::limit($blog->text_blog, 200, ' (...)') !!}</p>
                    </div>
                    <a href="{{ route('one_Blog', ['id_blog' => $blog->id_blog]) }}">Više</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div id="paginacija_search">
    <div class="row justify-content-center mb-4">
        <div class="col-md-12 col-12 mt-5">
            {{ $blogovi->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>
