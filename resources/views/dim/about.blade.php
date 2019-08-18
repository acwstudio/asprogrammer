<!-- About -->
<article id="about">
    <h2 class="major">{{ $site->about->title }}</h2>
    <span class="image main"><img src="{{ asset('dim/images/pic03.jpg') }}" alt="" /></span>
    <p>{{ $site->about->text }}</p>
    <p>{{ $site->about->description }}</p>
</article>