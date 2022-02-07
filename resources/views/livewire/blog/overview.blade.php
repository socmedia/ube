<div>
    @if ($isHomePage)
    <section class="section-wrap blog-grid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-grid__title-col d-flex flex-column mb-lg-48">
                        <div class="title-row">
                            <p class="subtitle">Blog</p>
                            <h2 class="section-title">Dapatkan berita maupun tips menarik dari kami.</h2>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="from-blog">
                        <div class="row row-60">
                            @forelse ($posts as $post)
                            <div class="col-sm-6 col-md-4 mb-3">
                                <article class="entry">
                                    <figure class="entry__img-thumb mb-3">
                                        <a href="single-post.html">
                                            <img src="{{ $post->thumbnail ? $post->thumbnail->media_path : asset('images/thumbnail_16_9.png') }}"
                                                class="entry__img" alt="{{$post->title}}"
                                                loading="{{ $loop->iteration < 4 ? 'eager' : 'lazy' }}">
                                        </a>
                                    </figure>
                                    <div class="entry__body">
                                        <ul class="entry__meta">
                                            <li class="entry__meta-date">
                                                <span>{{$post->created_at->format('d, M Y')}}</span>
                                            </li>
                                        </ul>
                                        <h4 class="entry__title">
                                            <a href="single-post.html">{{ $post->title }}</a>
                                        </h4>
                                        <p class="entry__subject">{{ $post->subject }}</p>
                                    </div>
                                </article>
                            </div>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @else

    @endif
</div>
