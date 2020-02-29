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
    .posts{width: calc(100% - 2em);padding: 1em; display: flex; flex-wrap: wrap;}
    .post_resume{display:flex; flex-wrap: wrap;width:100%; max-width: calc(450px - 2em); position: relative;margin-bottom: 5em;border-bottom: 1px solid #e7e6e6;}
    .post_resume .image{position: relative; width: calc(100% - 2em); display:flex; justify-content: center; align-items: center; overflow: hidden; max-height: 200px;}
    .post_resume .text{width: calc(100% - 2em);padding:0 0.5em;}
    .post_resume .zoom{position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: none; justify-content: center; align-items: center; background: rgba(0,0,0,0.5); cursor: pointer}
    .post_resume .image:hover .zoom{display: flex;}
    .post_resume .zoom span{color: #FFF; cursor: inherit; font-size: 2em;}
    .events{background: #f4f4f4; width: calc(100% - 2em); max-width: calc(300px - 2em);}
    .event{display:flex; margin-bottom: 2em; width: calc(100% - 1em); padding: 0 0.5em;}
    .event .text{padding: 0 1em; width: calc(60% - 1em);}
    .event .text p{font-size: 0.8em;}
    a{text-decoration: none; color: var(--main_color)}
    .modal{position: fixed;top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,.7); z-index: 999; display: none; justify-content: center; align-items: center;}
    .data-modal{width: calc(100% - 2em); max-width: calc(700px - 2em); padding: 1em; background: #FFF; max-height: calc(100vh - 4em); overflow-x:hidden; overflow-y: auto;}
    .image-modal{width: calc(100% -2em); text-align: center;}
    .image-modal img{width: auto; height: auto; max-width: 100%; max-height: 450px;}
    .button-modal{position: absolute; top: 1em; right: 1em; color: #FFF; cursor: pointer; text-decoration: underline; letter-spacing: 2px;}
    .text-modal h2{color: var(--main_color)}
    @media (max-width: 769px){
        section{width: calc(100% - 2em); padding: 2em 1em;}
        section .image{margin: 1em 0;}
    }
</style>
@endsection
@section('content')
<section>
<div class="posts">
    @if (count($gallery) > 0)
    @foreach ($gallery as $post)
        <div class="post_resume">
            <div class="image">
                 <picture>
                    <source class="lazy" data-srcset="{{ asset('storage/images/'.$post->image->webp) }}" type="image/webp">
                    <source class="lazy" data-srcset="{{ asset('storage/images/'.$post->image->url) }}" type="image/{{$post->image->extension}}">
                    <img class="lazy" data-src="{{asset('storage/images/'.$post->image->url) }}" alt="{{ $post->translate('es')->title }}" >
                </picture>
                <div class="zoom">
                    <span>Clic para ampliar</span>
                </div>
            </div>
            <div class="text" style="display:none">
            <h2>{{ $post->translateOrDefault(\App::getLocale())->title}}</h2>
            @if ($post->translateOrDefault(\App::getLocale())->subtitle != '')
            <h3>{{ $post->translateOrDefault(\App::getLocale())->title }}</h3>
            @endif
            <div class="content">{!!  $post->translateOrDefault(\App::getLocale())->content !!}</div>
            </div>

        </div>
    @endforeach
    @else
    <h3>@lang('messages.no-posts')</h3>
    @endif
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
@section('archivojs')
<script src="{{asset('/js/jquery.min.js')}}" ></script>
<script>
    $('.image').click(function(){
        $('.image-modal').html($(this).find('picture').html());
        $('.text-modal').html($(this).next().html());
        $('.modal').css('display','flex');
    });
    $('.button-modal').click(function(){
        $('.modal').css('display','none');
    });

    $('.modal').click(function(){
        $('.modal').css('display','none');
    });
    $('.data-modal').click(function(e){
        e.stopPropagation();
    })

</script>
@endsection
