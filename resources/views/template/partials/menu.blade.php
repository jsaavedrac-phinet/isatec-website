<ul>
    {{-- <li><a href="{{ route('web.home') }}" class="{{active('web.home') }}" >Inicio</a></li> --}}
<li><a class="{{ active('web.about') }}" href="{{ route('web.about') }}">NOSOTROS</a></li>
<li><a class="{{ active(['web.posts','web.post']) }}" href="{{ route('web.posts','publicaciones') }}">BLOG</a></li>
@if ($admision)
<li><a class="{{ active('web.admision') }}" href="{{ route('web.admision') }}">ADMISI&Oacute;N</a></li>
@endif
    @if (count($programs) > 0)
    <li><a class="{{ active('web.program') }} parent">PROGRAMAS DE ESTUDIO</a>
        <ol>
            @foreach ($programs as $program)
            <li><a href="{{ route('web.program', $program['slug']) }}">{{ $program['name'] }}</a></li>
            @endforeach
        </ol>
    </li>
    @endif

    {{-- <li><a>FORMACI&Oacute;N CONTINUA</a></li> --}}
    {{-- <li><a>CURSOS CORTOS</a></li> --}}
<li><a class="{{ active('web.contact') }}" href="{{ route('web.contact') }}">CONTACTO</a></li>
</ul>
