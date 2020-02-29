@extends('template.web')
@section('title')
@lang('menu.posts')
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
    .banner{ height: calc(100vh - 100px); display: flex; justify-content: center; align-items: center; color: #FFF; background-repeat: no-repeat !important;        background-position: center !important; background-size: cover !important;}
    .banner *{color: inherit;}
    .banner div{background: rgba(0,0,0,.4); padding:  1em; font-size: 1.4em;}
    .posts{max-width: calc(700px - 2em); width: calc(100% - 2em);padding: 1em;}
    .post_resume{display:flex; flex-wrap: wrap;width:100%; position: relative;margin-bottom: 5em;border-bottom: 1px solid #e7e6e6;}
    .post_resume .date{position: absolute; top: 0; left: 0; background: var(--main_color); padding: 1em; color: #FFF; text-align: center; font-size: 1.2em; cursor: default}
    .post_resume .image{width: calc(100% - 2em); max-width: calc(350px);display:flex; justify-content: center; align-items: center;}
    .post_resume .text{width: calc(100% - 2em); max-width: calc(318px - 1em); padding:0 0.5em;}

    .events{background: #f4f4f4; width: calc(100% - 2em); max-width: calc(300px - 2em);}
    .event{display:flex; margin-bottom: 2em; width: calc(100% - 1em); padding: 0 0.5em;}
    .event .text{padding: 0 1em; width: calc(60% - 1em);}
    .event .text p{font-size: 0.8em;}
    a{text-decoration: none; color: var(--main_color)}
    @media (max-width: 769px){
        section{width: calc(100% - 2em); padding: 2em 1em;}
        section .image{margin: 1em 0;}
    }
</style>
@endsection
@section('content')
@if ($banner != null)
<div class="banner" style="background: url({{ asset('storage/images/'.$banner->image->url)}});background: url({{ asset('storage/images/'.$banner->image->webp)}})">
    <div>{!! $banner->translateOrDefault(\App::getLocale())->content!!}</div>
</div>
</section>
@endif
<section>
<div class="posts">
    @if (count($events) > 0)
    @foreach ($events as $event)
        <div class="post_resume">
            <div class="date">
                <div class="day">
                    {{ $event->day() }}
                </div>
                <div class="monthAndYear">
                    {{ $event->monthAndYear() }}
                </div>
            </div>
            <div class="image">
                <a href="{{ route('web.event', [$type,$event->id]) }}">
                    <picture>
                    <source class="lazy" data-srcset="{{ asset('storage/images/'.$event->image->webp) }}" type="image/webp">
                    <source class="lazy" data-srcset="{{ asset('storage/images/'.$event->image->url) }}" type="image/{{$event->image->extension}}">
                    <img class="lazy" data-src="{{asset('storage/images/'.$event->image->url) }}" alt="{{ $event->translate('es')->title }}" >
                    </picture>
                </a>
            </div>
            <div class="text">
            <a href="{{ route('web.event', [$type,$event->id]) }}"><h2>{{ $event->translateOrDefault(\App::getLocale())->title}}</h2></a>
            <div class="content">{!!  strip_tags(\Illuminate\Support\Str::words($event->translateOrDefault(\App::getLocale())->content, 25,'...')) !!}</div>
            </div>
        </div>
    @endforeach
    @else
    <h3>@lang('messages.no-events')</h3>
    @endif
</div>
@include('template.partials.posts-bar')


@endsection
