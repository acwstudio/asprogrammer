<!-- Intro -->
<article id="intro">
    <h2 class="major">{{ $site->intro->title }}</h2>
    <span class="image main">
        <img src="{{ asset('dim/images/intros') . '/' . $site->intro->image }}" alt="" />
    </span>
    <p>{!! $site->intro->text !!}</p>
    <p>{{ $site->intro->description }}</p>
</article>