
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>btstr</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body>
<div class="border"> <nav class="navbar bg-body-tertiary">
        <div class="container-fluid d-flex align-items-center">

            <div class="d-flex align-items-center me-3"> <a href="{{ route('cards.index') }}" class="d-flex align-items-center text-decoration-none text-dark">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Rockstar_Games_Logo.svg"
                         class="nav-logo me-2 ms-3 img-fluid" alt="Логотип сайта" style="height: 40px;">
                    <span class="navbar-brand h1 mb-0">Rockstar Games</span>
                </a>
            </div>

            <a href="{{ route('feed') }}" class="btn btn-outline-dark me-2">
                <i class="fas fa-rss"></i> Лента
            </a>

            <a href="{{ route('users.index') }}" class="btn btn-outline-primary me-2">
                <i class="fas fa-users"></i> Пользователи
            </a>

            @if(auth()->check() && auth()->user()->is_admin)
                <a href="{{ route('cards.trash') }}" class="btn btn-outline-danger me-2">
                    <i class="fas fa-trash-alt"></i> Корзина
                </a>
            @endif

            <form class="d-flex ms-auto" role="search">
                <a href="/cards/create" type="button" class="btn btn-outline-success">
                    Загрузить
                </a>

                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <i class="fas fa-spinner fa-fw fa-pulse me-2 text-primary"></i>
                            <strong class="me-auto">Ой...</strong>
                            <small>Только что</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
                        </div>
                        <div class="toast-body">
                            Кнопка пока ничего не делает!
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</div>

    @yield('body')


<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">

            <div class="developer-name">
                <span>Выполнил: Бурундуков Михаил</span>
            </div>

            <div class="social-icons">
                <a href="https://t.me" target="_blank" class="text-white me-3 text-decoration-none">
                    <i class="fab fa-telegram fa-lg hover-effect"></i>
                </a>

                <a href="https://vk.com" target="_blank" class="text-white me-3 text-decoration-none">
                    <i class="fab fa-vk fa-lg hover-effect"></i>
                </a>

                <a href="https://github.com" target="_blank" class="text-white text-decoration-none">
                    <i class="fab fa-github fa-lg hover-effect"></i>
                </a>
            </div>

        </div>
    </div>
</footer>


<script src="{{ mix('js/app.js') }}"></script>
</body>

</html>



