<header class="nav">
    <div class="nav__holder nav--sticky">
        <div class="container-fluid nav__container nav__container--side-padding">
            <div class="flex-parent">

                <div class="nav__header">
                    <!-- Logo -->
                    <a href="{{ route('main.index') }}" class="logo-container flex-child">
                        <img src="{{ asset('images/logo_text_500.jpg') }}" alt="logo">
                    </a>

                    <!-- Mobile toggle -->
                    <button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-toggle="collapse"
                        data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="nav__icon-toggle-bar"></span>
                        <span class="nav__icon-toggle-bar"></span>
                        <span class="nav__icon-toggle-bar"></span>
                    </button>
                </div>

                <!-- Navbar -->
                <nav id="navbar-collapse" class="nav__wrap collapse navbar-collapse">
                    <ul class="nav__menu">
                        <li class="nav__dropdown {{ activeClassByRoute('main.index') }}">
                            <a href="{{ route('main.index') }}" aria-haspopup="true">Beranda</a>
                        </li>
                        <li class="nav__dropdown {{ activeClassByRoute('main.about') }}">
                            <a href="{{ route('main.about') }}" aria-haspopup="true">Tentang Kami</a>
                        </li>
                        <li class="nav__dropdown">
                            <a href="{{ route('main.index') }}" aria-haspopup="true">Layanan</a>
                        </li>
                        <li class="nav__dropdown">
                            <a href="{{ route('main.index') }}" aria-haspopup="true">Proyek</a>
                        </li>
                        <li class="nav__dropdown {{ activeClassByRoute('main.post.*') }}">
                            <a href="{{ route('main.post.index') }}" aria-haspopup="true">Blog</a>
                        </li>
                    </ul> <!-- end menu -->
                    <div class="nav__phone nav__phone--mobile d-lg-none">
                        <span class="nav__phone-text">Hubungi Kami:</span>
                        <a href="tel:{{ $phone_1 }}" class="nav__phone-number">{{ $phone_1 }}</a>
                    </div>

                    <div class="nav__socials nav__socials--mobile d-lg-none">
                        <div class="socials">
                            <a href="{{ $facebook_url }}" class="social social-facebook" aria-label="facebook"
                                title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                            <a href="{{ $instagram_url }}" class="social social-instagram" aria-label="instagram"
                                title="instagram" target="_blank"><i class="ui-instagram"></i></a>
                        </div>
                    </div>
                </nav> <!-- end nav-wrap -->

                <div class="nav__phone nav--align-right d-none d-lg-block">
                    <span class="nav__phone-text">Hubungi Kami:</span>
                    <a href="tel:{{ $phone_1 }}" class="nav__phone-number">{{ $phone_1 }}</a>
                </div>

                <div class="nav__socials d-none d-lg-block">
                    <div class="socials">
                        <a href="{{ $facebook_url }}" class="social social-facebook" aria-label="facebook"
                            title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                        <a href="{{ $instagram_url }}" class="social social-instagram" aria-label="instagram"
                            title="instagram" target="_blank"><i class="ui-instagram"></i></a>
                    </div>
                </div>

            </div> <!-- end flex-parent -->
        </div> <!-- end container -->

    </div>
</header>
