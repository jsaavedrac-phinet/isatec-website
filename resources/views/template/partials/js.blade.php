<script type="text/javascript" src="{{ asset('plugins/lazyload/lazyload.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/carga_diferida.js') }}"></script>
<script type="text/javascript">
	var boton_menu = document.querySelector('.btn_menu');
	var cerrar_menu = document.querySelector('.btn-cerrar');

	cerrar_menu.addEventListener('click',function(){
		document.querySelector('.menu-mobile').style.display = 'none';
	});

	boton_menu.addEventListener('click',function(){
		document.querySelector('.menu-mobile').style.display = 'flex';
    });

    var locale = document.querySelectorAll('.locale');

    locale.forEach(function(element){
        element.addEventListener('click',function(){
           if(this.className.indexOf('active') === -1){
                const lang = this.getAttribute('locale');
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('/changeLocale', {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                    },
                method: 'post',
                credentials: "same-origin",
                body: JSON.stringify({
                    lang:lang
                })
                })
                .then((response) => {
                    return response.json();
                })
                .then(function(json){
                    if(json.current_locale === lang){
                       window.location.reload();
                    }
                })
                .catch(function(error) {
                    console.log(error);
                    });
                }
			});
        });
</script>
@yield('archivojs')
