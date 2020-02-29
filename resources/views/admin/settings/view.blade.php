@extends('template.admin')
@section('title','Datos de Contacto')
@section('css')
<style type="text/css">
	.header-content{display: flex; padding:  1em 0; font-size: 1.5em; align-items: flex-end; }
	.header-content .icon-content{margin-right: 0.5em;font-size: 1.4em;}
	.header-content .title-content{letter-spacing: 1px;}
	.header-content .actions-content{margin-left: 2em; display: flex; height:100%; width: auto;}
	.header-content .actions-content a:nth-of-type(n+2){margin-left: 0.5em;}
	.header-content .actions-content a{height: 100%; display: flex; justify-content: space-between; align-items: center; width: auto; color: #FFF; background: #ccc; cursor: pointer; font-size: 0.6em; text-decoration: none; }
	.header-content .actions-content a .icon-action{margin-right: 5px;}
	.header-content .actions-content a .title-action{}
	.header-content .actions-content a.btn{padding: 0.5em 1em; border-radius: 4px;}
	.header-content .actions-content a.btn-add{background: var(--btn-success);}
	.header-content .actions-content a.btn-sort{background: var(--btn-primary);}
	.body-content{width: 100%; height: auto;}
	.body-content form{display: flex; flex-wrap: wrap; justify-content: space-evenly; align-items: flex-start;}
	.body-content .user-bg{background: #FFF; border-radius: 4px;box-shadow: 0 2px 10px rgba(0,0,0,.05); height: 300px; padding-bottom: 0 !important;}
	.body-content .user-data{width: calc(100% - 2em); max-width: calc(600px - 2em); padding: 2em 1em;}
	.body-content .user-image{width: calc(100% - 2em); max-width: calc(400px - 2em); padding:2em  1em;}
	.body-content .user-btn{width: calc(100% - 4em); padding: 1em 2em; display: flex; justify-content: flex-end; align-items: center;}
	.body-content .user-btn button{border: none; background: var(--principal);  color: #FFF; padding: 0.5em 1em; border-radius: 4px;}
	.body-content .data-option{width: 100%; display: flex; flex-wrap: wrap; margin-bottom: 1em;}
	.body-content .data-option label{width: 100%; color: #555;margin: 0.5em 0; text-transform: capitalize; }
	.body-content .data-option span{color: #777; font-size: 0.8em; margin-bottom: 0.5em;}
	.body-content .data-option input{width: calc(100% - 2em); padding: 0.5em 1em; border-radius: 4px; border: 1px solid var(--principal);}
	.body-content .data-option .avatar{width: 100%; height: 200px;}
	.body-content .data-option .avatar picture{width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; border: 1px solid var(--principal);}
	.body-content .data-option .avatar img{width: auto; height: auto; max-width: 150px; max-height: 150px;}
	.body-content .data-option .btn{border: 0; background: #ccc; color: #666; border-radius: 4px; padding: 0.5em 1em; cursor: pointer;}
	.body-content .data-option .btn-success{background: var(--btn-success); color: #FFF;}
	.body-content .form{background: #FFF; border-radius: 4px;box-shadow: 0 2px 10px rgba(0,0,0,.05); height: auto; padding-bottom: 0 !important; width: calc(100% - 2em); padding:  1em;}
	button:disabled,
	button[disabled]{background-color: #cccccc !important;color: #666666 !important;cursor: not-allowed;}
</style>
@endsection
@section('content')
<div class="header-content">
	<div class="icon-content"><span class="icon-cogs"></span></div>
	<div class="title-content">Datos de Contacto</div>

</div>
<div class="body-content">
	<form action="" class="form" id="1">
		<div class="data-option">
			<label for="telefono">Tel&eacute;fono :</label>
			<input type="text" name="telefono" value="{{ $telefono !=  null  ? $telefono->value : null}}" >
		</div>
		<div class="data-option">
			<label for="direccion">Direcci&oacute;n :</label>
			<input type="text" name="direccion" value="{{ $direccion !=  null  ? $direccion->value : null}}" >
		</div>
		<div class="data-option">
			<label for="correo">Correo :</label>
			<input type="text" name="correo" value="{{ $correo !=  null  ? $correo->value : null}}">
		</div>
		<div class="data-option">
			<label for="facebook">Facebook :</label>
			<input type="text" name="facebook" value="{{ $facebook !=  null  ? $facebook->value : null}}" >
        </div>
        <div class="data-option">
			<label for="youtube">Youtube :</label>
			<input type="text" name="youtube" value="{{ $youtube !=  null  ? $youtube->value : null}}">
		</div>
		<div class="data-option">
			<button class="btn btn-success" type="submit" numero="1">GUARDAR</button>
		</div>
	</form>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@endsection
