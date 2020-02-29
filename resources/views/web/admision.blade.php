@extends('template.web')
@section('title','ADMISIÓN')
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
    section form select{width: calc(100% - 2em); padding: 1em; border: none; border-radius: 6px; color: #222;}
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
    <h2 class="text-center mb">Participa de nuestro proceso de admisi&oacute;n. <br>Estaremos esperando a que te pongas en contacto con nosotros.</h2>
    <div class="form">
        <div class="image">
            <picture>
                <source class="lazy" data-srcset="{{ asset('images/admision.webp') }}"
                    type="image/webp">
                <source class="lazy" data-srcset="{{ asset('images/admision.jpg') }}"
                    type="image/jpg">
                <img class="lazy" data-src="{{asset('images/admision.jpg') }}"
                    alt="admision">
            </picture>
        </div>
        <div class="form-box">
            <h2>LLENE NUESTRO FORMULARIO</h2>
            <br>
            <form id="preregister">
                <div class="data-option">
                    <input type="text" name="name" placeholder="Nombre">
                </div>
                <div class="data-option">
                    <input type="text" name="lastname"  placeholder="Apellido Paterno">
                </div>
                <div class="data-option">
                    <input type="text" name="mothers_lastname"  placeholder="Apellido Materno">
                </div>
                <div class="data-option">
                    <input type="text" name="email"  placeholder="Email">
                </div>
                <div class="data-option">
                    <select name="type_phone" id="">
                        <option value="">TIPO DE TELEFONO</option>
                        <option value="2">Cel</option>
                        <option value="1">Dom.</option>
                        <option value="3">C.Lab</option>
                    </select>
                </div>
                <div class="data-option">
                    <input type="text" name="phone" placeholder="Teléfono/Celular">
                </div>
                <div class="data-option">
                    <select name="sex" id="">
                        <option value="">SEXO</option>
                        <option value="Masculino">MASCULINO</option>
                        <option value="Femenino">FEMENINO</option>
                    </select>
                </div>
                <div class="data-option">
                    <select name="turn_id" id="">
                        <option value="">TURNO</option>
                        <option value="1">MAÑANA</option>
                        <option value="2">TARDE</option>
                        <option value="3">NOCHE</option>
                    </select>
                </div>
                <div class="data-option">
                    <select name="program_id">
                        <option value="">CARRERA</option>
                        @foreach ($admision['programs_cycle'] as $item)
                    <option value="{{ $item['id'] .'xx'.$item['curricular_plan_id']}}">{{ $item['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="data-option">
                    <select name="type_identification" id="">
                        <option value="">TIPO DE DOCUMENTO DE IDENTIFICACION</option>
                        <option value="4">DNI</option>
                        <option value="1">Part. Nac</option>
                        <option value="2">B/IM</option>
                        <option value="3">LM</option>
                    </select>
                </div>
                <div class="data-option">
                    <input type="text" name="identification_number" placeholder="NÚMERO DE IDENTIFICACION">
                </div>
                <input type="hidden" name="cycle_id" value="{{$admision['id']}}">
                <div class="data-option">
                    <button type="submit" class="enviar">Enviar</button>
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
    function reset_form(){
        $('form#preregister')[0].reset();
    }
</script>
<script src="{{asset('/js/ajax.js')}}"></script>
@endsection
