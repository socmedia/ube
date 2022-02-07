<section class="section-wrap pt-72 pb-72 pb-lg-40">
    <div class="container">
        <div class="title-row">
            <h2 class="section-title">Proyek yang telah kami kerjakan</h2>
        </div>

        <div class="masonry projects">

            @foreach ($posts as $post)
            <a href="{{ $post->thumbnail ? $post->thumbnail->media_path : asset('images/thumbnail_16_9.png')}}"
                class="item">
                <img src="{{ $post->thumbnail ? $post->thumbnail->media_path : asset('images/thumbnail_16_9.png')}}"
                    alt="{{ $post->title }}" class="project__img"
                    loading="{{ $loop->iteration < 4 ? 'eager' : 'lazy' }}">
            </a>
            @endforeach

        </div>

        <div class="col-12 text-center pt-72 pb-72">
            <a href="javascript:void(0)" class="btn btn--lg btn--dark"><span>Selengkapnya</span></a>
        </div>
    </div>
</section>
