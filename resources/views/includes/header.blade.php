<header>
    <div class="container">
        <nav class="navigation_on_site">
            <div class="main_left">
                <div class="main_logo">
                    <a href="/">
                        <img src="/img/logo/main_logo.png" alt="">
                    </a>
                </div>
                <div class="main_navigation">
                    <ul>
                        <li><a href="{{route('orders')}}">{{ __('Заказы') }}</a></li>
                        <li><a href="{{route('freelancers')}}">{{ __('Фрилансеры') }}</a></li>
                        <li><a href="{{route('blog')}}">{{ __('Блог') }}</a></li>
                        <li><a href="{{route('portfolio')}}">{{ __('Портфолио') }}</a></li>
                        <li><a href="{{route('vacancy')}}">{{ __('Вакансии') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="main_right">
                <div class="login_register">
                    <ul>
                        <li class="login"><a href="{{route('loginIndex')}}">{{ __('Вход') }}</a></li>
                        <li class="register"><a href="{{route('registerIndex')}}">{{ __('Регистрация') }}</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
