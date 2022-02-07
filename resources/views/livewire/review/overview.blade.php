<section class="section-wrap bg-dark-overlay" style="background-image: url(img/testimonials/bg.jpg);">
    <div class="container">
        <div class="title-row text-center">
            <p class="subtitle">Testimoni</p>
            <h2 class="section-title">Ini pendapat mereka tentang kami.</h2>
            <i class="quote">“</i>
        </div>

        <div class="slick-slider slick-testimonials">

            @foreach ($reviews as $review)
            <div class="testimonial clearfix">
                <div class="testimonial__body">
                    <p class="testimonial__text">{{ $review->review }}</p>
                </div>
                <div class="testimonial__info">
                    @php
                    $explode = explode('-', $review->name);
                    @endphp
                    @foreach ($explode as $name)
                    <span class="{{ $loop->first ? 'testimonial__author' : 'testimonial__company'}}">{{ $name }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>