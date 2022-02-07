<div>
    @if (request()->routeIs('main.index'))
    <div class="container">
        <div class="about-inline pb-5">
            <h3>— FAQ </h3>
            <p>Ini yang biasa mereka tanyakan sebelum membeli apartemen di Greenpark Jogja Apartment.</p>
        </div>
        <div class="row">
            <div class="col-12">
                @foreach ($faqs as $faq)
                <div class="faq">
                    <div class="faq__item">
                        <h2 class="faq__title {{$loop->first ? 'active' : ''}}">{{$faq->question}}</h2>
                        <div class="faq__body">
                            <p>{{$faq->answer}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if (request()->routeIs('main.faq'))
    <div class="container">
        <div class="about-inline pb-5">
            <h3>— Ini yang biasa mereka tanyakan sebelum membeli apartemen di Greenpark Jogja Apartment.</h3>
        </div>
        <div class="row">
            <div class="col-12">
                @foreach ($faqs as $faq)
                <div class="faq">
                    <div class="faq__item">
                        <h2 class="faq__title {{$loop->first ? 'active' : ''}}">{{$faq->question}}</h2>
                        <div class="faq__body">
                            <p>{{$faq->answer}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-12">
                <a class="btn btn-greenpark icon-right" href="{{route('main.contact')}}">
                    Punya pertanyaan lain ?
                    <svg viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d)">
                            <rect x="10" y="10" width="29" height="29" rx="9" fill="white" />
                            <path d="M23 30L28 25L23 20" stroke="#3F6745" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                        <defs>
                            <filter id="filter0_d" x="0" y="0" width="49" height="49" filterUnits="userSpaceOnUse"
                                color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                <feOffset />
                                <feGaussianBlur stdDeviation="5" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </a>

            </div>
        </div>
    </div>
    <div class="space70"></div>
    @endif
</div>