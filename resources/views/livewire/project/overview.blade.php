<div>
    <section class="section-wrap pt-72 pb-72 pb-lg-40">
        <div class="container">
            <div class="title-row">
                <h2 class="section-title">Proyek yang telah kami kerjakan</h2>
            </div>

            <div class="row masonry-grid">

                @foreach ($posts as $post)
                <div class="masonry-item col-md-3 px-1 project hover-trigger residential">
                    <div class="project__container">
                        <div class="project__img-holder">
                            <a href="javascript:void(0)">
                                <img src="{{ $post->thumbnail ? $post->thumbnail->media_path : asset('images/thumbnail_16_9.png')}}"
                                    alt="{{ $post->title }}" class="project__img"
                                    loading="{{ $loop->iteration < 4 ? 'eager' : 'lazy' }}">
                                <div class="hover-overlay">
                                    <div class="project__description">
                                        <h3 class="project__title">{{ $post->title }}</h3>
                                        {{-- <span class="project__date">{{ $post->subject }}</span> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-12 text-center pt-72 pb-72">
                    <a href="javascript:void(0)" class="btn btn--lg btn--dark"><span>Selengkapnya</span></a>
                </div>

            </div>
        </div>
    </section>
</div>
