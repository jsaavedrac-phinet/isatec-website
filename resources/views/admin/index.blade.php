@extends('template.admin')
@section('title','Inicio')
@section('css')
<style type="text/css">
.bienvenida{width: 100%; height: calc(100vh - 112px); text-align: center; display: flex; justify-content: center; align-items: center; color: var(--verde_logo);}
</style>
@endsection
@section('content')
<div class="bienvenida">
	<h1>Bienvenido(a) al Sistema de Gesti&oacute;n de Contenido Web</h1>
</div>

@endsection
