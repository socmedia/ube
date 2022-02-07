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
                                        <a href="{{ route('main.post.detail', $post->slug_title) }}">
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
                                            <a href="{{ route('main.post.detail', $post->slug_title) }}">{{ $post->title
                                                }}</a>
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

    <!-- Blog -->
    <section class="section-wrap">
        <div class="container">
            <div class="row">

                @forelse ($posts as $post)
                <div class="col-sm-6 col-md-4 mb-3">
                    <article class="entry">
                        <div class="entry__img-holder">
                            <a href="{{ route('main.post.detail', $post->slug_title) }}">
                                <img src="{{ $post->thumbnail ? $post->thumbnail->media_path : asset('images/thumbnail_16_9.png') }}"
                                    class="entry__img" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="entry__body">
                            <ul class="entry__meta">
                                <li class="entry__meta-date">
                                    <span>{{ $post->created_at->format('D d, M Y') }}</span>
                                </li>
                            </ul>
                            <h2 class="entry__title">
                                <a href="{{ route('main.post.detail', $post->slug_title) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <p class="entry__subject">{{ $post->subject }}</p>
                            <a href="{{ route('main.post.detail', $post->slug_title) }}" class="read-more">
                                <span class="read-more__text">Baca Selengkapnya</span>
                                <i class="ui-arrow-right read-more__icon"></i>
                            </a>
                        </div>
                    </article>
                </div>
                @empty

                @endforelse

            </div> <!-- end row -->

            <div class="row">
                <div class="col-12">
                    {{$posts->links('livewire::custom')}}
                </div>
            </div>
        </div>
    </section>

    @endif
</div>
