<!-- Header -->
<header id="header">
    <div class="logo">
        <a href="{{ route('home') }}"><span class="icon {{ $site->header->icon }}"></span></a>
        {{--<span class="fab fa-laravel fa-2x"></span>--}}
    </div>
    <div class="content">
        <div class="inner">
            <h1>{{ $site->header->title }}</h1>
            <p>{{ $site->header->text }}</p>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="#intro">{{ $site->intro->title }}</a></li>
            <li><a href="#work">{{ $site->work->title }}</a></li>
            <li><a href="#about">{{ $site->about->title }}</a></li>
            <li><a href="#contact">{{ __('dimension.menu.contact') }}</a></li>
            <li>
                @foreach (config('translatable.locales') as $lang => $language)
                    @if ($lang != app()->getLocale())
                        <a href="{{ route('lang.switch', $lang) }}">
                            {{ $lang }}
                        </a>
                    @endif
                @endforeach
            </li>
        </ul>
    </nav>
</header>