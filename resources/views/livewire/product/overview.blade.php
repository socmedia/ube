<div id="properties" class="elements-content">
    <div class="container">
        <div class="about-inline">
            @if (request()->routeIs('main.index'))
            <h3>— Tipe Unit </h3>
            <p>Konsep apartemen yang menyatu dengan alam dengan
                hamparan sawah, sungai kecil mengalir, dan view gunung merapi.</p>
            @endif
            @if (request()->routeIs('main.apartment'))
            <h3>— Konsep apartemen yang menyatu dengan alam dengan
                hamparan sawah, sungai kecil mengalir, dan view gunung merapi.</h3>
            @endif
        </div>

        <div class="row">

            @if (request()->routeIs('main.index'))

            @foreach ($products as $product)
            <div class="col-md-3">
                <figure class="card card-product">
                    <div class="img-wrap">
                        <img src="{{asset($product->images->count() > 0 ? $product->images[0]->image_path : '')}}"
                            alt="{{$product->name}}" loading="lazy">
                    </div>
                    <div class="info-wrap">
                        <h4 class="title"><a href="{{route('main.apartment')}}">{{$product->name}}</a></h4>
                        <p class="desc">
                            @foreach (json_decode($product->spesification) as $i => $spesification)
                            {{ $spesification ? array_values(get_object_vars($spesification))[0] : ''}}
                            {{ !$loop->last ? ' | ' : ''}}
                            @endforeach
                        </p>
                    </div>
                </figure>
            </div>
            @endforeach

            @else

            @foreach ($products as $product)
            <div class="col-12 mb-5 {{ !$loop->last ? 'border-bottom' : ''}}">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <img class="img thumbnail"
                            src="{{asset($product->images->count() > 0 ? $product->images[0]->image_path : '')}}"
                            alt="{{$product->name}}" loading="lazy">
                        <div class="product-image">
                            @foreach ($product->images as $image)
                            <div>
                                <img class="img-target" src="{{url($image->image_path)}}" alt="{{$product->name}}"
                                    loading="lazy" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <figure class="card card-product large">
                            <div class="info-wrap">
                                <h4 class="title">{{$product->name}}</h4>
                                <p class="desc">
                                    @foreach (json_decode($product->spesification) as $i => $spesification)
                                <div class="badge badge-light">
                                    {{ $spesification ? array_values(get_object_vars($spesification))[0] : ''}}
                                </div>
                                @endforeach
                                </p>
                                <p class="desc">{{$product->description}}</p>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
            @endforeach


            @if ($products->count() <= 5) <div class="col-sm-6 mb-3 mb-md-0">
                <a class="btn btn-greenpark icon-right" href="{{url($catalogue)}}" target="_blank">
                    Unduh katalog
                    <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d)">
                            <rect x="10" y="10" width="24" height="24" rx="9" fill="white" />
                            <path
                                d="M23.75 25.5359H22.5922V21.75C22.5922 21.6813 22.5359 21.625 22.4672 21.625H21.5297C21.4609 21.625 21.4047 21.6813 21.4047 21.75V25.5359H20.25C20.1453 25.5359 20.0875 25.6562 20.1516 25.7375L21.9016 27.9516C21.9133 27.9665 21.9282 27.9786 21.9453 27.9869C21.9623 27.9952 21.981 27.9995 22 27.9995C22.019 27.9995 22.0377 27.9952 22.0547 27.9869C22.0718 27.9786 22.0867 27.9665 22.0984 27.9516L23.8484 25.7375C23.9125 25.6562 23.8547 25.5359 23.75 25.5359Z"
                                fill="#3F6745" />
                            <path
                                d="M26.6781 20.2297C25.9625 18.3422 24.1391 17 22.0031 17C19.8672 17 18.0438 18.3406 17.3281 20.2281C15.9891 20.5797 15 21.8 15 23.25C15 24.9766 16.3984 26.375 18.1234 26.375H18.75C18.8187 26.375 18.875 26.3188 18.875 26.25V25.3125C18.875 25.2437 18.8187 25.1875 18.75 25.1875H18.1234C17.5969 25.1875 17.1016 24.9781 16.7328 24.5984C16.3656 24.2203 16.1703 23.7109 16.1875 23.1828C16.2016 22.7703 16.3422 22.3828 16.5969 22.0563C16.8578 21.7234 17.2234 21.4812 17.6297 21.3734L18.2219 21.2188L18.4391 20.6469C18.5734 20.2906 18.7609 19.9578 18.9969 19.6562C19.2298 19.3574 19.5057 19.0946 19.8156 18.8766C20.4578 18.425 21.2141 18.1859 22.0031 18.1859C22.7922 18.1859 23.5484 18.425 24.1906 18.8766C24.5016 19.0953 24.7766 19.3578 25.0094 19.6562C25.2453 19.9578 25.4328 20.2922 25.5672 20.6469L25.7828 21.2172L26.3734 21.3734C27.2203 21.6016 27.8125 22.3719 27.8125 23.25C27.8125 23.7672 27.6109 24.2547 27.2453 24.6203C27.066 24.8007 26.8527 24.9437 26.6178 25.041C26.3828 25.1384 26.1309 25.1882 25.8766 25.1875H25.25C25.1812 25.1875 25.125 25.2437 25.125 25.3125V26.25C25.125 26.3188 25.1812 26.375 25.25 26.375H25.8766C27.6016 26.375 29 24.9766 29 23.25C29 21.8016 28.0141 20.5828 26.6781 20.2297Z"
                                fill="#3F6745" />
                        </g>
                        <defs>
                            <filter id="filter0_d" x="0" y="0" width="44" height="44" filterUnits="userSpaceOnUse"
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
        <div class="col-sm-6 mb-3 mb-md-0">
            {{$products->links('vendor.livewire.custom-2')}}
        </div>
        @else
        <div class="col-12 mb-3 mb-md-0">
            <a class="btn btn-greenpark icon-right" href="{{url($catalogue)}}" target="_blank">
                Unduh katalog
                <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_d)">
                        <rect x="10" y="10" width="24" height="24" rx="9" fill="white" />
                        <path
                            d="M23.75 25.5359H22.5922V21.75C22.5922 21.6813 22.5359 21.625 22.4672 21.625H21.5297C21.4609 21.625 21.4047 21.6813 21.4047 21.75V25.5359H20.25C20.1453 25.5359 20.0875 25.6562 20.1516 25.7375L21.9016 27.9516C21.9133 27.9665 21.9282 27.9786 21.9453 27.9869C21.9623 27.9952 21.981 27.9995 22 27.9995C22.019 27.9995 22.0377 27.9952 22.0547 27.9869C22.0718 27.9786 22.0867 27.9665 22.0984 27.9516L23.8484 25.7375C23.9125 25.6562 23.8547 25.5359 23.75 25.5359Z"
                            fill="#3F6745" />
                        <path
                            d="M26.6781 20.2297C25.9625 18.3422 24.1391 17 22.0031 17C19.8672 17 18.0438 18.3406 17.3281 20.2281C15.9891 20.5797 15 21.8 15 23.25C15 24.9766 16.3984 26.375 18.1234 26.375H18.75C18.8187 26.375 18.875 26.3188 18.875 26.25V25.3125C18.875 25.2437 18.8187 25.1875 18.75 25.1875H18.1234C17.5969 25.1875 17.1016 24.9781 16.7328 24.5984C16.3656 24.2203 16.1703 23.7109 16.1875 23.1828C16.2016 22.7703 16.3422 22.3828 16.5969 22.0563C16.8578 21.7234 17.2234 21.4812 17.6297 21.3734L18.2219 21.2188L18.4391 20.6469C18.5734 20.2906 18.7609 19.9578 18.9969 19.6562C19.2298 19.3574 19.5057 19.0946 19.8156 18.8766C20.4578 18.425 21.2141 18.1859 22.0031 18.1859C22.7922 18.1859 23.5484 18.425 24.1906 18.8766C24.5016 19.0953 24.7766 19.3578 25.0094 19.6562C25.2453 19.9578 25.4328 20.2922 25.5672 20.6469L25.7828 21.2172L26.3734 21.3734C27.2203 21.6016 27.8125 22.3719 27.8125 23.25C27.8125 23.7672 27.6109 24.2547 27.2453 24.6203C27.066 24.8007 26.8527 24.9437 26.6178 25.041C26.3828 25.1384 26.1309 25.1882 25.8766 25.1875H25.25C25.1812 25.1875 25.125 25.2437 25.125 25.3125V26.25C25.125 26.3188 25.1812 26.375 25.25 26.375H25.8766C27.6016 26.375 29 24.9766 29 23.25C29 21.8016 28.0141 20.5828 26.6781 20.2297Z"
                            fill="#3F6745" />
                    </g>
                    <defs>
                        <filter id="filter0_d" x="0" y="0" width="44" height="44" filterUnits="userSpaceOnUse"
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
        @endif

        @endif

    </div>
</div>

<div class="space100"></div>
</div>