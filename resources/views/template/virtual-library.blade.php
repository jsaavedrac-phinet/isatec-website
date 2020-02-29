<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title> BIBLIOTECA VIRTUAL - @yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('storage/settings/icon.png') }}">
	{{-- CSS CRITICO --}}
	<style type="text/css">
	*{padding: 0; margin:0; font-family: 'Open Sans', sans-serif}
	/* body{background-color: #f9f9f9;} */
    body{background: url({{ asset('storage/settings/bg-lv.png')}});background: url({{ asset('storage/settings/bg-lv.webp')}});}
	:root{
		--principal : #006634;
		--btn-success :#2ecc71;
		--btn-danger:#fa2a00;
		--btn-primary:#22a7f0;

	}

	header{position: fixed; width: calc(100% - 2em); top: 0 ; left: 0;background: rgba(255,255,255,.8); padding: 1.2em 1em; display: flex; justify-content: space-between; align-items:center;height: calc(56.4px - 2.4em);box-shadow: 0 0 0 rgba(0,0,0,.08); color: var(--principal)}
	header:after{content: ""; width: calc(100% - 2em); bottom: 0px;right: 1em; height: 1px; background: #cfcfcf; position: absolute;}

    header .menu-list a{border:2px solid var(--principal); padding: 5px 7px; border-radius: 6px;}
    header .menu-list a.active{background: var(--principal); color: #fff; font-weight: bold;}
	header .menu-user-container{position: relative;}
	header .menu-user-container .avatar{overflow: hidden;height: 40px; margin-right: 1em; display: flex; justify-content: flex-end; align-items: center;}
	header .menu-user-container .avatar picture{ height: 30px; width: 30px; border-radius: 50%;}
	header .menu-user-container .avatar picture img{border-radius:50%; width: 100%; height: 100%; max-width: 30px; max-height: 30px;}
	header .menu-user-container .menu-user{position: absolute; top: calc(100% + 1em); right: 0; height: auto; width: calc(var(--ancho-menu-user) - 2em); padding:  1em; border-radius: 6px; background: #FFF; box-shadow: 0 0 4px 0 rgba(0,0,0,.25); opacity: 0;transition: opacity .5s,-webkit-transform .5s;transition: opacity .5s,transform .5s;transition: opacity .5s,transform .5s,-webkit-transform .5s;    transition-timing-function: ease, ease, ease;}
	header.extended .menu-user-container .menu-user{width: calc(var(--ancho_full) - 2em); }
	header .menu-user-container .menu-user.extended{opacity: 1;}
	header .menu-user-container .menu-user .menu-option{ margin-bottom: 1em; width: 100%;}
	header .menu-user-container .menu-user .menu-option:last-child{margin-bottom: 0px;}
	header .menu-user-container .menu-user .menu-option a{display: flex; text-decoration: none; width: 100%; color: #777; transition: color .3s ease;}
	header .menu-user-container .menu-user .menu-option a:hover{color: #333;}
	header .menu-user-container .menu-user .menu-option a.btn-logout:hover{color: #cfc;}
	header .menu-user-container .menu-user .menu-option a .title-option{margin-left: 1em;}
	header .menu-user-container .menu-user .menu-option .btn-logout{background: var(--principal); color: #FFF; text-align: center; padding:  0.5em 1em; border-radius: 6px; width: calc(100% - 2em);}
	.contenedor{padding-top: 54.6px; padding-left: calc(var(--ancho-menu) + 1em); padding-right: 1em; width: calc(100% - 2em - var(--ancho-menu)); min-height: calc(100vh - 112px);}
	.contenedor.extended{padding-left: calc(var(--ancho_full) + 1em);width: calc(100% - 2em - var(--ancho_full));}
	.contenedor .contenido{width: 100%; min-height: calc(100vh - 112px);}
	.contenedor footer{width: calc(100% - 2em);padding: 0 1em;  height: 45px; display: flex; justify-content: flex-end; align-items: center;}

    .banner{ height: 350px; display: flex; justify-content: center; align-items: center; color: #FFF; background-repeat: no-repeat !important;        background-position: center !important; background-size: cover !important;}
    .banner *{color: inherit;}
    .banner div{background: rgba(0,0,0,.6); padding: 1em; font-size: 2em; font-weight: bold; letter-spacing: 0.3em;}
	/* critico para celular*/
	@media (max-width: 767px){
		.contenedor.extended{padding-top: 54.6px; padding-left: calc(var(--ancho-menu) + 1em); padding-right: 1em; width: calc(100% - 2em - var(--ancho-menu)); min-height: calc(100vh - 112px);}

	}
	</style>
	<link href="{{ asset('/plugins/fontawesome-free-5.11.2-web/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{ asset('/plugins/fontawesome-free-5.11.2-web/css/brands.css')}}" rel="stylesheet">
    <link href="{{ asset('/plugins/fontawesome-free-5.11.2-web/css/solid.css')}}" rel="stylesheet">
	@yield('css')
</head>
<body>
    @include('template.partials.vl-bar')
    @if ($banner != null)
    <div class="banner"
        style="background: url({{ asset('storage/images/'.$banner->image->url)}});background: url({{ asset('storage/images/'.$banner->image->webp)}})">
        <div>{!! $banner->content!!}</div>
    </div>
    @endif
	<div class="contenedor extended">
		<div class="contenido">
		@yield('content')
		</div>
    </div>
    <script type="text/javascript" src="{{ asset('plugins/lazyload/lazyload.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/carga_diferida.js') }}"></script>
    @yield('archivojs')
</body>
</html>
