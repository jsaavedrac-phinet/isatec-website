<div class="events">
        <h4 class="text-center">@lang('messages.posts')</h4>
        @if (count($posts))
        @foreach ($posts as $post)
        <div class="event">
            <div class="image">
                    <a href="{{ route('web.post', [$type,$post->id]) }}" >
                        <picture>
                        <source class="lazy" data-srcset="{{ asset('storage/images/'.$post->image->webp) }}" type="image/webp">
                        <source class="lazy" data-srcset="{{ asset('storage/images/'.$post->image->url) }}" type="image/{{$post->image->extension}}">
                        <img class="lazy" data-src="{{asset('storage/images/'.$post->image->url) }}" alt="{{ $post->slug }}" >
                        </picture>
                    </a>
            </div>
            <div class="text">
                <a href="{{ route('web.post', [$type,$post->id]) }}"><h5>{{ $post->translateOrDefault(\App::getLocale())->title}}</h5></a>
                <p> {{ $post->carbonDate($post->start_date)}}</p>
            </div>
        </div>
        @endforeach

        @else
        <h3>@lang('messages.no-posts')</h3>
        @endif
    </div>
