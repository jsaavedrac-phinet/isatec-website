@extends('template.web')
@section('title','Inicio')
@section('css')
<style type="text/css">
    section {
        padding: 4em 4em;
        width: calc(100% - 8em);
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        color:  #222;
        background-color:   #FFF;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-size: cover !important;
    }
    .parallax{background-attachment: fixed !important;}
    .space-between{justify-content: space-between;}
    .align-center{align-items: center;}
    .space-evenly{justify-content: space-evenly;}

    section .content{width: calc(100% - 2em); max-width: calc(600px - 2em);}
    section .content .subcontent{background: var(--content-bg)}
    section h2{font-size: 2em; color: var(--main_color); width: auto; display: inline-block;}
    section h3{font-size: 2.5em; font-weight: bolder; margin: 0.5em 0; width: auto;}
    section h4, section h5, section h6{width: auto; margin: 1em 0;}
    section .text-center{text-align: center;}
    section .text{font-weight: 300; color: inherit}
    section .image{width: calc(100% - 2em); max-width: calc(600px - 2em); text-align: center; overflow: hidden;}
    section .image.image-rounded{border-radius: 15px;}
    section .image img{width: auto; height: auto; max-width: 100%;}
    section ul{width: 100%; display: flex; justify-content: space-evenly; flex-wrap: wrap; margin-top: 2em; color: #111;}
    section ul li{margin: 0.3em 0;border-radius: 12px; width: calc(100% - 2em); max-width: calc(500px - 2em); text-align: center; list-style: none; background: var(--highlight_color); padding: 1em; display: flex; justify-content: space-between}
    section ul.posts li  {position: relative; height: 550px; overflow: hidden;flex-wrap: wrap; padding: 0; border-radius: 0px; background: var(--negrito); border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;}
    section ul.posts li .image {position: relative; align-items: flex-start; width: 100%; height: 230px;}
    section ul.posts li .image img{min-height: 100%; min-width: 100%;}
    section ul.posts li .content {align-items: flex-start; width: calc(100% - 2em); font-size: 0.9em;text-align: justify; padding: 0 1em; color: #FFF; height: 220px;}
    section ul.posts li .date{position: absolute; top: 0px; left: 0; background: var(--main_color); padding: 0.5em; color: #FFF; text-align: center; font-size: 1.2em; cursor: default;display: flex; letter-spacing: 1px; font-size: 0.8em;}
    section ul.posts li .content .titulo-post{white-space: pre; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 1.1em !important; text-align: center; color: var(--celeste);margin-bottom: 1em;}
    section ul.posts li a{text-decoration: none;}
    section .content .subcontent.fb{border-radius: 8px; overflow: hidden; width: 400px; height: auto; display: block;}
    section .content.welcome{width: calc(100% - 2em); max-width: 800px; min-height: 550px; height: auto;}
    section .content.welcome .content-aux{width: calc(100% - 4em); padding: 1em 2em;font-size: 1.5em; text-align: justify;}
    section .content .subcontent{display: flex;height: auto;margin-bottom: 1em;}


    .reconocimiento{display: flex; width: calc(100% - 2em); padding: 1em; margin-bottom: 0.5em; height: 200px; font-size: 0.7em;}
    .reconocimiento .image{border: 1px solid #222;display: flex;justify-content: center;align-items: center;}
    .reconocimiento .image img{height: 100%; width: auto; max-height: 180px;}
    .subcontent.reconocimientos{flex-wrap: wrap;}
    .subcontent.reconocimientos a{color: var(--secondary_color); margin: 0.5em 0; text-align: right; display: block; width: calc(100% - 2em); text-decoration: none; font-weight: bolder;}
    .reconocimiento h3{margin:0; margin-bottom: 0.5em; color: var(--main_color);font-size: 1.2em;}
    .subcontent.reconocimientos .reconocimiento a{margin: 0.5em 0; letter-spacing: 1px; text-decoration: none; color: #222;font-style: italic; display: block}

    section .content .subcontent.comunidad{height: 180px; background: #020094; width: 400px;flex-wrap: wrap; color: #FFF;}
    section .content .subcontent.comunidad h2{color: #FFF; text-align: center; margin: 1em auto;font-size: 1.5em;}
    section .content .subcontent.comunidad h3{color: #FFF; text-align: center; margin: 0.5em 0; }
    section .content .subcontent.comunidad h4{color: #FFF; text-align: center; margin: 0.5em 0;}
    section .content .subcontent.comunidad .box{display: flex; justify-content: space-evenly; min-height: 200px; height: auto; flex-wrap: wrap; width: 100%;}
    section .content .subcontent.comunidad .box .item-comunidad .image{border:1px solid #FFF; width: 180px; height: 110px;}
    section .content .subcontent.comunidad .box .item-comunidad .link{margin-top: 1em; border-radius: 6px; background:#FFF;color: var(--main_color); padding: 1em;}
    section .content .subcontent.comunidad .box .item-comunidad .link a{text-align: center;display: block; text-decoration: none; color: inherit}

    section .content .subcontent.transparencia{height: 60px; background: #0099cb; width: 400px;flex-wrap: wrap; color: #FFF;}
    section .content .subcontent.transparencia a{display: flex; justify-content: center; align-items:center; width: 100%; text-decoration: none; height: 100%;}
    section .content .subcontent.transparencia h2{color: #FFF; text-align: center; margin: 1em auto;font-size: 1.5em;}

    section .content .subcontent.convocatoria{height: 60px; background: #343434; width: 400px;flex-wrap: wrap; color: #FFF;}
    section .content .subcontent.convocatoria a{display: flex; justify-content: center; align-items:center; width: 100%; text-decoration: none; height: 100%;}
    section .content .subcontent.convocatoria h2{color: #FFF; text-align: center; margin: 1em auto;font-size: 1.5em;}
    .slides {
        width: 100%;
        height: 33.23vw;
        overflow: hidden;
        position: relative;
    }
    .slides .arrow{
        height: 100%;
        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 3;
        font-size: 2em;
    }
    .slides .arrow span{
        background: rgba(0,0,0,0.6);
        padding: 0.3em 0.5em;
        color: #FFF;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0em 1em;
        border-radius: 50%;
    }
    .slider .arrow.left{
        left: 0;
    }

    .slides .arrow.right{
        right: 0;
    }
    .slides .slide{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        right: -100%;
    }
    .slides .slide .text{position: absolute; top:0; left: 0; display: flex; justify-content: center; align-items: center; color: #FFF; width: 100%; height: 100%; font-size: calc(12px + 2.5em);}
    .slides .slide .text *{font-family: inherit; text-decoration: none; color: #FFF;}
    .slides .slide .text div{padding:  1em;font-size: 1.2em;}
    .slides .slide .text div a{padding: 0.3em 1em; border-radius: 6px; background: #06C4C0; margin: 0.5em 0; display: inline-block; font-size: 0.5em; }
    .slides .slide .text div h2{background: #06C4C0; padding:0.5em 1.2em; font-size: 0.9em; white-space: pre; display: inline-block; }
    .slides .slide img{width: 100%; height: auto;}

    .slides .slide.right .text{width: 40%; left: 60%;}
    .slides .slide.right .text div p{width: calc(100% - 1em); padding-left: 1em;}
    .slides .slide.left .text{width: 40%;}
    .slides .slide.left .text div p{width: calc(100% - 1em); padding-left: 1em;}
    .slides .slide.center .text{width: 100%; left: 0%;}
    .slides .slide.right-bg .text{width: 40%; background: rgba(1,0,252,0.57); left: 60%;}
    .slides .slide.right-bg .text div p{width: calc(100% - 1em); padding-left: 1em;}
    .slides .slide.right-bg .text::before{position: absolute;
        content: "";
        width: 0;
        height: 0;
        border-bottom: calc(100vh - 130px) solid rgba(1,0,252,0.57);
        border-left: calc( (100vh - 130px) * 0.30) solid
        transparent;
        top: 0;
        right: 100%;}
    .slides .slide.left-bg .text{width: 40%; background: rgba(1,0,252,0.57);}
    .slides .slide.left-bg .text div p{width: calc(100% - 1em); padding-left: 1em;}
    .slides .slide.left-bg .text::before{position: absolute;
        content: "";
        width: 0;
        height: 0;
        border-bottom: calc(100vh - 130px) solid rgba(1,0,252,0.57);
        border-right: calc( (100vh - 130px) * 0.30) solid
        transparent;
        top: 0;
        left: 100%;}
    .slides .slide.center-bg .text div{background: rgba(1,0,252,0.57); width: 70%; height: auto;}
    .button{width: 100%; display: flex; justify-content: flex-end; padding:  1em 0;}
    .button a{text-decoration: none; cursor: pointer; border-radius: 24px; background: var(--main_color); color: #FFF; padding: 1em; font-weight: bolder; color:  var(--highlight_color)}
    .beneficios-container{display: flex; justify-content: space-between; margin-top: 2em;}
    .beneficios-container .image{order: 2; width: calc(100% - 2em); max-width: calc(500 - 2em); padding: 0 1em;}
    .beneficios-container .image img{width: auto; height: auto; max-width: 100%;}

    .beneficios-container .beneficios{width: calc(100% - 2em); max-width: calc(350px - 2em); padding:  0 1em; display: flex; flex-wrap: wrap; flex-direction: column; justify-content: space-evenly;}
    .beneficios-container .beneficios .beneficio .text *{text-align: inherit }
    .beneficios-container .beneficios.izquierda{order:1}
    .beneficios-container .beneficios.izquierda .beneficio h2{text-align: right;}
    .beneficios-container .beneficios.izquierda .beneficio .text{text-align: right;}
    .beneficios-container .beneficios.derecha{order:3}
    .beneficios-container .beneficios.derecha .beneficio h2{text-align: left;}
    .beneficios-container .beneficios.derecha .beneficio .text{text-align: left;}
    .index-contactanos{height: 634px;}
    .footer-post{height: 50px; width: calc(100% - 2em); padding: 0 1em; border-top: 1px solid #fff; text-align: center; display: flex; align-items: center; justify-content: center; color: #FFF;}

    section .services{display: flex; justify-content: space-evenly;height: 365px;width: 100%; }
    section .services .images{overflow: hidden; width: calc(100% - 2em); max-width: calc(842px - 2em); height: 100%; position: relative; }
    section .services .images .image{background:#0099cb; width: 100%; height: 100%; max-width: 100%; position: absolute; top: 0; left: 0; opacity: 0; -webkit-transition: all 300ms linear 0ms;-moz-transition: all 300ms linear 0ms;-ms-transition: all 300ms linear 0ms;transition: all 300ms linear 0ms;}
    section .services .images .image.active{opacity: 1;}
    section .services .images .image img{min-width: 100%; min-height: 100%;}
    section .services .images .image .content{position: absolute; top: 0; left: 0; height: calc(100% - 2em); padding: 1em; width: calc(44% - 2em); background: #0099cb; display: flex; justify-content: space-evenly;flex-direction: column;font-size: 0.8em; z-index: 2;color: #FFF;font-size: 1.1em;}
    section .services .images .image .content h1{font-size: 2em;text-align:left}
    section .services .images .image .content h2{font-size: 1.5em;text-align:left}
    section .services .images .image .content h3{font-size: 1em;text-align:left}
    section .services .images .image .content .text{text-align: left;}
    section .services .images .image .content h2,section .services .images .image .content h3{display: block; text-align: left; color: #FFF;}
    section .services .images .image .content .button{width: 100%;display: flex; justify-content: flex-start;}
    section .services .images .image .content .button a{display: block; padding: 1em; background: #020094; border-radius: 6px; color: #FFF;}
    section .services .images .image .content .hashtag{text-align: justify; color: #4ac1e3;}

    section .services .images .image .picture{width: 100%; height: 100%; position: relative; z-index: 1;}
    section .services .images .image .picture .bg-circle{position: absolute; top: 0; left: 44%;background:url({{ asset('storage/settings/path-bg.png') }}); width: 56%; height: 100%; background-position: top left;}

    section .services .buttons{overflow: hidden; width: calc(100% - 2em); max-width: calc(426px - 2em); height: 100%; display:flex; justify-content: space-evenly; flex-direction: column; min-height: 70px; margin:0}
    section .services .buttons li{padding: 1em; background: var(--main_color); border-radius: 0; width: calc(100% - 2em); color: #FFF; text-align: left;margin:0;display: flex; align-items: center; justify-content: flex-start; cursor: pointer;}
    section .services .buttons li.active{background: #689b3f;}
    section .services .buttons li i{margin-right: 10px;}
    @media (max-width: 769px){
        section{width: calc(100% - 2em); padding: 2em 1em;}
        section h3{font-size: 1.5em;}
        .no-mobile{display: none !important;}
        .beneficios-container{flex-wrap: wrap;}
        .beneficios-container .image{margin: 1em 0;}
        .index-contactanos{height: 254px;}
        .slides{height: 180px !important;}
        .slides .slide .text{font-size: calc(12px + 0.5em) !important;}
        .slides .arrow span{padding: 0 0.3em !important;}
        section .services{flex-wrap: wrap;min-height: 365px; height: auto !important;}
        section .services .images{height: 250px !important; order: 2;}
        section .services .images .image .content{width: calc(65% - 2em) !important; font-size: 0.6em;background: rgba(59,106,186,.7)}
        section .services .images .image .content::before {
            content: none !important;
        }
        section .services .images .image .content::after {
            content: none !important;
        }
        section .services .buttons{height: auto !important; order: 1;}
        section .welcome .subcontent{flex-wrap: wrap;}
        section .content.welcome .image{width: calc(100% - 2em);}
        section .content.welcome .content-aux{width: calc(100% - 4em);}
        .reconocimiento{flex-wrap: wrap; min-height: 200px; height: auto !important; font-size: 0.8em;}
        section .content .subcontent.comunidad{width: 100%;}
    }
</style>
@endsection
@section('content')
@if (count($slides) > 0)
<div class="slides">
    <div class="arrow left">
        <span class="fas fa-angle-left"></span>
    </div>
    <div class="slides-box">
    @foreach ($slides as $key=> $slide)
    <div class="slide {{  str_replace(".png","",$slide->style)  }} {{ $key == 0 ? 'active' : ''}}" style="{{ $key == 0 ? 'right: 0' : ''  }}">
        <picture>
            <source class="lazy" data-srcset="{{ asset('storage/images/'.$slide->image->webp)}}" type="image/webp">
            <source class="lazy" data-srcset="{{ asset('storage/images/'.$slide->image->url)}}" type="image/{{ $slide->image->extension }}">
            <img class="lazy" data-src="{{ asset('storage/images/'.$slide->image->url)}}" alt="{{ \Illuminate\Support\Str::slug(strip_tags(\Illuminate\Support\Str::words($slide->content, 15,'')))  }}">
        </picture>
        <div class="text">
            <div>
                {!! $slide->content !!}
            </div>
        </div>
    </div>
    @endforeach
    </div>
    <div class="arrow right">
            <span class="fas fa-angle-right"></span>
    </div>
</div>
@endif
@if (count($programs) > 0)
<section>
    <h2 class="titulo center">PROGRAMAS DE ESTUDIO</h2>
    <div class="services">
        <div class="images">
            @foreach ($programs as $key => $item)
            <div class="image {{ $key == 0 ? 'active' : '' }}">
                <div class="content">
                    <div class="text">
                        {!! $item['banner'] == null ? '<h2>'.$item['name'].'</h2>' : $item['banner']->content !!}
                    </div>
                    <div class="button">
                        <a href="{{ route('web.program', $item['slug']) }}">Ver m&aacute;s</a>
                    </div>
                    <div class="hashtag">
                        #CreceIsatec
                    </div>
                </div>
                <div class="picture">
                    @if ($item['banner'] != null)
                    <div class="bg-circle"></div>
                    <picture>
                            <source class="lazy" data-srcset="{{ asset('storage/images/'.$item['banner']->image->webp)}}" type="image/webp">
                            <source class="lazy" data-srcset="{{ asset('storage/images/'.$item['banner']->image->url)}}" type="image/{{ $item['banner']->image->extension }}">
                            <img class="lazy" data-src="{{ asset('storage/images/'.$item['banner']->image->url)}}" alt="{{ \Illuminate\Support\Str::slug(strip_tags(\Illuminate\Support\Str::words($item['banner']->content, 15,'')))  }}">
                    </picture>
                    @endif

                </div>

            </div>
            @endforeach
        </div>
        <ul class="buttons">
            @foreach ($programs as $key => $item)
        <li class="{{ $key == 0 ? 'active' : '' }}"><i class="fas fa-circle"></i>{{ $item['name'] }}</li>
            @endforeach
        </ul>
    </div>
</section>
@endif
@if ($bienvenida != null)
<section class="space-evenly">
    <div class="content welcome">
        <h2 class="titulo">{{ $bienvenida->title }}</h2>
        <div class="subcontent">
            <div class="content-aux">
                @if ($bienvenida->subtitle !== '')
                <h3>{{ $bienvenida->subtitle }}</h3>
                @endif
                <div class="text">
                    {!! $bienvenida->content !!}
                </div>
            </div>
        </div>
        @if (count($reconocimientos) > 0)
        <h2 class="titulo">¿POR QU&Eacute; NOSOTROS?</h2>
        <div class="subcontent reconocimientos">
            @foreach ($reconocimientos as $item)
            <div class="reconocimiento">
                <div class="image">
                    <picture>
                        <source class="lazy" data-srcset="{{ asset('storage/images/'.$item->image->webp) }}" type="image/webp">
                        <source class="lazt" data-srcset="{{ asset('storage/images/'.$item->image->url) }}" type="image/{{ $item->image->extension }}" >
                        <img class="lazy" data-src="{{ asset('storage/images/'.$item->image->url) }}" >
                    </picture>
                </div>
                <div class="content-aux">
                <h3>{{ $item->title }}</h3>
                <div class="text">
                    {!!  strip_tags(\Illuminate\Support\Str::words($item->content, 15,'...')) !!}
                </div>
                <a href="">Leer m&aacute;s</a>
                </div>
            </div>
            @endforeach
            <a href="">Ver m&aacute;s logros</a>
        </div>
        @endif
    </div>
    <div class="content space-evenly" style="max-width:400px;">
        <h2 class="titulo">FACEBOOK ISATEC</h2>
        <div class="subcontent fb no-mobile">
            @if ($facebook !== null && $facebook->value != '')
            <div class="fb-page" data-href="{{$facebook->value }}" data-tabs="timeline" data-width="400px" data-height="550px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="{{$facebook->value }}" class="fb-xfbml-parse-ignore"><a href="{{$facebook->value }}">Isatec</a></blockquote>
            </div>
            @endif
        </div>
        {{-- <div class="subcontent transparencia">
            <a href=""><h2>TRANSPARENCIA ISATEC</h2></a>
        </div>
        <div class="subcontent comunidad">
            <h2>COMUNIDAD ISATEC</h2>
            <div class="box">
                <div class="item-comunidad">
                    <div class="link">
                        <a href="">GALER&Iacute;A FOTOS</a>
                    </div>
                </div>
                <div class="item-comunidad">
                    <div class="link">
                        <a href="">GALER&Iacute;A VIDEOS</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="subcontent convocatoria">
            <a href=""><h2>CONVOCATORIA DOCENTE</h2></a>
        </div> --}}
    </div>
</section>
@endif
@if (count($publicaciones) > 0)
<section>
    <h2 class="titulo center">BLOG ISATEC</h2>
    <ul class="posts">
        @foreach ($publicaciones as $item)
        <li>
            <div class="image">
                <a href="{{ route('web.post', ['publicaciones',$item->id]) }}">
                    <picture>
                        <source class="lazy" data-srcset="{{ asset('storage/images/'.$item->image->webp)}}" type="image/webp">
                        <source class="lazy" data-srcset="{{ asset('storage/images/'.$item->image->url)}}" type="image/{{ $item->image->extension }}">
                        <img class="lazy" data-src="{{ asset('storage/images/'.$item->image->url)}}" alt="{{ \Illuminate\Support\Str::slug(strip_tags(\Illuminate\Support\Str::words($item->content, 15,'')))  }}">
                    </picture>
                </a>
            </div>
            <div class="content">
                <div class="text">
                <a href="{{ route('web.post', ['publicaciones',$item->id]) }}"><h3 class="titulo-post">{{ $item->title}}</h3></a>
                <div>
                    {{ strip_tags(\Illuminate\Support\Str::words($item->content, 15,'...'))  }}
                </div>
                </div>
                <div class="button">
                    <a href="{{ route('web.post', ['publicaciones',$item->id]) }}">Leer m&aacute;s &nbsp;<i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
            <div class="footer-post">
                {{ $item->day() }}&nbsp;{{ $item->monthAndYear() }}
            </div>
        </li>
        @endforeach
    </ul>
</section>
@endif
@endsection
@section('archivojs')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    var tiempo = 7000;

    var interizq =setInterval(function(){
      izquierda();
    },tiempo);
    clearInterval(interizq);

    var interder =setInterval(function(){
     derecha();
    },tiempo);

    function recorrer(){
      estado=false;

      var elementos = $('.slides-box .slide');
      var cont=0;
      $.each(elementos,function(){
        cont++;
      })

      if(cont>1){estado=true};

      return estado;
    }
   $(document).on('click','.arrow.right',function(){
      clearInterval(interizq);
      clearInterval(interder);
      derecha();
   });

    $(document).on('click','.arrow.left',function(){
        clearInterval(interizq);
        clearInterval(interder);
        izquierda();
    });
    function derecha(){
        if (recorrer()) {
            var elementos = $('.slides-box .slide');
            var total=0;
            var actual=0;
            var sgte=0;
            $.each(elementos,function(){
                total++;
                var clase= $(this).attr('class');
                if (clase.indexOf("active") != -1) {
                sgte = parseInt($(this).index())+parseInt(1);
                actual = parseInt($(this).index());
                }
                $(this).removeClass('active');
            })
            if (sgte==total) {
                sgte=0;
            }
            $.each(elementos,function(){

                if ($(this).index()==actual) {
                    $(this).animate({right:"100%"},700);
                }
                if ($(this).index()==sgte) {
                    $(this).css('right','-100%');
                    $(this).addClass('active');
                    $(this).animate({right:"0%"},700);
                }
        });

        clearInterval(interizq);
        clearInterval(interder);
        interder =setInterval(function(){
            derecha();
        },tiempo);
        }
   }

   function izquierda(){
        if(recorrer()){
            var elementos = $('.slides-box .slide');
            var total=0;
            var actual=0;
            var sgte=0;
            $.each(elementos,function(){
                total++;
                var clase= $(this).attr('class');
                if (clase.indexOf("active") != -1) {

                sgte = parseInt($(this).index())-parseInt(1);
                actual = parseInt($(this).index());

                }
                $(this).removeClass('active');
            })
            if (sgte==-1) {
                sgte=total-1;
            }

            $.each(elementos,function(){
                if ($(this).index()==actual) {
                $(this).animate({right:"-100%"},700);
                }
                if ($(this).index()==sgte) {
                $(this).css('right','100%');
                $(this).animate({right:"0%"},700);
                $(this).addClass('active');
                }
            })


            clearInterval(interizq);
            clearInterval(interder);
            interizq =setInterval(function(){
                izquierda();
            },tiempo);
            }
    }

    var services_int = setInterval(function(){
        services_next();
    },tiempo);
    // clearInterval(services_int);
    function run_service(){
        estado=false;

        var elementos = $('section .services .buttons li');
        var cont=0;
        $.each(elementos,function(){
            cont++;
        })

      if(cont>1){estado=true};

      return estado;
    }

    function services_next(){
        if (run_service()) {
            var elementos = $('section .services .buttons li');
            var images = $('section .services .images');
            var total=0;
            var actual=0;
            var sgte=0;
            $.each(elementos,function(){
                total++;
                var index = $(this).index();
                var clase= $(this).attr('class');
                if (clase.indexOf("active") != -1) {
                sgte = parseInt($(this).index())+parseInt(1);
                actual = parseInt($(this).index());
                images.children().eq(index).removeClass('active');
                }
                $(this).removeClass('active');
            })
            if (sgte==total) {
                sgte=0;
            }
            $.each(elementos,function(){
                var index = $(this).index();
                if (index==sgte) {
                    $(this).addClass('active');
                    images.children().eq(index).addClass('active');
                }
        });

        clearInterval(services_int);
        services_int = setInterval(function(){
            services_next();
        },tiempo);
        }
    }


    $(document).on('click','section .services .buttons li',function(){

        if(!$(this).hasClass('active')){
            var index = $(this).index();
            var images = $('section .services .images');
            var elementos = $('section .services .buttons li');
            $.each(elementos,function(){
                var aux = $(this).index();
                $(this).removeClass('active');
                images.children().eq(aux).removeClass('active');
            })
            elementos.parent().children().eq(index).addClass('active');
            images.children().eq(index).addClass('active');
            clearInterval(services_int);
            services_int = setInterval(function(){
                services_next();
            },tiempo);
        }
    });




  </script>
@endsection
