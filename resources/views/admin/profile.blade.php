@extends('template.admin')
@section('title','Perfil')
@section('css')
<style type="text/css">
	.header-content{display: flex; padding:  1em 0; font-size: 1.5em; align-items: flex-end; }
	.header-content .icon-content{margin-right: 0.5em;font-size: 1.4em;}
	.header-content .title-content{letter-spacing: 1px;}
	.body-content{width: 100%; height: auto;}
	.body-content form{display: flex; flex-wrap: wrap; justify-content: space-evenly; align-items: flex-start;}
	.body-content .user-bg{background: #FFF; border-radius: 4px;box-shadow: 0 2px 10px rgba(0,0,0,.05); height: 300px; padding-bottom: 0 !important;}
	.body-content .user-data{width: calc(100% - 2em); max-width: calc(600px - 2em); padding: 2em 1em;}
	.body-content .user-image{width: calc(100% - 2em); max-width: calc(400px - 2em); padding:2em  1em;}
	.body-content .user-btn{width: calc(100% - 4em); padding: 1em 2em; display: flex; justify-content: center; align-items: center;}
	.body-content .user-btn button{border: none; background: var(--principal);  color: #FFF; padding: 0.5em 1em; border-radius: 4px;}
	.body-content .data-option{width: 100%; display: flex; flex-wrap: wrap; margin-bottom: 1em;}
	.body-content .data-option label{width: 100%; color: #555;margin: 0.5em 0; }
	.body-content .data-option span{color: #777; font-size: 0.8em; margin-bottom: 0.5em;}
	.body-content .data-option input{width: calc(100% - 2em); padding: 0.5em 1em; border-radius: 4px; border: 1px solid var(--principal);}

	.body-content .data-option .avatar{width: 100%; height: 200px;}
	.body-content .data-option .avatar picture{width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; border: 1px solid var(--principal);}
	.body-content .data-option .avatar img{width: auto; height: auto; max-width: 150px; max-height: 150px;}
	.body-content .form{background: #FFF; border-radius: 4px;box-shadow: 0 2px 10px rgba(0,0,0,.05); height: auto; padding-bottom: 0 !important; width: calc(100% - 2em); padding:  1em;}
</style>
@endsection
@section('content')
<div class="header-content">
	<div class="icon-content"><span class="icon-user-circle"></span></div>
	<div class="title-content">Editar Perfil</div>
</div>
<div class="body-content">
	<form id="edit-profile" >
		<div class="user-data user-bg">
			<div class="data-option">
				<label for="name">Nombre</label>
				<input type="text" name="name" value="{{ Auth::user()->name}}">
			</div>
			<div class="data-option">
				<label for="user">User</label>
				<input type="text" name="user" value="{{ Auth::user()->user}}">
			</div>
			<div class="data-option">
				<label for="password">Clave</label>
				<span>Dejar en blanco para mantener la clave actual.</span>
				<input type="password" name="password">
			</div>
		</div>
		<div class="user-image user-bg">
			<div class="data-option">
				<div class="avatar">
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
				</div>
			</div>
			<div class="data-option">
				<input type="file" name="image" id="avatar">
			</div>
		</div>
		<div class="user-btn">
			<span><button type="submit" numero="edit-profile">Actualizar Datos</button></span>
		</div>
	</form>
</div>
@endsection
@section('js')

<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@endsection
