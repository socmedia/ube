<div>

    <div id="contact-info" class="bg-white">

        @if (request()->routeIs('main.index'))
        <div class="container">
            <div class="about-inline pb-5">
                <h3>— Hubungi kami </h3>
                <p>Punya pertanyaan yang masih belum terjawab ? Kirim pertanyaan anda melalui form dibawah.</p>
            </div>
        </div>
        @endif

        <div class="google-map">
            <div class="container-fluid no-padding">
                <div id="map">
                    {!! $maps !!}
                </div>
            </div>
        </div>

        <div class="container">
            @if (request()->routeIs('main.contact'))
            <div class="about-inline pb-5">
                <h3>— Punya pertanyaan yang masih belum terjawab ? Kirim pertanyaan
                    anda melalui form dibawah.</h3>
            </div>
            @else
            <div class="space50"></div>
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <h3>Lokasi</h3>
                    <p>{{$address}}</p>
                    <h3>Kontak</h3>
                    <ul class="contacts">
                        <li class="contact">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d)">
                                    <rect x="10" y="10" width="24" height="24" rx="9" fill="white" />
                                    <path
                                        d="M24.3406 24.9528L25.547 23.7464C25.7095 23.5859 25.9151 23.4761 26.1388 23.4302C26.3625 23.3843 26.5947 23.4043 26.8072 23.4879L28.2775 24.0749C28.4923 24.1621 28.6765 24.3109 28.8068 24.5026C28.9372 24.6943 29.0079 24.9203 29.01 25.1521V27.8449C29.0087 28.0026 28.9756 28.1584 28.9126 28.3029C28.8495 28.4475 28.7579 28.5778 28.6431 28.6859C28.5284 28.7941 28.393 28.878 28.245 28.9324C28.097 28.9869 27.9395 29.0108 27.7821 29.0028C17.4792 28.3619 15.4003 19.6371 15.0072 16.298C14.9889 16.134 15.0056 15.968 15.0561 15.811C15.1066 15.6539 15.1898 15.5093 15.3002 15.3867C15.4106 15.2641 15.5457 15.1662 15.6966 15.0996C15.8476 15.0329 16.0109 14.999 16.1759 15H18.7772C19.0093 15.0007 19.2359 15.0708 19.4279 15.2014C19.6198 15.3319 19.7683 15.5169 19.8543 15.7325L20.4413 17.2028C20.5277 17.4145 20.5497 17.6469 20.5047 17.871C20.4596 18.0952 20.3496 18.3011 20.1882 18.463L18.9818 19.6694C18.9818 19.6694 19.6766 24.3711 24.3406 24.9528Z"
                                        fill="#3F6745" />
                                </g>
                                <defs>
                                    <filter id="filter0_d" x="0" y="0" width="44" height="44"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="5" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                            <p><a href="tel:+{{ str_replace(' ', '', $phone_1) }}">{{ $phone_1 }}</a></p>
                        </li>
                        <li class="contact">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d)">
                                    <rect x="10" y="10" width="24" height="24" rx="9" fill="white" />
                                    <path
                                        d="M24.3406 24.9528L25.547 23.7464C25.7095 23.5859 25.9151 23.4761 26.1388 23.4302C26.3625 23.3843 26.5947 23.4043 26.8072 23.4879L28.2775 24.0749C28.4923 24.1621 28.6765 24.3109 28.8068 24.5026C28.9372 24.6943 29.0079 24.9203 29.01 25.1521V27.8449C29.0087 28.0026 28.9756 28.1584 28.9126 28.3029C28.8495 28.4475 28.7579 28.5778 28.6431 28.6859C28.5284 28.7941 28.393 28.878 28.245 28.9324C28.097 28.9869 27.9395 29.0108 27.7821 29.0028C17.4792 28.3619 15.4003 19.6371 15.0072 16.298C14.9889 16.134 15.0056 15.968 15.0561 15.811C15.1066 15.6539 15.1898 15.5093 15.3002 15.3867C15.4106 15.2641 15.5457 15.1662 15.6966 15.0996C15.8476 15.0329 16.0109 14.999 16.1759 15H18.7772C19.0093 15.0007 19.2359 15.0708 19.4279 15.2014C19.6198 15.3319 19.7683 15.5169 19.8543 15.7325L20.4413 17.2028C20.5277 17.4145 20.5497 17.6469 20.5047 17.871C20.4596 18.0952 20.3496 18.3011 20.1882 18.463L18.9818 19.6694C18.9818 19.6694 19.6766 24.3711 24.3406 24.9528Z"
                                        fill="#3F6745" />
                                </g>
                                <defs>
                                    <filter id="filter0_d" x="0" y="0" width="44" height="44"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="5" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                            <p><a href="tel:+{{ str_replace(' ', '', $phone_2) }}">{{ $phone_2 }}</a></p>
                        </li>
                        <li class="contact">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d)">
                                    <rect x="10" y="10" width="24" height="24" rx="9" fill="white" />
                                    <path
                                        d="M27.99 18.2377C25.8898 14.9999 21.6019 14.0373 18.2765 16.05C15.0387 18.0627 13.9886 22.4381 16.0888 25.676L16.2638 25.9385L15.5637 28.5638L18.189 27.8637L18.4515 28.0387C19.5892 28.6513 20.8143 29.0013 22.0394 29.0013C23.352 29.0013 24.6647 28.6513 25.8023 27.9512C29.0401 25.851 30.0027 21.5631 27.99 18.2377ZM26.1523 24.9759C25.8023 25.501 25.3647 25.851 24.7522 25.9385C24.4021 25.9385 23.9646 26.1135 22.2144 25.4134C20.7268 24.7134 19.5016 23.5758 18.6266 22.2631C18.1015 21.6506 17.839 20.863 17.7515 20.0754C17.7515 19.3753 18.014 18.7628 18.4515 18.3252C18.6266 18.1502 18.8016 18.0627 18.9766 18.0627H19.4141C19.5892 18.0627 19.7642 18.0627 19.8517 18.4127C20.0267 18.8503 20.4642 19.9004 20.4642 19.9879C20.5517 20.0754 20.5517 20.2504 20.4642 20.3379C20.5517 20.513 20.4642 20.688 20.3767 20.7755C20.2892 20.863 20.2017 21.038 20.1142 21.1255C19.9392 21.213 19.8517 21.388 19.9392 21.5631C20.2892 22.0881 20.7268 22.6132 21.1643 23.0507C21.6894 23.4883 22.2144 23.8383 22.827 24.1008C23.002 24.1883 23.177 24.1883 23.2645 24.0133C23.352 23.8383 23.7896 23.4007 23.9646 23.2257C24.1396 23.0507 24.2271 23.0507 24.4021 23.1382L25.8023 23.8383C25.9773 23.9258 26.1523 24.0133 26.2398 24.1008C26.3273 24.3633 26.3273 24.7134 26.1523 24.9759Z"
                                        fill="#3F6745" />
                                </g>
                                <defs>
                                    <filter id="filter0_d" x="0" y="0" width="44" height="44"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="5" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                            <p> <a href="https://wa.me/{{ str_replace(' ', '', $whatsapp) }}">{{ $whatsapp }}</a>
                            </p>
                        </li>
                        <li class="contact">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d)">
                                    <rect x="10" y="10" width="24" height="24" rx="9" fill="white" />
                                    <path
                                        d="M21.9981 19.6656C20.7128 19.6656 19.6638 20.7145 19.6638 21.9999C19.6638 23.2852 20.7128 24.3342 21.9981 24.3342C23.2835 24.3342 24.3324 23.2852 24.3324 21.9999C24.3324 20.7145 23.2835 19.6656 21.9981 19.6656ZM28.9992 21.9999C28.9992 21.0332 29.008 20.0754 28.9537 19.1105C28.8994 17.9897 28.6437 16.9951 27.8242 16.1755C27.0029 15.3543 26.01 15.1003 24.8893 15.0461C23.9226 14.9918 22.9648 15.0005 21.9999 15.0005C21.0332 15.0005 20.0754 14.9918 19.1105 15.0461C17.9897 15.1003 16.9951 15.356 16.1755 16.1755C15.3543 16.9968 15.1003 17.9897 15.0461 19.1105C14.9918 20.0771 15.0005 21.035 15.0005 21.9999C15.0005 22.9648 14.9918 23.9244 15.0461 24.8893C15.1003 26.01 15.356 27.0047 16.1755 27.8242C16.9968 28.6455 17.9897 28.8994 19.1105 28.9537C20.0771 29.008 21.035 28.9992 21.9999 28.9992C22.9665 28.9992 23.9244 29.008 24.8893 28.9537C26.01 28.8994 27.0047 28.6437 27.8242 27.8242C28.6455 27.0029 28.8994 26.01 28.9537 24.8893C29.0097 23.9244 28.9992 22.9665 28.9992 21.9999ZM21.9981 25.5915C20.0106 25.5915 18.4065 23.9874 18.4065 21.9999C18.4065 20.0123 20.0106 18.4083 21.9981 18.4083C23.9857 18.4083 25.5897 20.0123 25.5897 21.9999C25.5897 23.9874 23.9857 25.5915 21.9981 25.5915ZM25.7368 19.1C25.2728 19.1 24.898 18.7252 24.898 18.2612C24.898 17.7971 25.2728 17.4224 25.7368 17.4224C26.2009 17.4224 26.5756 17.7971 26.5756 18.2612C26.5758 18.3714 26.5542 18.4805 26.5121 18.5823C26.47 18.6842 26.4082 18.7767 26.3303 18.8546C26.2523 18.9325 26.1598 18.9943 26.058 19.0364C25.9562 19.0785 25.847 19.1001 25.7368 19.1Z"
                                        fill="#3F6745" />
                                </g>
                                <defs>
                                    <filter id="filter0_d" x="0" y="0" width="44" height="44"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="5" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                            <p><a href="{{ $instagram_url }}">{{ $instagram_account }}</a></p>
                        </li>
                        <li class="contact">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d)">
                                    <rect x="10" y="10" width="24" height="24" rx="9" fill="white" />
                                    <path
                                        d="M17.5563 15C16.1402 15 15 16.1402 15 17.5563V26.4437C15 27.8598 16.1402 29 17.5563 29H22.3732V23.5269H20.9259V21.5564H22.3732V19.8729C22.3732 18.5502 23.2283 17.3358 25.1981 17.3358C25.9957 17.3358 26.5854 17.4124 26.5854 17.4124L26.5391 19.2525C26.5391 19.2525 25.9376 19.2468 25.2813 19.2468C24.5709 19.2468 24.457 19.5741 24.457 20.1175V21.5564H26.5955L26.5023 23.5269H24.457V29H26.4437C27.8598 29 29 27.8598 29 26.4437V17.5563C29 16.1402 27.8598 15 26.4437 15H17.5563L17.5563 15Z"
                                        fill="#3F6745" />
                                </g>
                                <defs>
                                    <filter id="filter0_d" x="0" y="0" width="44" height="44"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="5" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                            <p><a href="{{ $facebook_url }}">{{ $facebook_account }}</a></p>
                        </li>
                        <li class="contact">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d)">
                                    <rect x="10" y="10" width="24" height="24" rx="9" fill="white" />
                                    <path
                                        d="M27.6 17H16.4C16.0287 17 15.6726 17.1475 15.4101 17.4101C15.1475 17.6726 15 18.0287 15 18.4V26.8C15 27.1713 15.1475 27.5274 15.4101 27.7899C15.6726 28.0525 16.0287 28.2 16.4 28.2H27.6C27.9713 28.2 28.3274 28.0525 28.5899 27.7899C28.8525 27.5274 29 27.1713 29 26.8V18.4C29 18.0287 28.8525 17.6726 28.5899 17.4101C28.3274 17.1475 27.9713 17 27.6 17ZM27.6 20.29L22 24.0238L16.4 20.29V18.6079L22 22.341L27.6 18.6079V20.29Z"
                                        fill="#3F6745" />
                                </g>
                                <defs>
                                    <filter id="filter0_d" x="0" y="0" width="44" height="44"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="5" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                            <p><a href="mailto:{{ $email }}">{{ $email }}</a></p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 mb-3">
                    @livewire('lead.form')
                </div>
            </div>
        </div>
    </div>
</div>