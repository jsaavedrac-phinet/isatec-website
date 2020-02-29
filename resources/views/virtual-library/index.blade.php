@extends('template.virtual-library')
@section('title','INICIO')
@section('css')
<style type="text/css">
    @font-face {
		font-family: Satisfy;
		src:  url({{ asset('fonts/Satisfy/Satisfy-Regular.ttf') }});
		font-weight: normal;
		font-style: normal;
		font-display: swap;
		}

    section{
        padding: 4em 4em;
        width:  calc(100% - 8em);
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        color: #222;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-size: cover !important;
         background:rgba(255,255,255,.9);
    }
    .parallax{background-attachment: fixed !important;}
    .space-between{justify-content: space-between;}
    .align-center{align-items: center;}
    .space-evenly{justify-content: space-evenly;}

    section:nth-of-type(2n+2){background: var(--main_color); color: #FFF;}
    section:nth-of-type(2n+2) h2{color: #FFF;}
    section:nth-of-type(2n+2) h3{color: #FFF;}
    section .content{width: calc(100% - 2em); max-width: calc(600px - 2em); display: flex; flex-direction: column; flex-wrap: wrap; justify-content: space-between;}
    section h2{font-size: 2em; color: var(--main_color); width: 100%;}
    section h3{font-size: 2.5em; font-weight: bolder; margin: 0.5em 0; width: 100%;}
    section h4, section h5, section h6{width: 100%; margin: 1em 0;}
    section .text-center{text-align: center;}
    section .text{font-weight: 300; color: inherit}
    section .image{width: calc(100% - 2em); max-width: calc(600px - 2em); text-align: center; overflow: hidden;}
    section .image.image-rounded{border-radius: 15px;}
    section .image img{width: auto; height: auto; max-width: 100%;}
    section ul{width: 100%; display: flex; justify-content: space-evenly; flex-wrap: wrap; margin-top: 2em;}
    section ul li{margin: 0.3em 0; width: calc(100% - 2em); max-width: calc(300px - 2em); text-align: center; list-style: none;}
    section ul li img{width: auto; height: auto; max-width: 150px; max-height: 150px;}
    section ul li .text{margin-top: 1em; font-weight: 300; font-weight: bold; color: inherit}
    .button{width: 100%; display: flex; justify-content: flex-end; padding:  1em 0;}
    .button a{text-decoration: none; cursor: pointer; border-radius: 24px; background: var(--main_color); color: #FFF; padding: 1em; font-weight: bolder; color:  var(--highlight_color)}

    section .subsection{width: 100%; margin: 1em 0;}

    a{text-decoration: none; color: var(--main_color)}
    .modal{position: fixed;top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,.7); z-index: 999; display: none; justify-content: center; align-items: center;}
    .data-modal{width: calc(100% - 2em); max-width: calc(700px - 2em); padding: 1em; background: #FFF; max-height: calc(100vh - 4em); overflow-x:hidden; overflow-y: auto;}
    .image-modal{width: calc(100% -2em); text-align: center;}
    .image-modal img{width: auto; height: auto; max-width: 100%; max-height: 450px;}
    .button-modal{position: absolute; top: 1em; right: 1em; color: #FFF; cursor: pointer; text-decoration: underline; letter-spacing: 2px;}
    .text-modal h2{color: var(--main_color)}
    .tematicas{width: calc(100% - 2em);}
    .tematicas ul{width: calc(100% - 1em); padding:2em 2em;font-size: 1.2em; display: initial;}
    .tematicas ul li{font-weight: bold; list-style: inside; text-align: left;color: var(--principal);}
    .tematicas ul li a{text-transform: uppercase;}
    @media (max-width: 769px){
        section{width: calc(100% - 2em); padding: 2em 1em;}
        section .image{margin: 1em 0;}
    }
</style>
@endsection
@section('content')
<section>
<h2>{{ $bienvenida->title }}</h2>
@if ($bienvenida->subtitle !== '')
<h3> {{ $bienvenida->subtitle }}</h3>
@endif
<div class="text">
    {!! $bienvenida->content !!}
</div>
<div class="tematicas">
    <ul>
        @foreach ($tags as $item)
    <li><a href="{{ route('virtual-library.byTag', $item->id) }}">{{ $item->name }} ({{$item->total}})</a></li>
        @endforeach
    </ul>

</div>
</section>
<div class="modal">
    <div class="button-modal">
        Close
    </div>
    <div class="data-modal">
        <div class="image-modal">

        </div>
        <div class="text-modal">

        </div>
    </div>
</div>
@endsection

