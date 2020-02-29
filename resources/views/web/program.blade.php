@extends('template.web')
@section('title', $program['name'])
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
    section:nth-of-type(2n+2) .content{order: 2}
    section:nth-of-type(2n+2) .image{order: 1}
    section .content{width: calc(100% - 2em); max-width: calc(600px - 2em); display: flex; flex-direction: column; flex-wrap: wrap; justify-content: flex-start;}
    section h2{font-size: 2em; color: var(--main_color); width: 100%; margin:1em 0;}
    section h3{font-size: 2.5em; font-weight: bolder; margin: 0.5em 0; width: 100%;}
    section h4, section h5, section h6{width: 100%; margin: 1em 0;}
    section .text-center{text-align: center;}
    section .text{font-weight: 300; color: inherit}
    section .image{width: calc(100% - 2em); max-width: calc(600px - 2em); text-align: center; overflow: hidden;}
    section .image.image-rounded{border-radius: 15px;}
    section .image img{width: auto; height: auto; max-width: 100%;}

    .button{width: 100%; display: flex; justify-content: flex-end; padding:  1em 0;}
    .button a{text-decoration: none; cursor: pointer; border-radius: 24px; background: var(--main_color); color: #FFF; padding: 1em; font-weight: bolder; color:  var(--highlight_color)}

    section .subsection{width: 100%; margin: 1em 0;}
    .modules{display: flex; flex-wrap: wrap; justify-content: space-evenly;}
    .modules .module{width: calc(100% - 2em); padding:  0 1em;}
    .modules .module h4{color: var(--main_color); background: #FFF; padding: 1em; width: calc(100% - 2em); margin-bottom: 1em; letter-spacing: 0.5em;text-align: center;}
    .modules .module .periods{display: flex; width: 100%; flex-wrap: wrap; justify-content: space-evenly;}
    .modules .module .periods .period{width: calc(100% - 2em); max-width: calc(500px - 2em); padding: 0 1em;}
    #transversales .modules .module{max-width: calc(300px - 2em);border: 2px solid var(--main_color); margin-top: 2em; padding: 1em 0;}
    .modules .module ul.teaching_units{display: block;}
    #transversales .modules .module ul.teaching_units {list-style: none; width: calc(100% - 2em); padding: 0 1em;}
    #transversales .modules .module ul.teaching_units li h5{font-weight: bold; font-size: 1.2em;text-decoration: underline; letter-spacing: 2px;}
    #transversales .modules .module ul.teaching_units li div{font-size: 0.9em;}

    .duration{background: #262626; color: #FFF; padding: 1em; min-width: 350px;}
    @media (max-width: 769px){
        section{width: calc(100% - 2em); padding: 2em 1em;}
        section .image{margin: 1em 0;}
        .duration{margin: 1em 0;}
    }
</style>
@endsection
@section('content')
<section>
    <div class="content">
        <h2>{{ $program['name'] }}</h2>
        <div class="text">
            {!! $program['presentation'] !!}
        </div>
    </div>
    <div class="duration">
        <h3>DURACI&Oacute;N</h3>
        <div>{{ $program['number_years'] }} años ({{ $program ['number_cycles'] }} ciclos acad&eacute;micos)</div>
        @if (count($schedules) > 0)
            <h4>HORARIOS</h4>
            @foreach ($schedules as $schedule)
            <h5>Turno {{ $schedule['description'] }}</h5>
             @foreach ($schedule['hours'] as $key => $hour)
                @if ($key == 0)
                <div class="hour"> {{ $hour['initial_hour'] }} -
                @endif
                @if ($key == count($schedule['hours']) - 1)
                {{ $hour['final_hour']}} </div>
                @endif

             @endforeach
            @endforeach
        @endif
    </div>
</section>
<section id="tecnicos">
    @if (count($modules['modulos_tecnico_profesionales']) > 0)
    <h2>MODULOS TECNICOS PROFESIONALES</h2>
    <div class="modules">
        @foreach ($modules['modulos_tecnico_profesionales'] as $item)
        <div class="module">
        <h4>{{ $item['description'] }}</h4>
        <div class="periods">
            @foreach ($item['periods'] as $period)
                <div class="period">
                <h5>CICLO {{ $period['roman'] }}</h5>
                <ul class="teaching_units">
                    @foreach ($period['teaching_units'] as $teaching_unit)
                <li>{{ $teaching_unit['description'] }}</li>
                    @endforeach
                </ul>
                </div>
            @endforeach
        </div>
        </div>
        @endforeach
    </div>
    @endif

</section>
{{-- <section id="transversales">
    @if (count($modules['modulos_transversales']) > 0)
    <h2>MODULOS TRANSVERSALES</h2>
    <div class="modules">
        @foreach ($modules['modulos_transversales'] as $item)
        <div class="module">
        <h4>{{ $item['description'] }}</h4>
        <ul class="periods teaching_units">
            @foreach ($item['periods'] as $period)
                @foreach ($period['teaching_units'] as $teaching_unit)
                <li>
                    <h5>CICLO {{ $period['roman'] }}</h5>
                    <div>{{ $teaching_unit['description'] }}</div>
                </li>
                @endforeach
            @endforeach
        </ul>
        </div>
        @endforeach
    </div>
    @endif

</section> --}}






@endsection
