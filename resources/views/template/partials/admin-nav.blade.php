<nav class="extended">
	<div class="app_name">
		<span>CMS</span>
		<span>CMS</span>
	</div>
	<ul>
		<li class="{{active('admin.index') }}">
			<a href="{{ route('admin.index') }}" >
				<div class="icono"><i class="fas fa-home"></i></div>
				<div class="nav-titulo">Inicio</div>
			</a>
        </li>
        <li class="{{active(route('admin.slider.index'))}}" >
			<a href="{{ route('admin.slider.index') }}" >
				<div class="icono"><i class="fas fa-images"></i></div>
				<div class="nav-titulo">Sliders Index</div>
			</a>
        </li>
        <li class="{{active(route('admin.staticSection.create', ['bienvenida-index','withOutImage']))}}" >
			<a href="{{ route('admin.staticSection.create', ['bienvenida-index','withOutImage']) }}">
				<div class="icono"><i class="fas fa-quote-right"></i></div>
				<div class="nav-titulo">Bienvenida Index</div>
			</a>
        </li>
        <li class=" nav-parent">
			<a >
				<div class="icono"><i class="fas fa-info-circle"></i></div>
				<div class="nav-titulo">Nosotros</div>
				<div class="icono right"><i class="fas fa-sort-down"></i></div>
			</a>
			<ol>
				<li>
					<a href="{{ route('admin.banner.create', 'nosotros') }}">
						<div class="icono"><i class="fas fa-image"></i></div>
						<div class="nav-titulo">Banner</div>
					</a>
                </li>
                <li>
                    <a href="{{ route('admin.staticSection.create', ['quienes-somos','withImage']) }}">
                        <div class="icono"><i class="fas fa-quote-right"></i></div>
                        <div class="nav-titulo">Qui&eacute;nes somos</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.staticSection.create', ['nuestra-historia','withImage']) }}">
                        <div class="icono"><i class="fas fa-quote-right"></i></div>
                        <div class="nav-titulo">Nuestra historia</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.staticSection.create', ['mision','withOutImage']) }}">
                        <div class="icono"><i class="fas fa-quote-right"></i></div>
                        <div class="nav-titulo">Misi&oacute;n</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.staticSection.create', ['vision','withOutImage']) }}">
                        <div class="icono"><i class="fas fa-quote-right"></i></div>
                        <div class="nav-titulo">Visi&oacute;n</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.section.index', ['valores','withImage','withOutContent']) }}">
                        <div class="icono"><i class="fas fa-list-alt"></i></div>
                        <div class="nav-titulo">Valores</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.section.index', ['reconocimientos','withImage','withOutContent']) }}">
                        <div class="icono"><i class="fas fa-list-alt"></i></div>
                        <div class="nav-titulo">Reconocimientos</div>
                    </a>
                </li>
			</ol>
        </li>
        <li>
            <a href="{{ route('admin.programs.index') }}">
                <div class="icono"><i class="fas fa-book"></i></div>
                <div class="nav-titulo">Programas</div>
            </a>
        </li>
        <li class=" nav-parent"  >
			<a >
				<div class="icono"><i class="fas fa-newspaper"></i></div>
				<div class="nav-titulo">Blog</div>
				<div class="icono right"><i class="fas fa-sort-down"></i></div>
			</a>
			<ol>
				<li>
					<a href="{{ route('admin.banner.create', 'blog') }}">
						<div class="icono"><i class="fas fa-image"></i></div>
						<div class="nav-titulo">Banner</div>
					</a>
                </li>
                <li>
                    <a href="{{ route('admin.post.index', ['publicaciones']) }}">
                        <div class="icono"><i class="fas fa-align-center"></i></div>
                        <div class="nav-titulo">Publicaciones</div>
                    </a>
                </li>
			</ol>
        </li>
        <li class=" nav-parent">
            <a >
				<div class="icono"><i class="fas fa-atlas"></i></div>
				<div class="nav-titulo">Biblioteca Virtual</div>
				<div class="icono right"><i class="fas fa-sort-down"></i></div>
            </a>
            <ol>
				<li>
					<a href="{{ route('admin.banner.create', 'biblioteca-virtual') }}">
						<div class="icono"><i class="fas fa-image"></i></div>
						<div class="nav-titulo">Banner</div>
					</a>
                </li>
                <li class="{{active(route('admin.staticSection.create', ['bienvenida-biblioteca-virtual','withOutImage']))}}" >
                    <a href="{{ route('admin.staticSection.create', ['bienvenida-biblioteca-virtual','withOutImage']) }}">
                        <div class="icono"><i class="fas fa-quote-right"></i></div>
                        <div class="nav-titulo">Bienvenida Biblioteca Virtual</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.virtual-book.index') }}">
                        <div class="icono"><i class="fas fa-book"></i></div>
                        <div class="nav-titulo">Libros Virtuales</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.book.index') }}">
                        <div class="icono"><i class="fas fa-book"></i></div>
                        <div class="nav-titulo">Libros F&iacute;sicos</div>
                    </a>
                </li>
			</ol>
        </li>
        <li class=" nav-parent"  >
			<a >
				<div class="icono"><i class="fas fa-id-card"></i></div>
				<div class="nav-titulo">Contactenos</div>
				<div class="icono right"><i class="fas fa-sort-down"></i></div>
			</a>
			<ol>
				<li>
					<a href="{{ route('admin.banner.create', 'contactenos') }}">
						<div class="icono"><i class="fas fa-image"></i></div>
						<div class="nav-titulo">Banner</div>
					</a>
				</li>
				<li>
					<a href="{{ route('admin.settings.index') }}">
						<div class="icono"><i class="fas fa-id-badge"></i></div>
						<div class="nav-titulo">Datos de Contacto</div>
					</a>
				</li>
			</ol>
        </li>
	</ul>
</nav>
