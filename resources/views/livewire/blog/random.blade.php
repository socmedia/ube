<section class="related-posts">
    <h5 class="h3 mb-24 text-center">Blog lainnya</h5>
    <div class="row">

        @forelse ($posts as $post)
        <div class="col-lg-4 col-md-6 mb-3">
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
    </div>
</section>
