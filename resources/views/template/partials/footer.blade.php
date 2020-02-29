<footer>
    <div class="settings-box">
        <div class="logo-footer settings-option">
            <div class="data-logo">
                <div class="image">
                   <picture>
                       <source class="lazy" data-srcset="{{ asset('images/logo-gris.webp')}}" type="image/webp">
                       <source class="lazy" data-srcset="{{ asset('images/logo-gris.png')}}" type="image/png">
                       <img class="lazy" data-src="{{ asset('images/logo-gris.png')}}">
                   </picture>
                </div>
                <div class="year">
                    {{ date('Y') }}
                </div>
            </div>
            <div class="data-contact">
               <div>
                   @if ($direccion != null && $direccion->value != '')
                   <div class="contact-option">{{$direccion->value}}</div>
                   @endif
                   @if ($telefono != null && $telefono->value != '')
                   <div class="contact-option">{{$telefono->value}}</div>
                   @endif
                   @if ($correo != null && $correo->value != '')
                   <div class="contact-option" style="font-size: 0.8em !important;margin-top:1em">{{$correo->value}}</div>
                   @endif
               </div>
            </div>
        </div>
       <div class="menu-footer settings-option">
           <ul>
               <li><a href="">INSTITUCIONAL</a></li>
               <li><a href="">PROGRAMAS DE ESTUDIO</a></li>
               <li><a href="">FORMACI&Oacute;N CONTINUA</a></li>
               <li><a href="">CURSOS CORTOS</a></li>
               <li><a href="">CONTACTO</a></li>

               {{-- @if (count($servicios) > 0)
               <li class="{{ active('web.service') }}"><a href="{{ route('web.service',$servicios[0]->slug) }}">SERVICIOS</a></li>
               @endif --}}

           </ul>
       </div>
       <div class="contact-us settings-option">
           <div>
               <h3>Redes Sociales</h3>
               <div class="social-networks">
                   @if ($facebook != null && $facebook->value != '')
                   <div class="contact-option">
                       <a href="{{$facebook->value}}" target="_blank"><i class="fab fa-facebook"></i></a>
                   </div>
                   @endif
                   @if ($youtube != null && $youtube->value != '')
                   <div class="contact-option">
                   <a href="{{ $youtube->value }}" target="_blank"><i class="fab fa-youtube"></i></a>
                   </div>
                   @endif
               </div>
               <div class="website">
                   www.isatec.edu.pe
               </div>
           </div>
       </div>
    </div>
   <div class="fullbox">
       ASP (Application Service Provider) :&nbsp;<a href="https://www.phinet.com/" target="_blank">Phinet</a>
   </div>
</footer>
