@extends('template.web')
@section('title')
@lang('menu.posts')
@endsection
@section('css')
<style type="text/css">
    @font-face {
        font-family: Satisfy;
        src: url({{ asset('fonts/Satisfy/Satisfy-Regular.ttf') }});
    font-weight: normal;
    font-style: normal;
    font-display: swap;
    }

    section {
        padding: 4em 4em;
        width: calc(100% - 8em);
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        color: #222;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-size: cover !important;
    }

    .parallax {
        background-attachment: fixed !important;
    }

    .space-between {
        justify-content: space-between;
    }

    .align-center {
        align-items: center;
    }

    .space-evenly {
        justify-content: space-evenly;
    }

    section:nth-of-type(2n+2) {
        background: var(--main_color);
        color: #FFF;
    }

    section:nth-of-type(2n+2) h2 {
        color: #FFF;
    }

    section:nth-of-type(2n+2) h3 {
        color: #FFF;
    }

    section .content {
        width: calc(100% - 2em);
        max-width: calc(600px - 2em);
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    section h2 {
        font-size: 2em;
        color: var(--main_color);
        width: 100%;
    }

    section h3 {
        font-size: 2.5em;
        font-weight: bolder;
        margin: 0.5em 0;
        width: 100%;
    }

    section h4,
    section h5,
    section h6 {
        width: 100%;
        margin: 1em 0;
    }

    section .text-center {
        text-align: center;
    }

    section .text {
        font-weight: 300;
        color: inherit
    }

    section .image {
        width: calc(100% - 2em);
        max-width: calc(600px - 2em);
        text-align: center;
        overflow: hidden;
    }

    section .image.image-rounded {
        border-radius: 15px;
    }

    section .image img {
        width: auto;
        height: auto;
        max-width: 100%;
    }

    section ul {
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
        margin-top: 2em;
    }

    section ul li {
        margin: 0.3em 0;
        width: calc(100% - 2em);
        max-width: calc(300px - 2em);
        text-align: center;
        list-style: none;
    }

    section ul li img {
        width: auto;
        height: auto;
        max-width: 150px;
        max-height: 150px;
    }

    section ul li .text {
        margin-top: 1em;
        font-weight: 300;
        font-weight: bold;
        color: inherit
    }

    .button {
        width: 100%;
        display: flex;
        justify-content: flex-end;
        padding: 1em 0;
    }

    .button a {
        text-decoration: none;
        cursor: pointer;
        border-radius: 24px;
        background: var(--main_color);
        color: #FFF;
        padding: 1em;
        font-weight: bolder;
        color: var(--highlight_color)
    }

    section .subsection {
        width: 100%;
        margin: 1em 0;
    }

    .banner {
        height: calc(100vh - 100px);
        display: flex;
        justify-content: center;
        align-items: center;
        color: #FFF;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-size: cover !important;
    }

    .banner * {
        color: inherit;
    }
    .banner div{background: rgba(0,0,0,.4); padding:  1em; font-size: 1.4em;}
    .post {
        display: flex;
        flex-wrap: wrap;
        width: calc(100% - 2em);
        max-width: calc(700px - 2em);
        padding: 1em;
    }

    .post .image {
        width: calc(100% - 2em);
        max-width: calc(100% - 2em);
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 2em 0;
    }

    .post .text {
        width: calc(100% - 2em);
        padding: 0 0.5em;
    }

    .events {
        background: #f4f4f4;
        width: calc(100% - 2em);
        max-width: calc(300px - 2em);
    }

    .event {
        display: flex;
        margin-bottom: 2em;
        width: calc(100% - 1em);
        padding: 0 0.5em;
    }

    .event .text {
        padding: 0 1em;
    }

    .event .text p {
        font-size: 0.8em;
    }

    a{text-decoration: none; color: var(--main_color)}

    @media (max-width: 769px) {
        section {
            width: calc(100% - 2em);
            padding: 2em 1em;
        }

        section .image {
            margin: 1em 0;
        }
    }
</style>
@endsection
@section('content')
@if ($banner != null)
<div class="banner"
    style="background: url({{ asset('storage/images/'.$banner->image->url)}});background: url({{ asset('storage/images/'.$banner->image->webp)}})">
    <div>{!! $banner->translateOrDefault(\App::getLocale())->content!!}</div>
</div>
@endif
<section>
    <div class="post">
        <h2>{{ $video->translateOrDefault(\App::getLocale())->title}}</h2>
        @if ($video->translateOrDefault(\App::getLocale())->subtitle != '')
        <h3>{{ $video->translateOrDefault(\App::getLocale())->subtitle}}</h3>
        @endif
        <div class="image">
            <iframe width="560" height="315" src="{{ $video->youtube($video->video->url) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="text">
            {!! $video->translateOrDefault(\App::getLocale())->content !!}
        </div>
    </div>
    @include('template.partials.events-bar')
</section>


@endsection
