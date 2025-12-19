<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>btstr</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body>

<div class="border"> <!-- Шапка сверху - назнание + кнопка + картинка-->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid d-flex align-items-center">

            <div class="d-flex align-items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Rockstar_Games_Logo.svg"
                     class="nav-logo me-2 ms-3 img-fluid" alt="Логотип сайта">
                <span class="navbar-brand h1 mb-0">Rockstar Games</span>
            </div>

            <form class="d-flex ms-auto" role="search">
                <button type="button" class="btn btn-outline-success" id="liveToastBtn">
                    Загрузить
                </button>

                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <i class="fas fa-spinner fa-fw fa-pulse me-2 text-primary"></i>

                            <strong class="me-auto">Ой...</strong>
                            <small>Только что</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Закрыть"></button>
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

<!-- карточки -->

@foreach($cards as $card)

    <div class="container text-center">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 row-cols-xxxl-5 g-4">
            <div class="col">
                <div class="card">
                    <img src="{{asset($card->image)}}" class="img-fluid"
                         alt="Постер {{$card->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$card->title}}</h5>
                        <p class="card-text">Дата выхода:</p>
                        <p>В мире: {{$card->release_date_world}}</p>
                        <p>России: {{$card->release_date_russia}}</p>
                        <p>{{$card->short_description}}</p>
                        <p>Рейтинг Metacritic: {{$card->metacritic_score}}/100</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalGTA2">
                            Подробнее
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalGTA2" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Дополнительная информация
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <img src="{{asset($card->image)}}"
                                         class="img-fluid" alt="Постер GTA 2">
                                    <div class="modal-body">
                                        {{$card->additional_description}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Закрыть^
                                        </button>

                                        <a href="/cards/{{$card->id}}" class="btn btn-primary">В отдельном окне</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endforeach
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
