<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{route('adm.index')}}" class="sidebar-brand">
            <img src="{{asset('images/logo.svg')}}" height="30" alt="Logo">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">

            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{request()->routeIs('adm.index') ? 'active' : '' }}">
                <a href="{{ route('adm.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Konten</li>

            <li class="nav-item {{ request()->routeIs('adm.banner.*') ? 'active' : '' }}">
                <a href="{{route('adm.banner.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Banner</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('adm.product.*') ? 'active' : '' }}">
                <a href="{{route('adm.product.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Apartemen</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('adm.review.*') ? 'active' : '' }}">
                <a href="{{route('adm.review.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="git-merge"></i>
                    <span class="link-title">Ulasan</span>
                </a>
            </li>

            <li class="nav-item nav-category">Postingan</li>

            <li class="nav-item {{ request()->routeIs('adm.post.project.*') ? 'active' : '' }}">
                <a href="{{route('adm.post.project.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="briefcase"></i>
                    <span class="link-title">Proyek</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('adm.post.blog.*') ? 'active' : '' }}">
                <a href="{{route('adm.post.blog.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Blog</span>
                </a>
            </li>

            <li class="nav-item nav-category">Pengaturan Postingan</li>

            <li class="nav-item {{ request()->routeIs('adm.post.type.*') ? 'active' : '' }}">
                <a href="{{route('adm.post.type.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="arrow-right"></i>
                    <span class="link-title">Jenis</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('adm.post.cetegory.*') ? 'active' : '' }}">
                <a href="{{route('adm.post.cetegory.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="arrow-right"></i>
                    <span class="link-title">Kategori</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('adm.post.status.*') ? 'active' : '' }}">
                <a href="{{route('adm.post.status.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="arrow-right"></i>
                    <span class="link-title">Status</span>
                </a>
            </li>


            <li class="nav-item nav-category">Lainnya</li>
            <li class="nav-item {{ request()->routeIs('adm.lead.*') ? 'active' : '' }}">
                <a href="{{route('adm.lead.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="bookmark"></i>
                    <span class="link-title">Lead</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
