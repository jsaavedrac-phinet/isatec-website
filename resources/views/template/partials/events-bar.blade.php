<div class="events">
        <h4 class="text-center">@lang('messages.events')</h4>
        @if (count($events))
        @foreach ($events as $event)
        <div class="event">
            <div class="image">
                    <a href="{{ route('web.event', [$type,$event->id]) }}">
                        <picture>
                        <source class="lazy" data-srcset="{{ asset('storage/images/'.$event->image->webp) }}" type="image/webp">
                        <source class="lazy" data-srcset="{{ asset('storage/images/'.$event->image->url) }}" type="image/{{$event->image->extension}}">
                        <img class="lazy" data-src="{{asset('storage/images/'.$event->image->url) }}" alt="{{ $event->slug }}" >
                        </picture>
                    </a>
            </div>
            <div class="text">
                <a href="{{ route('web.event', [$type,$event->id]) }}"><h5>{{ $event->translateOrDefault(\App::getLocale())->title}}</h5></a>
                <p> {{ $event->carbonDate($event->start_date)}} - {{$event->carbonDate($event->end_date)}} </p>
            </div>
        </div>
        @endforeach

        @else
        <h3>@lang('messages.no-events')</h3>
        @endif
    </div>
