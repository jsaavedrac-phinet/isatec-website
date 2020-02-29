<header id="header" class="web">
    @include('template.partials.nav-bar')
    <div class="header">
        <div class="logo">
            <div class="imagen">
                <a href="{{ route('web.home') }}">
                    <picture>
                        <source class="lazy" data-src="{{ asset('images/logo-original.webp') }}" type="image/webp">
                        <img class="lazy" data-src="{{ asset('images/logo-original.png') }}" alt="logo-isatec">
                    </picture>
                </a>
            </div>
        </div>
        <div class="menu">
            <div class="menu_nav">
                @include('template.partials.menu')
            </div>
            <div class="menu_vert">
                @include('template.partials.vertical-menu')
            </div>
        </div>
    </div>
</header>
<header id="header" class="mobile">
    @include('template.partials.nav-bar')
    <div class="logo">
        <div class="imagen">
            <a href="{{ route('web.home') }}">
                <picture>
                    <source class="lazy" data-src="{{ asset('images/logo-original.webp') }}" type="image/webp">
                    <img class="lazy" data-src="{{ asset('images/logo-original.png') }}" alt="logo-isatec">
                </picture>
            </a>
        </div>
    </div>
    <div class="menu">
        <div class="menu_nav">
            <div class="btn_menu"><i class="fas fa-bars"></i></div>
            <div class="menu-mobile">
                <div class="btn-aux">
                    <div class="btn-cerrar">x</div>
                    @include('template.partials.menu')
                    @include('template.partials.vertical-menu')
                </div>
            </div>
        </div>

    </div>
</header>
