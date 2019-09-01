<!-- Contact -->
<article id="contact">
    <h2 class="major">{{ __('dimension.menu.contact') }}</h2>
    <div class="fields" id="acw_contact">
        <form method="post" id="contact_form" action="{{ route('send') }}">
            <div class="fields">
        {{ csrf_field() }}
        <!-- Honeypot -->
            <div id="pests_wrap" style="display: none;">

                <input type="text" name="pests" id="pests" value="" autocomplete="off">
                <input type="text" name="life_cycle" id="life_cycle" value="{{ $site->lifeCycle }}"
                       autocomplete="off">

            </div>

            <div class="field half">
                <label for="name">{{ __('dimension.contact.name') }}</label>
                <input type="text" name="name" id="name" autocomplete="off"/>
            </div>
            <div class="field half">
                <label for="email">{{ __('dimension.contact.email') }}</label>
                <input type="text" name="email" id="email" autocomplete="off"/>
            </div>
            <div class="field">
                <label for="message">{{ __('dimension.contact.message') }}</label>
                <textarea name="message" id="message" rows="4"></textarea>
            </div>
            </div>
            <ul class="actions">
                <li><input type="submit" form="contact-email" name="send" class="primary"
                           value="{{ __('dimension.contact.send') }}"/>
                </li>
                <li><input type="button" value="{{ __('dimension.contact.reset') }}"/></li>
            </ul>

        </form>
    </div>
    <ul class="icons">
        <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
    </ul>
</article>