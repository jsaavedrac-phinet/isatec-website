<div class="nav-bar">
    <div class="social">
        @if ($facebook !== null && $facebook->value != '')
            <a href="{{ $facebook->value }}" target="_blank"><i class="fab fa-facebook"></i></a>&nbsp;
        @endif
        @if ($youtube !== null && $youtube->value != '')
            <a href="{{ $youtube->value }}" target="_blank"><i class="fab fa-youtube"></i></a>
        @endif
    </div>
</div>
