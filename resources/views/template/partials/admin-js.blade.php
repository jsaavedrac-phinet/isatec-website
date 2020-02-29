<script src="{{asset('/js/jquery.min.js')}}" ></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    error: function (x, status, error) {
            if (x.status == 413) {
            var error ="El archivo que intenta subir es demasiado grande";
            swal("Error",error,"error");
            }else if (x.status == 405) {
            var error ="La ruta no esta bien definida";
            console.log("ERROR" + x.status,error);
            }
            else{
            console.log("ERROR",x.status) ;
            }

        }
});
</script>
<script type="text/javascript">
	$('.nav-parent').click(function(){

		var ol = $(this).find('ol');
		var hijos = ol.children().length;
		var altura = hijos*34.5;
		// console.log("altura",altura);
		if (!ol.hasClass('expanded')) {
			$(this).css('padding-bottom',"0px");
			// console.log("mostrar");
			$(this).find('.icon-arrow-down').removeClass('icon-arrow-down').addClass('icon-arrow-up');
			ol.animate({height: altura+"px"},500,function(){
			$(this).addClass('expanded');
			});
		}else{
			$(this).css('padding-bottom',"0.5em");
			// console.log("ocultar");
			$(this).find('.icon-arrow-up').removeClass('icon-arrow-up').addClass('icon-arrow-down');
			ol.animate({height: "0px"},500,function(){
				$(this).removeClass('expanded');
			});
		}

	});

	$('header .menu-user-container .avatar').click(function(){
		$('header .menu-user-container .menu-user').toggleClass('extended');
	});
	$('header .icono-menu').click(function(){
		$('header').toggleClass('extended');
		$('nav').toggleClass('extended');
		$('.contenedor').toggleClass('extended');
	})

	$('nav ul li ol li').hover(
		  function() {
		    $( this ).parent().css('overflow','initial');
		  }, function() {
		    $( this ).parent().css('overflow','hidden');
		  }
	);


</script>
<script src="{{asset('/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script type="text/javascript">
	if (localStorage.getItem('mensaje')!=undefined && localStorage.getItem('mensaje')!="") {
			let mensaje = localStorage.getItem('mensaje');
			localStorage.removeItem('mensaje');
			Swal.fire('Proceso Completado',mensaje,'success');
	}
</script>
@yield('js')
