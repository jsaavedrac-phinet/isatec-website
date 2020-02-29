@extends('template.admin')
@section('title',$title)
@section('css')
<style type="text/css">
	input,select,textarea{-ms-box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box;}
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
	.body-content .user-bg.body-content .form{background: #FFF; border-radius: 4px;box-shadow: 0 2px 10px rgba(0,0,0,.05); height: 300px; padding-bottom: 0 !important;}
	.body-content .user-data{width: calc(100% - 2em); max-width: calc(600px - 2em); padding: 2em 1em;}
	.body-content .user-image{width: calc(100% - 2em); max-width: calc(400px - 2em); padding:2em  1em;}
	.body-content .user-btn{width: calc(100% - 4em); padding: 1em 2em; display: flex; justify-content: flex-end; align-items: center;}
	.body-content .user-btn button{border: none; background: var(--principal);  color: #FFF; padding: 0.5em 1em; border-radius: 4px;}
	.body-content .data-option{width: 100%; display: flex; flex-wrap: wrap; margin-bottom: 1em;}
	.body-content .data-option label{width: 100%; color: #555;margin: 0.5em 0; }
	.body-content .data-option span{color: #777; font-size: 0.8em; margin-bottom: 0.5em; width: 100%;}
	.body-content .data-option input{width: calc(100% - 2em); padding: 0.5em 1em; border-radius: 4px; border: 1px solid var(--principal);}
	.body-content .data-option textarea{width: calc(100% - 2em); padding: 0.5em 1em; border-radius: 4px; border: 1px solid var(--principal); height: 125px; min-height: 125px; max-height: 125px; min-width: calc(100% - 2em); max-width: calc(100% - 2em);}
	.body-content .data-option select{width: calc(100% - 2em) !important; padding: 0.5em 1em; border-radius: 4px; border: 1px solid var(--principal);}
	.body-content .data-option .select2{width: 100% !important; padding: 0.5em 1em; border-radius: 4px; border: 1px solid var(--principal);}
	.body-content .data-option .avatar{width: 100%; height: 200px;}
    .col20{width: 100%;}
    .select2-container--default.select2-container--focus .select2-selection--multiple{font-size: 1.5em;}
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{font-size: 1em; margin:0; width: auto;}
	.body-content .data-option .avatar picture{width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; border: 1px solid var(--principal);}
	.body-content .data-option .avatar img{width: auto; height: auto; max-width: 150px; max-height: 150px;}
	.body-content .form{background: #FFF; border-radius: 4px;box-shadow: 0 2px 10px rgba(0,0,0,.05); height: auto; padding-bottom: 0 !important; width: calc(100% - 2em); padding:  1em;}
	.body-content .data-option .preview{width: 100%; height: 150px;text-align: center; }
	.body-content .data-option .preview picture{width: 100%; height: 100%;display: flex; justify-content: center; align-items: center;}
	.body-content .data-option .preview picture img{width: auto; height: auto; max-width: 100%; max-height: 100%;}
	.body-content .data-option .btn{border: 0; background: #ccc; color: #666; border-radius: 4px; padding: 0.5em 1em; cursor: pointer;}
	.body-content .data-option .btn-success{background: var(--btn-success); color: #FFF;}
</style>
<link rel="stylesheet" href="{{asset('plugins/trumbowyg/ui/trumbowyg.min.css')}}" media="none" onload="if(media!='all')media='all'">
<noscript><link rel="stylesheet" href="{{asset('plugins/trumbowyg/ui/trumbowyg.min.css')}}"></noscript>
<link rel="stylesheet" href="{{asset('plugins/datetime/jquery.datetimepicker.min.css')}}" media="none" onload="if(media!='all')media='all'">
<noscript><link rel="stylesheet" href="{{asset('plugins/datetime/jquery.datetimepicker.min.css')}}"></noscript>
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}" media="none" onload="if(media!='all')media='all'">
<noscript><link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}"></noscript>
@endsection
@section('tab-parent')
<a class="active" href="{{ route('admin.virtual-book.index') }}" title="">{{ $title }}</a>
@endsection
@section('content')
<div class="header-content">
    <div class="title-content">{{ $title }}</div>
</div>
<div class="body-content">
	<form action="" class="form" id="1">
        <div class="data-option">
            <label for="url">Libro Virtual :</label>
            <span>Formato PDF.</span>
            <input type="file" name="url" id="url">
        </div>
        <div class="data-option">
			<label for="title">T&iacute;tulo :</label>
			<input type="text" name="title" id="title">
		</div>
        <div class="data-option">
			<label for="author">Autor :</label>
			<input type="text" name="author" id="author">
		</div>
        <div class="data-option">
			<label for="year">Año :</label>
			<input type="text" name="year" id="year">
		</div>
        <div class="data-option">
			<label for="collection">Collecci&oacute;n :</label>
			<input type="text" name="collection" id="collection">
		</div>
        <div class="data-option">
            <label for="contents">Contenido :</label>
            <span>Describir el contenido del libro</span>
            <textarea name="contents" class="trumbowyg"></textarea>
        </div>
        <div class="data-option">
            <label for="image">Imagen:</label>
            {{-- <span>Medidas minimas recomendadas para la imagen: (ancho x alto) {{ $dimensions }}</span> --}}
            <span>Tip: Cargar la imagen manteniendo la escala del ratio (ancho x alto) para evitar problemas de visualizaci&oacute;n en la web</span>
			<input type="file" name="image">
        </div>
        <div class="data-option">
            <label for="tags">ETIQUETAS :</label>
            <div class="col20">
                <select class="tags" multiple="multiple" name="tags[]">
                    @foreach ($tags as $element)
                        <option value="{{$element->id}}">{{$element->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
		<div class="data-option">
			<button class="btn btn-success" type="submit" numero="1">GUARDAR</button>
		</div>
	</form>
</div>
@endsection
@section('js')
<script type="text/javascript">
	$('form#1')[0].reset();
</script>
<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/trumbowyg/trumbowyg.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/trumbowyg/plugins/upload/trumbowyg.upload.js') }}"></script>
<script type="text/javascript">
	var path ="/admin/upload_images";
	$('.trumbowyg').trumbowyg({
		lang: 'es',
		resetCss: true,
		imageWidthModalEdit: true,
		removeformatPasted: true,
		btnsDef: {
        // Create a new dropdown
        image: {
            dropdown: ['insertImage','upload'],
            ico: 'insertImage'
        },
	    },
	    // Redefine the button pane
	    btns: [
	        ['viewHTML'],
	        ['formatting'],
	        ['strong', 'em', 'del'],
	        ['superscript', 'subscript'],
	        ['link'],
	        // ['image'],
	        // ['video'], // Our fresh created dropdown
	        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
	        // ['unorderedList', 'orderedList'],
	        // ['horizontalRule'],
	        // ['removeformat'],
	        ['fullscreen']
	    ],
		    plugins: {
		        // Add imagur parameters to upload plugin for demo purposes
		        upload: {
		            serverPath: path,
		            fileFieldName: 'image',
		            urlPropertyName: 'url',
		            imageWidthModalEdit: true
		        },
			    // video: {
			    //         serverPath: path_video,
			    //         fileFieldName: 'video',
			    //         headers: {
			    //             'Authorization': 'Client-ID xxxxxxxxxxxx'
			    //         },
			    //         urlPropertyName: 'url'
			    //     }
	    }
		});

</script>
<script type="text/javascript" src="{{ asset('plugins/datetime/jquery.datetimepicker.full.min.js') }}"></script>
<script>
$.datetimepicker.setLocale('es');
$('.datetime').datetimepicker({
    format: 'Y-m-d H:i:s',
    defaultDate : new Date(),
    value : new Date(),
    step: 15
});
</script>
<script type="text/javascript" src="{{ asset('/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
$(".tags").select2({
    tags: true,
    tokenSeparators: [',', '.']
});
</script>
@endsection
