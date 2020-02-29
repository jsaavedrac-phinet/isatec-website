@extends('template.web')
@section('title','Acerca de Nosotros')
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
    }
    .parallax{background-attachment: fixed !important;}
    .space-between{justify-content: space-between;}
    .align-center{align-items: center;}
    .space-evenly{justify-content: space-evenly;}

    section:nth-of-type(2n+2){background: #020094; color: #FFF;}
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
    section ul li{margin: 0.3em 0; width: calc(100% - 2em); max-width: calc(300px - 2em); text-align: center; list-style: none; margin-bottom: 2em;position: relative;overflow: hidden;}
    section ul li img{width: auto; height: auto; max-width: 150px; max-height: 150px;}
    section ul li .text{margin-top: 1em; font-weight: 300; font-weight: 700; color: inherit;letter-spacing: 0.1em; }
    section ul li .content{-webkit-transition: all 700ms cubic-bezier(.45,1.02,.7,.45);-o-transition: all 700ms cubic-bezier(.45,1.02,.7,.45);transition: all 700ms cubic-bezier(.45,1.02,.7,.45); opacity: 1; position: absolute; top: 100%; left: 0; background: rgba(0,0,0,.7); width: calc(100% - 2em);padding: 0 1em; height: 100%; display: flex;align-items: center; justify-content: center; }
    section ul.values li .text{margin-top: 1em; font-weight: 300; font-weight: bold; color: inherit;letter-spacing: 0.3em; }
    section ul.values li:hover .content{top: 0; left: 0; }
    section ul.values li:hover img{display: none;}
    section ul.values li:hover .text{padding-top: 150px;}
    .button{width: 100%; display: flex; justify-content: flex-end; padding:  1em 0;}
    .button a{text-decoration: none; cursor: pointer; border-radius: 24px; background: var(--main_color); color: #FFF; padding: 1em; font-weight: bolder; color:  var(--highlight_color)}

    section .subsection{width: 100%; margin: 1em 0;}
    section.myv .image-content li{background: rgba(0,0,0,.4); padding:  1em;}

    .myv{ text-align: initial}
    .myv ul li{text-align: inherit;}
    @media (max-width: 769px){
        section{width: calc(100% - 2em); padding: 2em 1em;}
        section .image{margin: 1em 0;}
    }
</style>
@endsection
@section('content')
@if ($about != null)
<section>
    <div class="content">
        <div class="content-aux">
            <h2>{{ $about->title }}</h2>
            @if ($about->subtitle !== '')
            <h3>{{ $about->subtitle }}</h3>
            @endif
            <div class="text">
                {!! $about->content !!}
            </div>
        </div>
    </div>
    <div class="image image-rounded">
        <picture>
            <source class="lazy" data-srcset="{{ asset('storage/images/'.$about->image->webp) }}" type="image/webp">
            <source class="lazt" data-srcset="{{ asset('storage/images/'.$about->image->url) }}" type="image/{{ $about->image->extension }}" >
            <img class="lazy" data-src="{{ asset('storage/images/'.$about->image->url) }}" >
        </picture>
    </div>
</section>
@endif
@if ( $mision != null || $vision != null )
    @if ($navegador == "Safari")
    <section class="myv" style="background: url({{ asset('images/about-myv.jpg')}})">
    @else
    <section class="myv" style="background: url({{ asset('images/about-myv.jpg')}});background: url({{ asset('images/about-myv.webp')}})">

                @endif

    <ul class="image-content">
        @if ($mision != null)
        <li>
            <h3>{{ $mision->title }}</h3>
            @if ($mision->subtitle !== '')
            <h4>{{ $mision->subtitle }}</h4>
            @endif
            <div class="text">
                {!! $mision->content !!}
            </div>
        </li>
        @endif
        @if ($vision != null)
        <li>
            <h3>{{ $vision->title }}</h3>
            @if ($vision->subtitle !== '')
            <h4>{{ $vision->subtitle }}</h4>
            @endif
            <div class="text">
                {!! $vision->content !!}
            </div>
        </li>
        @endif


    </ul>

</section>
@endif
@if ($historia != null)
<section>
    <div class="image image-rounded">
        <picture>
            <source class="lazy" data-srcset="{{ asset('storage/images/'.$historia->image->webp) }}" type="image/webp">
            <source class="lazt" data-srcset="{{ asset('storage/images/'.$historia->image->url) }}" type="image/{{ $historia->image->extension }}" >
            <img class="lazy" data-src="{{ asset('storage/images/'.$historia->image->url) }}" >
        </picture>
    </div>
    <div class="content">
        <div class="content-aux">
            <h2>{{ $historia->title }}</h2>
            @if ($historia->subtitle !== '')
            <h3>{{ $historia->subtitle }}</h3>
            @endif
            <div class="text">
                {!! $historia->content !!}
            </div>
        </div>
    </div>
</section>
@endif
@if ( count($valores) > 0)
<section>
    <h2 class="text-center">NUESTROS VALORES</h2>
    <ul class="image-content values">
        @foreach ($valores as $item)
        <li>
            @if ($item->image != null)
            <picture>
                <source class="lazy" data-srcset="{{ asset('storage/images/'.$item->image->webp)}}" type="image/webp">
                <source class="lazy" data-srcset="{{ asset('storage/images/'.$item->image->url)}}" type="image/{{ $item->image->extension }}">
                <img class="lazy" data-src="{{ asset('storage/images/'.$item->image->url)}}" alt="{!! $item->content !!}">
            </picture>
            @endif

            <div class="text">
                {!! $item->title !!}
            </div>
            <div class="content"><div>{!! $item->content !!}</div></div>
        </li>
        @endforeach
    </ul>

</section>
@endif

@endsection
