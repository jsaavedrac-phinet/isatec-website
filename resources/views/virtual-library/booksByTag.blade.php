@extends('template.virtual-library')
@section('title','Libros Físicos filtrados por '. $tag->name)
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

    a{text-decoration: none; color: var(--main_color)}
    .modal{position: fixed;top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,.7); z-index: 999; display: none; justify-content: center; align-items: center;}
    .data-modal{width: calc(100% - 2em); max-width: calc(700px - 2em); padding: 1em; background: #FFF; max-height: calc(100vh - 4em); overflow-x:hidden; overflow-y: auto;}
    .image-modal{width: calc(100% -2em); text-align: center;}
    .image-modal img{width: auto; height: auto; max-width: 100%; max-height: 450px;}
    .button-modal{position: absolute; top: 1em; right: 1em; color: #FFF; cursor: pointer; text-decoration: underline; letter-spacing: 2px;}
    .text-modal h2{color: var(--main_color)}
    .book-list{display: flex; justify-content: space-evenly;}
    .book-list table{ margin: 0 1em;width: calc(100% - 250px  - 4em); background: #FFF;  border:2px dashed #333;}
    .book-list table thead tr th{background: var(--principal); color: #FFF;padding: 1em;}
    .book-list table tbody tr td{padding: 5px 7px;background: #cfcfcf;}
    .book-list table tbody tr:nth-of-type(2n+2) td{background: #fcfcfc;}
    .breadcrumb{width: calc(100% - 4em); margin: 0 1em; padding: 1em; border-radius: 12px; background: var(--principal); color: #FFF; display: flex;}
    .breadcrumb a{position: relative;text-decoration: underline; margin: 0 0.5em;}
    .breadcrumb a::after{content: "/"; position: absolute; left: calc(100% + 0.45em);}
    .breadcrumb .current{ font-weight: bold; margin-left: 1em; text-transform: capitalize; letter-spacing: 2px; cursor: default;}
    .tag-list{width: 250px; height: 500px; background: orange; border-radius: 12px; padding: 1em;}
    .tag-list a{display: inline-block; width: 100%; margin-top: 20px;text-transform: uppercase}
    @media (max-width: 769px){
        section{width: calc(100% - 2em); padding: 2em 1em;}
        section .image{margin: 1em 0;}
        .tag-list{display: none;}
    }
</style>
@endsection
@section('content')
<div class="breadcrumb">
    <a href="{{ route('virtual-library.index') }}">Inicio</a>
    <a href="{{ route('virtual-library.books') }}">Libros F&iacute;sicos</a>
<div class="current"> {{ $tag->name }}</div>
</div>
<section class="book-list">
<div class="tag-list">
    <h2 class="text-center">TEM&Aacute;TICAS</h2>
    @foreach ($tags as $item)
    <a href="{{ route('virtual-library.booksByTag', $item->id) }}">{{ $item->name }} ({{ $item->total}})</a>
    @endforeach
</div>
<table>
    <thead>
        <tr>
            <th>TITULO</th>
            <th>AUTOR</th>
            <th>TOTAL</th>
            <th>DISPONIBLES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td> {{ $book->title }}</td>
            <td> {{ $book->author }}</td>
            <td> {{ $book->total}}</td>
            <td> {{ $book->available }}</td>
        </tr>
        @endforeach
    </tbody>

</table>

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
