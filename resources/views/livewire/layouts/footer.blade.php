<footer class="footer bg-dark-overlay" style="background-image: url(img/footer/1.jpg);">
    <div class="container-fluid">
        <div class="footer__widgets">
            <div class="row">

                <div class="col-md-3">
                    <div class="widget widget-about-us">
                        <!-- Logo -->
                        <a href="{{ route('adm.index') }}" class="logo-container flex-child">
                            <img src="{{ asset('images/logo_without_bg.png') }}" width="120" alt="logo">
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-uppercase text-light">Datang Ke PRO-SHOP Kami</h2>
                    <p><strong class="text-light">Kantor: </strong> <br> {{ $address }}</p>
                    <p><strong class="text-light">Showroom: </strong> <br> {{ $showroom }}</p>
                    <p><strong class="text-light">Jam Operasional</strong></p>
                    <table>
                        <tbody>
                            <tr>
                                <td class="pl-0 pb-2 pr-2">Senin-Jumat</td>
                                <td class="p-2">:</td>
                                <td class="p-2">08.00 - 16.00</td>
                            </tr>
                            <tr>
                                <td class="pl-0 py-2 pr-2">Sabtu</td>
                                <td class="p-2">:</td>
                                <td class="p-2">08.00 - 13.00</td>
                            </tr>
                            <tr>
                                <td class="pl-0 py-2 pr-2">Minggu</td>
                                <td class="p-2">:</td>
                                <td class="p-2">Tutup</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> <!-- end container -->

    <div class="footer__bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="widget">
                        <div class="socials text-center text-md-left">
                            <a style="margin-right: .5rem; margin-bottom: .5rem" class="nav__phone-number"
                                href="{{ route('main.about') }}">Tentang Kami</a>
                            <a style="margin-right: .5rem; margin-bottom: .5rem" class="nav__phone-number"
                                href="javascript:void(0)">Layanan</a>
                            <a style="margin-right: .5rem; margin-bottom: .5rem" class="nav__phone-number"
                                href="javascript:void(0)">Proyek</a>
                            <a class="nav__phone-number" href="{{ route('main.post.index') }}">Blog</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <span class="copyright">
                        <p>Copyright &copy; 2022 PT. Utama Bintang Erkonpersada - DAIKIN PRO-SHOP.</p>
                        <div class="widget">
                            <div class="socials">
                                <a href="{{ $facebook_url }}" class="social social-facebook" aria-label="facebook"
                                    title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                                <a href="{{ $instagram_url }}" class="social social-instagram" aria-label="instagram"
                                    title="instagram" target="_blank"><i class="ui-instagram"></i></a>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div> <!-- end footer bottom -->
</footer>
