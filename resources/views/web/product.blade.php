@extends('template.web')
@section('title')
@lang('menu.about')
@endsection
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

    section:nth-of-type(2n+2){background: var(--main_color); color: #FFF;}
    section:nth-of-type(2n+2) h2{color: #FFF;}
    section:nth-of-type(2n+2) h3{color: #FFF;}
    section:nth-of-type(2n+2) .content{order: 2}
    section:nth-of-type(2n+2) .image{order: 1}
    section .content{width: calc(100% - 2em); max-width: calc(600px - 2em); display: flex; flex-direction: column; flex-wrap: wrap; justify-content: flex-start;}
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
    .banner{ height: calc(100vh - 100px); display: flex; justify-content: center; align-items: center; color: #FFF; background-repeat: no-repeat !important;        background-position: center !important; background-size: cover !important;}
    .banner *{color: inherit;}
    .banner div{background: rgba(0,0,0,.4); padding:  1em; font-size: 1.4em;}
    .myv{ text-align: initial}
    .myv ul li{text-align: inherit;}
    @media (max-width: 769px){
        section{width: calc(100% - 2em); padding: 2em 1em;}
        section .image{margin: 1em 0;}
    }
</style>
@endsection
@section('content')
@if ($banner)
<div class="banner" style="background: url({{ asset('storage/images/'.$banner->image->url)}});background: url({{ asset('storage/images/'.$banner->image->webp)}})">
<div>{!! $banner->translateOrDefault(\App::getLocale())->content!!}</div>
</div>
@endif
<section>
    <div class="content">
    <h2>{{ $product->translateOrDefault(App::getLocale())->title }}</h2>
    {!! $product->translateOrDefault(App::getLocale())->subtitle !== '' ? '<h3>'.$product->translateOrDefault(App::getLocale())->subtitle.'</h3>' : '' !!}
    <div class="text">
        {!! $product->translateOrDefault(App::getLocale())->content !!}
    </div>
    </div>
    <div class="image">
        <picture>
            <source class="lazy" data-srcset="{{ asset('storage/images/'.$product->image->webp) }}" type="image/webp">
            <source class="lazy" data-srcset="{{ asset('storage/images/'.$product->image->url) }}" type="image/{{ $product->image->extension }}">
            <img class="lazy" data-src="{{ asset('storage/images/'.$product->image->url) }}" alt="{{ Str::slug($product->translateOrDefault(App::getLocale())->title) }}">
        </picture>
    </div>
</section>
@if (count($contents) > 0)
    @foreach ($contents as $item)
        <section>
            <div class="content">
            <h2>{{ $item->translateOrDefault(App::getLocale())->title }}</h2>
            {!! $item->translateOrDefault(App::getLocale())->subtitle !== '' ? '<h3>'.$item->translateOrDefault(App::getLocale())->subtitle.'</h3>' : '' !!}
            <div class="text">
                {!! $item->translateOrDefault(App::getLocale())->content !!}
            </div>
            </div>
            <div class="image">
                <picture>
                    <source class="lazy" data-srcset="{{ asset('storage/images/'.$item->image->webp) }}" type="image/webp">
                    <source class="lazy" data-srcset="{{ asset('storage/images/'.$item->image->url) }}" type="image/{{ $item->image->extension }}">
                    <img class="lazy" data-src="{{ asset('storage/images/'.$item->image->url) }}" alt="{{ Str::slug($item->translateOrDefault(App::getLocale())->title) }}">
                </picture>
            </div>
        </section>
    @endforeach
@endif





@endsection
