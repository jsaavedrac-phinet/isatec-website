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

	.body-content .data-option label picture{width: 100%; height: 100%; max-width: 150px; max-height: 100px;}
	.body-content .data-option label picture img{width: auto; height: auto; max-width: 150px; max-height: 100px;}

	.body-content .data-option .avatar{width: 100%; height: 200px;}
	.body-content .data-option .avatar picture{width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; border: 1px solid var(--principal);}
	.body-content .data-option .avatar img{width: auto; height: auto; max-width: 150px; max-height: 150px;}
	button:disabled,
	button[disabled]{background-color: #cccccc !important;color: #666666 !important;cursor: not-allowed;}

	.body-content .form{background: #FFF; border-radius: 4px;box-shadow: 0 2px 10px rgba(0,0,0,.05); height: auto; padding-bottom: 0 !important; width: calc(100% - 2em); padding:  1em;}
	.body-content .data-option .btn{border: 0; background: #ccc; color: #666; border-radius: 4px; padding: 0.5em 1em; cursor: pointer;}
	.body-content .data-option .btn-success{background: var(--btn-success); color: #FFF;}

	.body-content .sortable{ border: 1px dashed var(--principal); border-radius: 4px; width: calc(100% - 2em); padding:  0 1em; cursor: pointer; }
	.body-content .sortable * {cursor: pointer;}
	.body-content .data-sort{width: 100%;}

</style>
@endsection
@section('tab-parent')
<a class="active" href="{{ route('admin.section.index',[$name,$image,$content]) }}" title="">Listado de {{  $name}}</a>
@endsection
@section('content')
<div class="header-content">
	<div class="title-content">{{ $title }}</div>
</div>

<div class="body-content">
	<form id="1" class="form" >
		<input type="hidden" name="nuevas_filas" id="nuevas_filas" value="">
		<div class="data-option">
			<span>Ordenar de forma ascendente y luego hacer clic en Guardar Cambios.</span>
        </div>
        @if (count($section)>0)
        <div class="data-option">
			<button class="btn btn-success" type="submit" numero="1">GUARDAR CAMBIOS</button>
		</div>
        @else
        <h1>NO HAY DATOS</h1>
        @endif

		<div class="data-sort">
		@foreach ($section as $item)
			<div class="data-option sortable">
                <label id="{{$item->id}}">
                    @if ($show_image)
                    <picture>
                            <source src="{{asset('storage/images/'.$item->image->webp)}}" type="image/webp">
                            <source src="{{asset('storage/images/'. $item->image->url)}}"  type="image/{{$item->image->extension}}">
                            <img src="{{asset('storage/images/'. $item->image->url)}}">
                    </picture>
                    @else
                    {{ $item->title }}
                    @endif

				</label>
			</div>
		@endforeach
		</div>
	</form>
</div>
@endsection
@section('js')
<script type="text/javascript">
	$('form#1').reset();
</script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sortable.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@endsection
