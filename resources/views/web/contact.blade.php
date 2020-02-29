@extends('template.web')
@section('title','Contacto')
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
    section .image{width: calc(100% - 2em); max-width: calc(700px - 2em); text-align: center; overflow: hidden; display: flex; justify-content: center; align-items: center;}
    section .image.image-rounded{border-radius: 15px;}
    section .image img{width: auto; height: auto; max-width: 100%;}
    section ul{width: 100%; display: flex; justify-content: space-evenly; flex-wrap: wrap; margin-top: 2em;}
    section ul li{margin: 0.3em 0; width: calc(100% - 2em); max-width: calc(300px - 2em); text-align: center; list-style: none;}
    section ul li img{width: auto; height: auto; max-width: 150px; max-height: 150px;}
    section ul li .text{margin-top: 1em; font-weight: 300; font-weight: bold; color: inherit}
    .button{width: 100%; display: flex; justify-content: flex-end; padding:  1em 0;}
    .button a{text-decoration: none; cursor: pointer; border-radius: 24px; background: var(--main_color); color: #FFF; padding: 1em; font-weight: bolder; color:  var(--highlight_color)}

    section .subsection{width: 100%; margin: 1em 0;}
    section form{width: calc(100% - 2em); padding: 0.5em 1em; background: var(--highlight_color); max-width: calc(500px - 2em); border-radius: 8px;}
    section form .data-option{margin: 1em 0;}
    section form *{box-sizing: content-box;}
    section form label{width: 100%; display: block;margin-bottom: 0.5em; font-weight: 900;letter-spacing: 2px; font-size: 1.2em;}
    section form input{width: calc(100% - 2em); padding: 1em; border: none; border-radius: 6px;}
    section form button{width: calc(100% - 2em); padding: 1em; border: none; border-radius: 6px; background: var(--secondary_color); color: #FFF; font-size: 1.5em; text-transform: uppercase; letter-spacing: 2px;}
    section form textarea{width: calc(100% - 2em); padding: 1em; border: none; border-radius: 6px; min-width: calc(100% - 2em); max-width: calc(100% - 2em); height: 100px; min-height: 100px; max-height: 100px;}
    .mb{margin-bottom: 2em;}
    .form{background: var(--content-bg); width: calc(100% - 2em); margin:0 auto; border-radius: 6px; display: flex; flex-wrap: wrap; justify-content: space-evenly; padding: 2em 1em;}
    @media (max-width: 769px){
        section{width: calc(100% - 2em); padding: 2em 1em;}
        section .image{margin: 1em 0;}
    }
</style>
@endsection
@section('content')
<section>
    <h2 class="text-center mb">Estamos aqu&iacute; para ayudarte y atender tus dudas. <br>Estaremos esperando a que te pongas en contacto con nosotros.</h2>
    <div class="form">
        <div class="image">
            <picture>
                <source class="lazy" data-srcset="{{ asset('images/contact.webp') }}"
                    type="image/webp">
                <source class="lazy" data-srcset="{{ asset('images/contact.jpg') }}"
                    type="image/jpg">
                <img class="lazy" data-src="{{asset('images/contact.jpg') }}"
                    alt="contacto">
            </picture>
        </div>
        <div class="form-box">
            <h2>LLENE NUESTRO FORMULARIO</h2>
            <br>
            <form>
                <div class="data-option">
                    <input type="text" name="name" id="name" placeholder="Nombre">
                </div>
                <div class="data-option">
                    <input type="text" name="email" id="email" placeholder="Email">
                </div>
                <div class="data-option">
                    <textarea name="message" id="message" placeholder="Mensaje"></textarea>
                </div>
                <div class="data-option">
                    <button type="button" class="enviar">Enviar</button>
                </div>
            </form>
        </div>

    </div>
</section>
@endsection
@section('archivojs')
<script src="{{asset('/js/jquery.min.js')}}" ></script>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    error: function (x, status, error) {
        console.log("x",x);
        console.log("status",status);
        console.log("error",error);
            if (x.status == 413) {
            var error ="El archivo que intenta subir es demasiado grande";
            swal("Error",error,"error");
            }else if (x.status == 405) {
            var error ="La ruta no esta bien definida";
            console.log("ERROR" + x.status,error);
            }
            else{
            // swal("Error", "error:"+x.status,"error");
            console.log("ERROR",x.status) ;
            }

        }
});
</script>
<script src="{{asset('/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script type="text/javascript">
	if (localStorage.getItem('mensaje')!=undefined && localStorage.getItem('mensaje')!="") {
			let mensaje = localStorage.getItem('mensaje');
			localStorage.removeItem('mensaje');
			Swal.fire('Proceso Completado',mensaje,'success');
	}
</script>
<script>
    function validar(){
		$bool = false;

		if ($('#name').val() == "") {
			Swal.fire("Error","Escribir nombre","error");
		}else if ($('#email').val() == "") {
			Swal.fire("Error","Escribir email","error");
		}else if($('#message').val()==""){
			Swal.fire("Error","Escribir la consulta","error");
		}else{
			$bool =true;
		}


		return $bool;
    }
$(document).on('click','.enviar',function(){

if (validar()) {
    var data = new FormData();
    data.append('nombre',$('#name').val());
    data.append('email',$('#email').val());
    data.append('mensaje',$('#message').val());


    $.ajax({
        url:window.location.href,
        type:"post",
        data:data,
        contentType:false,
        processData:false,
        cache:false,
        beforeSend:function(){
              Swal.fire({ title: "Enviando email...",text: "Por favor, espere",showConfirmButton: false});
         }
    })
    .done(function(data){
        if (data.rpta != "1") {
            Swal.fire("Error","No se pudo enviar el mensaje","error");
        }else{
            $('#name').val('');
            $('#email').val('');
            $('#message').val('');
            Swal.fire("Éxito","Se ha enviado el email","success");
        }
    });
}
});
</script>
@endsection
