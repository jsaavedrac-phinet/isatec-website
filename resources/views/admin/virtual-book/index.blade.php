@extends('template.admin')
@section('title',$title)
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
	.body-content .data-option label{width: 100%; color: #555;margin: 0.5em 0; }
	.body-content .data-option span{color: #777; font-size: 0.8em; margin-bottom: 0.5em;}
	.body-content .data-option input{width: calc(100% - 2em); padding: 0.5em 1em; border-radius: 4px; border: 1px solid var(--principal);}

	.body-content .data-option .avatar{width: 100%; height: 200px;}
	.body-content .data-option .avatar picture{width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; border: 1px solid var(--principal);}
	.body-content .data-option .avatar img{width: auto; height: auto; max-width: 150px; max-height: 150px;}
	button:disabled,
	button[disabled]{background-color: #cccccc !important;color: #666666 !important;cursor: not-allowed;}

	table{width: 100%;}
	table th{padding: 0.1em 0.5em; text-align: center; background: var(--principal); color:  #FFF;}
	table td{padding: 0.1em 0.5em; text-align: center; background: #FFF; color: #444; cursor: default;}
	table .imagen{width: calc(118px - 2em); height: calc(60px - 1em); text-align: center;}
	table td picture{height: 60px; width: 118px; display: flex; justify-content: center; align-items:center; background: #FFF;}
	table td picture img{width: auto; height: auto; max-width: 118px; max-height:60px;}
	table caption{padding: 0.5em 0; font-weight: bold; font-size: 1.4em;}
	table td.acciones{display: flex; flex-wrap: wrap; justify-content: space-evenly; align-items: center; width: auto; overflow: hidden; height: 60px;}
	table td.acciones form{width: auto; height: auto;}
	table td .btn{border:none; padding: 0em 1em; background: transparent; cursor: pointer; text-decoration: none; color: #555; width: auto; height: auto;font-size: 15px; height: 30px;display: flex;justify-content: center;align-items: center; border-radius: 6px;}
	table td .btn-add{background: var(--btn-success); color: #FFF;}
	table td .btn-edit{background: var(--btn-primary); color: #FFF;}
	table td .btn-delete{background: var(--btn-danger); color: #FFF;}
    table td .btn-sections{background: gold; color: #FFF;}
	table td .btn span{margin-right: 0.2em;}

</style>
@endsection
@section('content')
<div class="header-content">
	<div class="title-content">{{ $title }}</div>
	<div class="actions-content">
		<a class="btn btn-add" href="{{ route('admin.virtual-book.create') }}">
			<div class="icon-action"><i class="fas fa-plus-circle"></i></div>
			<div class="title-action">Nuevo</div>
		</a>
	</div>
</div>
<div class="body-content">
	@if (count($virtual_books) >0)
	<table>
		<caption>Total : {{ count($virtual_books) }}</caption>
		<thead>
			<tr>
                <th  class="imagen">IMAGEN</th>
                <th width="30%">TITULO</th>
				<th width="50%" >ACCIONES</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($virtual_books as  $key =>$item)
			<tr>
                <td class="imagen">
					<picture>
						<source srcset="{{asset('storage/images/'.$item->image->webp)}}" type="image/webp">
						<source srcset="{{asset('storage/images/'. $item->image->url)}}"  type="image/{{$item->image->extension}}">
						<img src="{{asset('storage/images/'. $item->image->url)}}">
					</picture>
                </td>
                <td style="text-overflow:ellipsis; overflow:hidden">
                    {!! $item->title !!}
                </td>
				<td class="acciones">
					<a class="btn btn-edit" href="{{ route('admin.virtual-book.edit', $item->id) }}"><i class="fas fa-edit"></i>&nbsp;<label>Editar</label></a>
					<form id="delete-{{$item->id}}">
					<input type="hidden" name="id" value="{{$item->id}}">
					<input type="hidden" name="operacion" value="delete">
					<button class="btn btn-delete" type="submit" numero="delete-{{$item->id}}"><i class="fas fa-trash-alt"></i>&nbsp;<label>Eliminar</label></button>
					</form>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	@else
	<h2>DEBES CARGAR DATOS PARA MEJORAR TU WEB</h2>
	@endif
</div>
@endsection
@section('js')

<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@endsection
