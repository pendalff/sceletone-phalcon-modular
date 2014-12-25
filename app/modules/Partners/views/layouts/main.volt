<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    {{ getTitle() }}
    {{ assets.outputCss('headerCss') }}
    {{ assets.outputJs('headerJs') }}
    <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
</head>
<body>
<div id="wrapper">
    <header id="header">
        <div class="container-center">
            <div class="header-panel">
                <a class="logo" href="{{ url.get({'for':'partners.home'}) }}">&nbsp;</a>
                <form action="#" class="search-form">
                    <fieldset>
                        <div class="row">
                            <a class="login" href="#">Вход</a>
                            <a class="reg" href="#">Регистрация</a>
                        </div>
                        <div class="search-row hidden">
                            <input class="text form-control" type="text" value="" placeholder="Поиск" />
                            <input class="btn" type="submit" value="" />
                        </div>
                    </fieldset>
                </form>
            </div>
        {{ partial('partials/main_menu') }}
        </div>
    </header>
    <div id="main">
            {{ content() }}
    </div>
</div>
<footer id="footer">
    <div class="container-center">
        <hr />
        {{ partial('partials/main_menu') }}
        <hr />
        <div class="row">
            <div class="copyright">&copy; {{ year }} Партнерская программа work5.ru<br />Все права защищены. Любое копирование материалов сайта только с письменного соглашения администрации!</div>
            <ul class="network-list">
                <li><a class="vk" href="#"></a></li>
                <li><a class="fb" href="#"></a></li>
                <li><a class="tw" href="#"></a></li>
            </ul>
            <div class="holder">
                <ul class="payment-list">
                    <li><a href="#"><img src="/img/partners/ico_ya.png" width="100" height="46" alt="" /></a></li>
                    <li><a href="#"><img src="/img/partners/ico_wb.png" width="113" height="33" alt="" /></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>