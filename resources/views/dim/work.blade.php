<!-- Work -->
<article id="work">
    <h2 class="major">{{ $site->work->title }}</h2>
    <span class="image main"><img src="{{ asset('dim/images/pic02.jpg') }}" alt="" /></span>
    <p>{{ $site->work->text }}</p>
    <p>{{ $site->work->description }}</p>
</article>