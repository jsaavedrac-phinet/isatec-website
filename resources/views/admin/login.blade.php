<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Content Management System</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
	{{-- css critico --}}
	<style type="text/css" media="screen">
		*{margin:0; padding: 0; font-family: OpenSans, sans-serif;}
		:root{
			--login: #006634;
			--login_hover : green;
		}
		.content{display: flex; justify-content: space-between; width: 100%; height: 100%; min-height: 100vh;}
		.content .form-login{width: 100%; max-width: 450px;background: #FFF; display: flex;justify-content: center; align-items: center; position: relative;}
		.content .form-login:before{content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 0.3em; background: var(--login);}
		.content .form-login form{width: calc(100% - 2em); padding: 0 1em;}
		.content .form-login .form-group{width: 100%; padding:  0.5em 0; color: #444;}
		.content .form-login .form-title{letter-spacing: 2px; font-size: 0.8em;}
		.content .form-login .form-option{border:1px solid #cdcdcd; border-radius: 4px; margin-top: 1em; font-size: 0.8em;}
		.content .form-login .form-option label{width: calc(100% - 1em); padding: 0 0.5em;display: block; margin-bottom: 0.5em;}
		.content .form-login .form-option input{width: calc(100% - 2em); padding: 0 1em; border:none;}
		.content .form-login .form-button{margin-top: 1em;}
		.content .form-login .form-button button{border: none; background: var(--login); color: #FFF; padding:  1.2em 1em; border-radius: 6px;}
		.content .form-login .form-button button:hover{background: var(--login_hover);}
		@media(max-width: 767px){
			.content .form-login{max-width: 100%;}
			.content .bg-login{display: none;}
			.content .form-login:before{content: ""; position: absolute; top: 0; left: 0; width: 0.3em; height: 100%; background: var(--login);}
		}
	</style>
	<link rel="stylesheet" href="{{asset('/plugins/sweetalert2/sweetalert2.min.css')}}" media="none" onload="if(media!='all')media='all'">
		<noscript><link rel="stylesheet" href="{{asset('/plugins/sweetalert2/sweetalert2.min.css')}}"></noscript>
</head>
<body>
    @if ($navegador == 'Safari')
    <div class="content" style="background: url({{ asset('images/bg-login.jpg') }}); background-repeat: no-repeat; background-size: cover;"></div>
    @else
	<div class="content" style="background: url({{ asset('images/bg-login.jpg') }});background: url({{ asset('images/bg-login.webp') }}); background-repeat: no-repeat; background-size: cover;">
    @endif
		<div class="bg-login"></div>
		<div class="form-login">
			<form action="">
				<div class="form-group form-title">
					<span>INGRESAR : </span>
				</div>
				<div class="form-group form-option">
					<label for="user">Usuario</label>
					<input type="text" name="user" id="user" placeholder="Usuario" autofocus>
				</div>
				<div class="form-group form-option">
					<label for="password">Clave</label>
					<input type="password" name="password" id="password" placeholder="Clave">
				</div>
				<div class="form-group form-button">
					<button type="button" id="btn_ingresar">Iniciar Sesi&oacute;n</button>
				</div>
			</form>
		</div>
	</div>
	<script src="{{asset('/js/jquery.min.js')}}" ></script>
		<script>
		$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		error: function (x, status, error) {
		console.log("x",x);
		console.log("status",status);
		console.log("error",error);
		if (x.status == 413) {
		var error ="El archivo que intenta subir es demasiado grande";
		swal("Error",error,"error");
		}else{
		// swal("Error", "error:"+x.status,"error");
		console.log("ERROR",x.status) ;
		}

		}
		});
		</script>
		<script src="{{asset('/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
		<script src="{{asset('/js/admin/login.js')}}"></script>
</body>
</html>
