<nav class="nav-wrap">
    <ul class="nav">
        <li {% if request.getURI() == url.get({'for':'partners.howMake'})  %}class="active"{% endif %}>
            <a href="{{ url.get({'for':'partners.howMake'}) }}">
                <span><i>Как заработать</i></span>
            </a>
        </li>
        <li {% if request.getURI() == url.get({'for':'partners.promo'})  %}class="active"{% endif %}>
            <a href="{{ url.get({'for':'partners.promo'}) }}">
                <span><i>Промоматериалы</i></span>
            </a>
        </li>
        <li {% if request.getURI() == url.get({'for':'partners.work5'})  %}class="active"{% endif %}>
            <a href="{{ url.get({'for':'partners.work5'}) }}">
                <span><i>Наш сайт</i></span>
            </a>
        </li>
        <li {% if request.getURI() == url.get({'for':'partners.top'})  %}class="active"{% endif %}>
            <a href="{{ url.get({'for':'partners.top'}) }}">
                <span><i>ТОП Вебмастеров</i></span>
            </a>
        </li>
        <li {% if request.getURI() == url.get({'for':'partners.faq'})  %}class="active"{% endif %}>
            <a href="{{ url.get({'for':'partners.faq'}) }}">
                <span><i>FAQ</i></span>
            </a>
        </li>
        <li {% if request.getURI() == url.get({'for':'partners.rules'})  %}class="active"{% endif %}>
            <a href="{{ url.get({'for':'partners.rules'}) }}">
                <span><i>Правила</i></span>
            </a>
        </li>
    </ul>
</nav>


