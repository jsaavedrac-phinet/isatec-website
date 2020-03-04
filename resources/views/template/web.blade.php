<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title> ISATEC - @yield('title')</title>
		<meta name="description" content="Cooperativa INPROCAFE">
		<meta property="og:title" content="@yield('og_title',' > Inprocafe')" />
		<meta property="og:description" content='@yield('og_description','')' />
		<meta property="og:type" content="website" />
		<meta property="og:image:url"  content="@yield('og_image',asset('images/pfb.jpg'))" />
		<meta property="og:image:width" content="650" />
		<meta property="og:image:height" content="315" />

		<link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
		{{-- CSS CRITICO --}}
        <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i,900,900i&display=swap');
		*{padding: 0; margin:0; font-family: 'Roboto', sans-serif; word-break: break-word;}
		:root{
            --main_color: #134ecc;
			--secondary_color : #00008b;
            --highlight_color : #bbbbbb;
            --content-bg: #eaeaea;
            --negrito: #343434;
            --celeste:#008b6f;
            --height-header: 152px;
		}
		body{padding-top: var(--height-header); overflow-x:hidden;}
		header{width: calc(100%);height: var(--height-header); display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; position: fixed; top: 0; left: 0;background: #f2f0fe; z-index: 999;-webkit-box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.55);-webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);-moz-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);-ms-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);}
        header .nav-bar{width: calc(100% - 5vw); padding: 0 2.5vw; font-size: 1.5em; display: flex; justify-content: flex-end; background: #020094; align-items: center; height: 40px;}
        header .nav-bar .social{color: #FFF;}
        header .nav-bar .social a{color: inherit; text-decoration: none; cursor: pointer;}
        header .nav-bar .locales .locale{position: relative; cursor: pointer;color:#FFF;font-size: 0.8em;font-weight: 900;}
        header .nav-bar .locales .locale.active{text-decoration: underline; cursor: default;}
        header .nav-bar .locales .locale:nth-of-type(n+2){margin-left: 0.5em;}
        header .nav-bar .locales .locale:nth-of-type(n+2)::before{content:"/"; position: absolute; top: 0; left: -0.5em;}
        header .header{width: calc(100% - 5vw); padding: 0 2.5vw; height: 112px; display: flex; justify-content: space-between; align-items: center;}
        header .logo{display: flex; justify-content: center; align-items: center; height: 100%; width: 14.3%; max-width: 365px;}
		header .logo .imagen{width: auto; height: auto;background: #f2f0fe;border-top-left-radius: 70% 55%;border-top-right-radius: 70% 55%;padding: 0.8em 1em 0 1em;position: relative;top: -18px;}
		header .logo .imagen picture img{max-height: 120px; height: auto; width: 100%; max-width: 365px;}
		header .logo .brand{padding:  1em; font-size: 1.5em; text-align: center;}
		header .logo .brand strong{color: var(--secondary_color)}
		header .logo .brand span{font-size: 0.8em;}
		header .menu{height: 100%; width: auto; display: flex; justify-content: space-between}
		header .menu .menu_nav{height: 100%; width: auto;}
		header .menu .menu_nav ul{display: flex; justify-content: flex-end; align-items: center; width: 100%; height: 100%;}
		header .menu .menu_nav ul li{list-style: none; letter-spacing: 1px; padding:  1em 0.3em; margin: 0 0.3em; position: relative}
		header .menu .menu_nav ul li a{position: relative; white-space: pre; font-size: calc(10px + 0.3vw); font-weight: bold; text-decoration: none; cursor: pointer; color: gray; text-transform: uppercase;-webkit-transition: all 300ms linear 0ms;-moz-transition: all 300ms linear 0ms;-ms-transition: all 300ms linear 0ms;transition: all 300ms linear 0ms; color: #343339}
		header .menu .menu_nav ul li a:before{content:""; position: absolute; top: -10px; left:0; width: 0; height: 3px; background: var(--secondary_color);-webkit-transition: all 200ms linear 0ms;-moz-transition: all 200ms linear 0ms;-ms-transition: all 200ms linear 0ms;transition: all 200ms linear 0ms;}
		header .menu .menu_nav ul li a.active{color: var(--secondary_color); position: relative;}
		header .menu .menu_nav ul li a.active:before{content: ""; position: absolute; top: -10px; left: 0; width: 10px; height: 3px; background: var(--secondary_color)}
		header .menu .menu_nav ul li:hover a{color: var(--secondary_color)}
		header .menu .menu_nav ul li:hover a:before{content:""; position: absolute; top: -10px; left:0; width: 10px; height: 3px; background: var(--secondary_color);}
        header .menu .menu_nav ul li ol{position: absolute;display: none; top: 100%; left: 0;background: #FFF;}
        header .menu .menu_nav ul li ol li a{ color: gray !important;-webkit-transition: all 200ms linear 0ms !important;-moz-transition: all 200ms linear 0ms !important;-ms-transition: all 200ms linear 0ms !important;transition: all 200ms linear 0ms !important;  }
        header .menu .menu_nav ul li ol li a:before{ content:none !important;}
        header .menu .menu_nav ul li ol li:hover a{color: var(--secondary_color) !important; text-decoration: underline; }

        header .menu .menu_nav ul li:hover ol{display: initial}
        header .menu .menu_vert ul{padding: 0 1em; height: 100%; display: flex; flex-direction: column; justify-content: space-evenly;}
        header .menu .menu_vert ul li{list-style: none; }
        header .menu .menu_vert ul li a{text-decoration: none;padding: 0px 7px; font-size: 0.8em; font-weight: bold; display: block; width: 100%; text-align: center; background: #343434; color: #FFF; height: 30px; line-height: 30px;}

		.contenedor{min-height: calc(100vh - 130px);width: 100%;}
        .sponsors{ display: flex; justify-content: space-evenly; overflow: hidden; background: #FFF; border-top: 2px solid var(--main_color)}
        .sponsor{box-shadow: 1px 1px 1px 1px rgba(0,0,0,.5); display: flex; justify-content: center; align-items: center; padding:1em;max-height: 150px; max-width: 150px;}
        .sponsors img{width: auto; height: auto; max-width: 95%; max-height: 95%; }
        footer{background: #262626; display: flex; justify-content: space-evenly; flex-wrap: wrap;}
        footer .settings-box .logo-footer{width: calc(100% - 2em); padding: 1em; display: flex; max-width: calc(660px - 2em); height: auto; justify-content: space-between;}
        footer .settings-box .logo-footer .data-logo{width: calc(100% - 2em); max-width: calc(200px - 2em); padding: 1em;}
        footer .settings-box .logo-footer .data-logo .image{width: 100%; height: auto; text-align: right;}
        footer .settings-box .logo-footer .data-logo .image img{height: auto; width: 100%;}
        footer .settings-box .logo-footer .data-logo .year{text-align: right; color: #cacaca; font-size: 1.5em;}
        footer .settings-box .logo-footer .data-contact{width: calc(100% - 2em); max-width: calc(380px - 2em); padding: 1em; font-size: calc(10px + 0.33vw); display: flex; align-items: center; color: #cacaca;}
        footer .settings-box .menu-footer{width: calc(100% - 2em); max-width: calc(350px - 2em); padding:  0 1em; border: 2px solid #cacaca; border-top: none; border-bottom: none; display: flex; justify-content: center;}
        footer .settings-box .menu-footer ul{height: 100%; width: auto; display: flex; flex-direction: column; justify-content: space-evenly;}
        footer .settings-box .menu-footer li{list-style: none; color: #caca}
        footer .settings-box .menu-footer li a{color: #cacaca; text-decoration: none;}
        footer .settings-box .contact-us{width: calc(100% - 2em); max-width: calc(300px - 2em); padding:  0 1em; display: flex; justify-content: center; align-items: center;}
        footer .settings-box .contact-us .social-networks{display: flex; width: 100%; justify-content: center; font-size: 1.5em;}
        footer .settings-box .contact-us .social-networks *{color: #cacaca;}
        footer .settings-box .contact-us .social-networks i{margin: 0 0.5em;}
        footer .settings-box .contact-us .website{text-align: center; margin: 1em 0; color: #cacaca; font-size: 1.5em;}
        footer .settings-box{ display: flex; flex-wrap: wrap; justify-content: space-evenly; width: calc(100% - 2em); padding: 1em;}
        footer .settings-box h3{color: #cacaca; font-weight: 900; letter-spacing: 5px; font-size: 1.5em; margin-bottom: 1em; text-align: center;}
        footer .settings-box li.subtitle a{ color: #cacaca; letter-spacing: 2px; font-size: 1.2em; text-decoration: none; text-transform: uppercase}
        footer .settings-box li.subtitle::before{content:none}
        footer .settings-box .menu-footer .submenus{ display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-start; width: 100%;}


		footer .box{width: calc(100% - 2em); padding:  1em 1em; max-width: calc(310px - 2em);}
		footer .contactanos{width: calc(100% - 2em); padding:  1em 1em; max-width: calc(350px - 2em);}
		footer .mapa-sitio{width: calc(100% - 2em); padding:  1em 1em; max-width: calc(250px - 2em);}
		footer .mapa-sitio li:before{content: "\e900"; font-family: 'webgamonal' !important; speak: none;font-style: normal;font-weight: normal;font-variant: normal;text-transform: none;line-height: 1;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;}
		footer .fullbox{width: calc(100% - 2em); padding:  1em 1em; text-align: center;color: rgba(255, 255, 255, 0.5); -webkit-box-shadow: inset 0px 1px 0px 0px rgba(255, 255, 255, 0.13);-moz-box-shadow: inset 0px 1px 0px 0px rgba(255, 255, 255, 0.13);-o-box-shadow: inset 0px 1px 0px 0px rgba(255, 255, 255, 0.13);box-shadow: inset 0px 1px 0px 0px rgba(255, 255, 255, 0.13); background: #111;}
		footer .fullbox a{color: #FFF; text-decoration: underline; cursor: pointer;}
		footer .box h3{color: #FFF; text-align: left; cursor: default; width: 100%; letter-spacing: 4px;}
		footer .box ul{width: auto; padding: 1em 0em; width: calc(100%); overflow: hidden;}
		footer .box ul li{list-style: none; letter-spacing: 2px;color: rgba(255, 255, 255, 0.5); font-size: 0.8em;}
		footer .box ul li:nth-of-type(n+2){margin-top: 0.5em;}
		footer .box ul li a {color: rgba(255, 255, 255, 0.5); text-decoration: none;}
		footer .box ul li a.active{color: #FFF; text-decoration: underline;}
		.mobile{display: none}
		.btn_menu{font-size: 1.3em; background: var(--secondary_color); color: #FFF; padding: 0.5em; border-radius: 50%; cursor: pointer;}
		header.mobile{height: 75px;}
		header.mobile .nav-bar{height: 18px;}
		header.mobile .menu, header.mobile .logo{height: calc(100% - 18px); padding: 0 1em;}
        header.mobile .logo{width: 45%;}
        header.mobile .menu .menu_nav ul {max-height: calc(100vh - 2em); overflow-x: hidden; overflow-y: auto;}
        header.mobile .menu .menu_nav ul li{flex-wrap: wrap;}
        header.mobile .menu .menu_nav ul li ol{display: none;background: rgba(255,255,255,.5);border-top: 1px solid;margin-top: 1em;}
        header.mobile .menu .menu_nav ul li a.active{text-shadow: 2px 2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff, -2px -2px 0 #fff, 2px 0px 0 #fff, 0px 2px 0 #fff, -2px 0px 0 #fff, 0px -2px 0 #fff;}
        header.mobile .menu .menu_nav ul li.active ol{position: initial; width: 100%;display: initial}
        header.mobile .menu .menu_nav ul li ol li a{color: #111 !important;}
		header.mobile .logo img{max-height: 55px; max-width: 55px;}
		header.mobile .menu_contact{height: 1em; display: none}
		header.mobile .menu_nav{height: 100%;display: flex;justify-content: center;align-items: center;}
		header.mobile .logo .brand{display: none;}
		header.mobile .menu{max-width: calc(100% - 70px);}
		.menu-mobile{display: none;width: calc(100% - 2em) !important;padding: 0 1em !important;position: fixed;top: 0;left: 0;width: 100%;height: 100vh;background: rgba(0,0,0,.9);flex-wrap: wrap;align-items: center;justify-content: center;}
		.menu-mobile .btn-aux{position: relative;}
		.menu-mobile .btn-aux .btn-cerrar{position: absolute;top: -20px;right: 0;color: #FFF;cursor: pointer;}
		.menu-mobile .btn-aux ul{width: 100% !important;display: flex !important;flex-wrap: wrap;justify-content: center !important;align-items: flex-start !important;}
		.menu-mobile .btn-aux ul li{width: 100% !important;border-bottom: 2px solid #FFF; display: flex; justify-content: center; align-items: center; color: #FFF;}
		.menu-mobile .btn-aux ul li a{color: #FFF !important; font-size: 1.2em !important;}
		.menu-mobile .btn-aux ul li a.active{color: var(--secondary_color) !important;}
		.menu-mobile .btn-aux ul li a:hover{color: var(--secondary_color) !important;}
		.menu-mobile .btn-aux ul li a:before{display: none}

        .titulo{position:relative; margin-bottom: 1em;}
        .titulo::before{content:"";position:absolute; top: calc(100% + 5px); left: 0; height: 8px; width: 35%; background: var(--main_color)}
        .titulo.center::before{content:"";position:absolute; top: calc(100% + 5px); left: 33%; height: 8px; width: 35%; background: var(--main_color)}
        .banner{ height: 250px; display: flex; justify-content: center; align-items: center; color: #FFF; background-repeat: no-repeat !important;        background-position: center !important; background-size: cover !important;}
        .banner *{color: inherit;}
        .banner div{background: rgba(0,0,0,.7); padding:  1em; font-size: 1.4em;}
		@media(max-width:  1023px){
           header.mobile .logo img{max-height: 60px !important; max-width: 80px !important;}
           header .logo .imagen{top: 0px !important; border:none !important; padding: 0 !important;}
		body{padding-top: 75px;}
		.web{display: none;}
		.mobile{display: flex;}
        .contact-us{margin-top: 2em;}
        footer .settings-box .menu-footer .submenu-footer{ margin-top: 1em;}
        header .menu .menu_nav ul li a{text-align: center; display: block; width: 100%; height: 100%;}
		}
		@media (max-width: 767px){
		footer .box{width: calc(100% - 3em) !important; max-width: calc(100% - 2em); padding: 1em 1.5em; }
        .slides{height: 180px !important;}
        .slides .slide .text{font-size: calc(12px + 0.5em) !important;}
        .slides .arrow span{padding: 0 0.3em !important;}
		}
        </style>
        <link href="{{ asset('/plugins/fontawesome-free-5.11.2-web/css/fontawesome.css')}}" rel="stylesheet">
        <link href="{{ asset('/plugins/fontawesome-free-5.11.2-web/css/brands.css')}}" rel="stylesheet">
        <link href="{{ asset('/plugins/fontawesome-free-5.11.2-web/css/solid.css')}}" rel="stylesheet">
        @yield('css')
        @if ($facebook !== null && $facebook->value != '')
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=111467216199814&autoLogAppEvents=1"></script>
        @endif
	</head>
	<body>
		<div class="btn_arriba" style="display: none;">
			<i class="fas fa-chevron-up"></i>
		</div>
		@include('template.partials.nav')
		<div class="contenedor">
            @if (isset($banner))
                @if ($banner != null)
                @if ($navegador == "Safari")
                    <div class="banner {{ str_replace('.png','',$banner->style) }}" style="background: url({{ asset('storage/images/'.$banner->image->url)}});">
                @else
                    <div class="banner {{ str_replace('.png','',$banner->style) }}" style="background: url({{ asset('storage/images/'.$banner->image->url)}});background: url({{ asset('storage/images/'.$banner->image->webp)}})">

                @endif
                <div>{!! $banner->content!!}</div>
                </div>
                @endif
            @endif
			@yield('content')
		</div>

		@include('template.partials.footer')

		@include('template.partials.js')
	</body>
</html>
