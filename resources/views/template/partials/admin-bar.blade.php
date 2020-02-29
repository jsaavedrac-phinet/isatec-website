<header class="extended">
	<div class="icono-menu">
        <i class="fas fa-caret-left"></i>
	</div>
	<div class="tabs {{ active('admin.index')}}">
		<div class="container-tabs">
			<a  class="active" href="{{ route('admin.index') }}">Dashboard</a>
			@yield('tab-parent')
			<a >@yield('title')</a>
		</div>
	</div>
	<div class="menu-user-container">
		<div class="avatar">
            <span> Hola, {{ Auth::user()->name }}&nbsp; </span>
            @if (Auth::user()->image !== null)
            <picture>
                <source srcset="{{asset('storage/images/'.Auth::user()->image->webp)}}" type="image/webp">
                <source srcset="{{asset('storage/images/'.Auth::user()->image->url)}}" type="image/{{ Auth::user()->image->extension }}" >
                <img src="{{asset('storage/images/'.Auth::user()->image->url)}}">
            </picture>
            @else
            <picture>
                <source srcset="{{asset('images/default.webp')}}" type="image/webp">
                <source srcset="{{asset('images/default.png')}}" type="image/png" >
                <img src="{{asset('images/default.png')}}">
            </picture>
            @endif

			<div class="show-menu-user">
                    <i class="fas fa-caret-down"></i>
			</div>
		</div>
		<div class="menu-user">
			<div class="menu-option">
				<a href="{{ route('admin.profile') }}">
					<div class="icono-menu-user">
                            <i class="fas fa-user-circle"></i>
					</div>
					<div class="title-option">
						Perfil
					</div>
				</a>
			</div>
			<div class="menu-option">
				<a href="{{ route('web.home') }}" target="_blank">
					<div class="icono-menu-user">
                            <i class="fas fa-globe"></i>
					</div>
					<div class="title-option">
						Ir a la Web
					</div>
				</a>
			</div>
			<div class="menu-option">
				<a class="btn-logout" href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> &nbsp;Cerrar Sesi&oacute;n</a>
			<form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">@csrf</form>
		</div>
	</div>
</div>
</header>
