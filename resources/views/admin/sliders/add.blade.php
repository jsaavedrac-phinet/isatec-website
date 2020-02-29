@extends('template.admin')
@section('title','Nuevo Slider')
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
	.body-content .data-option span{color: #777; font-size: 0.8em; margin-bottom: 0.5em;}
	.body-content .data-option input{width: calc(100% - 2em); padding: 0.5em 1em; border-radius: 4px; border: 1px solid var(--principal);}
	.body-content .data-option textarea{width: calc(100% - 2em); padding: 0.5em 1em; border-radius: 4px; border: 1px solid var(--principal); height: 125px; min-height: 125px; max-height: 125px; min-width: calc(100% - 2em); max-width: calc(100% - 2em);}
	.body-content .data-option select{width: calc(100% - 2em); padding: 0.5em 1em; border-radius: 4px; border: 1px solid var(--principal);}


	.body-content .data-option .avatar{width: 100%; height: 200px;}
	.body-content .data-option .avatar picture{width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; border: 1px solid var(--principal);}
	.body-content .data-option .avatar img{width: auto; height: auto; max-width: 150px; max-height: 150px;}
	.body-content .form{background: #FFF; border-radius: 4px;box-shadow: 0 2px 10px rgba(0,0,0,.05); height: auto; padding-bottom: 0 !important; width: calc(100% - 2em); padding:  1em;}
	.body-content .data-option .preview{width: 100%; height: 150px;text-align: center; }
	.body-content .data-option .preview picture{width: 100%; height: 100%;display: flex; justify-content: center; align-items: center;}
	.body-content .data-option .preview picture img{width: auto; height: auto; max-width: 100%; max-height: 100%;}
	.body-content .data-option .btn{border: 0; background: #ccc; color: #666; border-radius: 4px; padding: 0.5em 1em; cursor: pointer;}
	.body-content .data-option .btn-success{background: var(--btn-success); color: #FFF;}

    .radio-options{display: flex;}
</style>
@endsection
@section('tab-parent')
<a class="active" href="{{ route('admin.slider.index') }}" title="">Sliders</a>
@endsection
@section('content')
<div class="header-content">
	<div class="icon-content"><span class="icon-image"></span></div>
	<div class="title-content">Nuevo Slider</div>
</div>
<div class="body-content">
	<form action="" class="form" id="1">
		<div class="data-option">
            <label for="image">Imagen :</label>
            <span style="display:block">Medidas minimas recomendadas para la imagen: (ancho x alto) 1920 X 1080</span>
			<input type="file" name="image">
		</div>
		<div class="data-option">
			<label for="content">Descripci&oacute;n :</label>
			<textarea name="content" placeholder="Descripci&oacute;n" class="trumbowyg"></textarea>
		</div>
		<div class="data-option">
			<label>Estilo del Slide :</label>
			<div class="radio-options with-image">
                <div class="radio-option">
                    <label for="option-1">
                        <img src="{{ asset('styles/slider/right-bg.png') }}" alt="">
                    </label>
                    <input type="radio" value="right-bg.png" name="style" id="option-1" checked>
                </div>
                <div class="radio-option">
                    <label for="option-2">
                        <img src="{{ asset('styles/slider/right.png') }}" alt="">
                    </label>
                    <input type="radio" value="right.png" name="style" id="option-2">
                </div>
                <div class="radio-option">
                    <label for="option-3">
                        <img src="{{ asset('styles/slider/left-bg.png') }}" alt="">
                    </label>
                    <input type="radio" value="left-bg.png" name="style" id="option-3">
                </div>
                <div class="radio-option">
                    <label for="option-4">
                        <img src="{{ asset('styles/slider/left.png') }}" alt="">
                    </label>
                    <input type="radio" value="left.png" name="style" id="option-4">
                </div>
                <div class="radio-option">
                    <label for="option-5">
                        <img src="{{ asset('styles/slider/center-bg.png') }}" alt="">
                    </label>
                    <input type="radio" value="center-bg.png" name="style" id="option-5">
                </div>
                <div class="radio-option">
                    <label for="option-6">
                        <img src="{{ asset('styles/slider/center.png') }}" alt="">
                    </label>
                    <input type="radio" value="center.png" name="style" id="option-6">
                </div>
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
@include('template.partials.trumbowyg')

<script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script>
@endsection
