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
<div class="container text-center">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 row-cols-xxxl-5 g-4">
        <div class="col">
            <div class="card">
                <img src="https://upload.wikimedia.org/wikipedia/ru/a/a5/GTA2_cover.jpg" class="img-fluid"
                     alt="Постер GTA 2">
                <div class="card-body">
                    <h5 class="card-title">Grand Theft Auto 2</h5>
                    <p class="card-text">Дата выхода:</p>
                    <p>В мире: 22 октября 1999 года в в России: 4 ноября 1999 года</p>
                    <p>Игра разработана DMA Design (ныне Rockstar North) и издана под брендом Rockstar</p>
                    <p>Рейтинг Metacritic: 70/100</p>
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
                                <img src="https://upload.wikimedia.org/wikipedia/ru/a/a5/GTA2_cover.jpg"
                                     class="img-fluid" alt="Постер GTA 2">
                                <div class="modal-body">
                                    В отличие от других игр серии, действие игры происходит в будущем (на момент
                                    выхода игры) (игровая документация упоминает «через три недели в будущем» и «Х
                                    недель в будущем» или «Х минут в будущем», однако на официальном сайте Rockstar
                                    пишется конкретная дата — 2013 год [1] Архивная копия от 3 февраля 2009 на
                                    Wayback Machine) в мегаполисе, называемом в игре только как Anywhere City (Город
                                    Где угодно).
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Закрыть
                                    </button>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="popover"
                                            data-bs-trigger="focus" data-bs-title="Информация"
                                            data-bs-content="Кнопка пока ничего не делает!">
                                        Нажми меня
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="https://upload.wikimedia.org/wikipedia/ru/a/a7/GTA3cover.JPG" class="img-fluid"
                     alt="Постер GTA 3">
                <div class="card-body">
                    <h5 class="card-title">Grand Theft Auto 3</h5>
                    <p class="card-text">Дата выхода:</p>
                    <p>В мире: 22 октября 2001 года, в России: 8 августа 2002 года</p>
                    <p>Разработка: DMA Design (вскоре переименована в Rockstar North), издание - под брендом
                        Rockstar. </p>
                    <p>Рейтинг Metacritic: 97/100</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalGTA3">
                        Подробнее
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalGTA3" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Дополнительная информация
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <img src="https://upload.wikimedia.org/wikipedia/ru/a/a7/GTA3cover.JPG"
                                     class="img-fluid" alt="Постер GTA 3">
                                <div class="modal-body">
                                    <p><b>Grand Theft Auto III</b> — игра в жанре аction-adventure, сочетающая в
                                        себе
                                        элементы
                                        шутера от третьего лица и элементы автосимулятора в большом и открытом для
                                        исследования игровом мире, с классическим для этого жанра управлением.</p>

                                    Игра развивает основные идеи геймплея прошлой игры серии — Grand Theft Auto 2:
                                    игроку предстоит выполнять преимущественно криминальные и противозаконные
                                    задания, выдаваемые различными персонажами игры, пробираясь по криминальной
                                    лестнице, чтобы дойти до своей цели отомстить главному антагонисту.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Закрыть
                                    </button>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="popover"
                                            data-bs-trigger="focus" data-bs-title="Информация"
                                            data-bs-content="Кнопка пока ничего не делает!">
                                        Нажми меня
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="https://upload.wikimedia.org/wikipedia/ru/4/4c/Maxpaynebox.jpg" class="img-fluid"
                     alt="...">
                <div class="card-body">
                    <h5 class="card-title">MAX PAYNE</h5>
                    <p class="card-text">Дата выхода:</p>
                    <p>В мире: 23 июля 2001, в года в России: 30 ноября 2001 года</p>
                    <p>Разработчиком выступила Remedy Entertainment при продюсерстве 3D Realms и издании Gathering
                        of Developers</p>
                    <p>Рейтинг Metacritic: 89/100</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalMaxPayne">
                        Подробнее
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalMaxPayne" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Дополнительная информация
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <img src="https://upload.wikimedia.org/wikipedia/ru/4/4c/Maxpaynebox.jpg"
                                     class="img-fluid" alt="...">
                                <div class="modal-body">
                                    При разработке игры создатели <b>Max Payne</b> вдохновлялись кинематографом, в
                                    частности — жанром «гонконгского боевика». Наибольшее влияние на игру оказали
                                    работы режиссёра Джона Ву — в его фильмах часто используется замедление времени
                                    (slow motion) вместе с акробатическими перестрелками. Считается, что на игру
                                    также оказал большое влияние фильм «Матрица», но в действительности это не так.
                                    Несмотря на то что Max Payne был выпущен через два года после премьеры
                                    «Матрицы», это лишь совпадение — игра находилась в разработке задолго до
                                    «Матрицы», и повсеместное замедление времени было её основным геймплейным
                                    элементом ещё в начале работ.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Закрыть
                                    </button>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="popover"
                                            data-bs-trigger="focus" data-bs-title="Информация"
                                            data-bs-content="Кнопка пока ничего не делает!">
                                        Нажми меня
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="https://upload.wikimedia.org/wikipedia/ru/2/26/V_City-PS2.jpg" class="img-fluid"
                     alt="...">
                <div class="card-body">
                    <h5 class="card-title">Grand Theft Auto: Vice City</h5>
                    <p class="card-text">Дата выхода:</p>
                    <p>В мире: 29 октября 2002 года, в России: 9 октября 2009 года</p>
                    <p>Игра разработана Rockstar North и издана под брендом Rockstar</p>
                    <p>Рейтинг Metacritic: 95/100</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalViceCity">
                        Подробнее
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalViceCity" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Дополнительная информация
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <img src="https://upload.wikimedia.org/wikipedia/ru/2/26/V_City-PS2.jpg"
                                     class="img-fluid" alt="...">
                                <div class="modal-body">
                                    <b>Grand Theft Auto: Vice City</b> — игра в жанре action-adventure, сочетающая в
                                    себе
                                    элементы шутера от третьего лица и элементы автосимулятора в большом и открытом
                                    для исследования игровом мире, с классическим для этого жанра управлением. Игра
                                    развивает основные идеи геймплея предыдущих игр серии — Grand Theft Auto 2 и
                                    Grand Theft Auto III: игроку предстоит выполнять преимущественно криминальные и
                                    противозаконные задания, выдаваемые различными персонажами игры. Большинство
                                    миссий игрок получает от криминальных боссов и прочих персонажей игры, а также
                                    при помощи нескольких телефонных автоматов, расположенных на территории города.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Закрыть
                                    </button>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="popover"
                                            data-bs-trigger="focus" data-bs-title="Информация"
                                            data-bs-content="Кнопка пока ничего не делает!">
                                        Нажми меня
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="https://upload.wikimedia.org/wikipedia/ru/7/75/Grand_Theft_Auto_San_Andreas.jpg"
                     class="img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Grand Theft Auto: San Andreas</h5>
                    <p class="card-text">Дата выхода:</p>
                    <p>В мире: 26 октября 2004 года, в России: 12 февраля 2010 года</p>
                    <p>Разработчик - Rockstar North, издатель - Rockstar Games.</p>
                    <p>Рейтинг Metacritic: 95/100</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalSanAndreas">
                        Подробнее
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalSanAndreas" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Дополнительная информация
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <img
                                    src="https://upload.wikimedia.org/wikipedia/ru/7/75/Grand_Theft_Auto_San_Andreas.jpg"
                                    class="img-fluid" alt="...">
                                <div class="modal-body">
                                    <b>Grand Theft Auto: San Andreas</b> представляет собой компьютерную игру в
                                    жанре
                                    action-adventure с видом от третьего лица[4]. Игрок управляет преступником
                                    Карлом «Си-Джеем» Джонсоном и выполняет миссии для продвижения по сюжету. Помимо
                                    миссий, игрок может свободно перемещаться по открытому миру игры и выполнять
                                    дополнительные побочные миссии[6][7]. Многопользовательская игра даёт
                                    возможность двум игрокам путешествовать по миру[8]. Вымышленный штат
                                    Сан-Андреас, составляющий открытый мир, включает в себя три города: Лос-Сантос,
                                    Сан-Фиерро и Лас-Вентурас[9].
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Закрыть
                                    </button>

                                    <button type="button" class="btn btn-primary" data-bs-toggle="popover"
                                            data-bs-trigger="focus" data-bs-title="Информация"
                                            data-bs-content="Кнопка пока ничего не делает!">
                                        Нажми меня
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
