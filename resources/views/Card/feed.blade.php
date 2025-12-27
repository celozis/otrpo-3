@extends('layouts.main')

@section('body')

    <div class="container text-center">
        <h2 class="my-4">Лента друзей</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 row-cols-xxxl-5 g-4">
            @forelse($cards as $card)
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
                                    data-bs-target="#modal-{{$card->id}}">
                                Подробнее
                            </button>

                            <div class="modal fade" id="modal-{{$card->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Дополнительная
                                                информация
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <img src="{{asset($card->image)}}"
                                             class="img-fluid" alt="Постер {{$card->title}}">
                                        <div class="modal-body">
                                            {{$card->additional_description}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Закрыть
                                            </button>

                                            <a href="/cards/{{$card->id}}" class="btn btn-primary">В отдельном окне</a>


                                        </div>
                                    </div>

                                </div>
                                <div class="comments-wrapper">
                                    <div class="comments-container">
                                        <div class="comments-header text-start">
                                            <i class="far fa-comments"></i>
                                            <span>Обсуждение</span>
                                            <span class="badge bg-primary ms-2">{{ $card->comments->count() }}</span>
                                        </div>
                                        <div class="comments-list">
                                            @forelse($card->comments as $comment)
                                                <div class="comment-item">
                                                    <div class="comment-avatar">
                                                        {{ strtoupper(substr($comment->user->username, 0, 1)) }}
                                                    </div>
                                                    <div class="comment-content text-start">
                                                        <div class="comment-header d-flex align-items-center mb-1">
                                                            <div class="d-flex align-items-center">
                                                                <span class="comment-author fw-bold text-primary">{{ $comment->user->username }}</span>

                                                                @auth
                                                                    @if(auth()->user()->friends->contains($comment->user->id))
                                                                        <span class="badge rounded-pill bg-warning text-dark ms-2 d-flex align-items-center shadow-sm"
                                                                              style="font-size: 0.65rem; padding: 4px 8px; border: 1px solid #edb100; font-weight: 800;">
                                                                            <i class="fas fa-user-friends me-1"></i> ВАШ ДРУГ
                                                                        </span>
                                                                    @endif
                                                                @endauth
                                                            </div>

                                                            <span class="comment-date ms-auto small text-muted" style="font-size: 0.7rem;">
                                                                {{ $comment->created_at->diffForHumans() }}
                                                            </span>
                                                        </div>
                                                        <p class="comment-text">{{ $comment->text }}</p>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="comments-empty">
                                                    <i class="fas fa-comment-dots"></i>
                                                    <p>Здесь пока пусто. Оставьте первый отзыв!</p>
                                                </div>
                                            @endforelse
                                        </div>

                                        @auth
                                            <form action="{{ route('comments.store') }}" method="POST" class="comment-form">
                                                @csrf
                                                <input type="hidden" name="card_id" value="{{ $card->id }}">
                                                <textarea name="text" class="form-control" placeholder="Напишите мнение..." rows="2" required></textarea>
                                                <button class="btn btn-primary btn-sm" type="submit">
                                                    <i class="fas fa-paper-plane"></i> Отправить
                                                </button>
                                            </form>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-light py-5 shadow-sm">
                        <i class="fas fa-user-friends fa-2x mb-3 text-muted"></i>
                        <p class="mb-0">В вашей ленте пока нет карточек. Добавьте друзей, чтобы видеть их обновления!</p>
                        <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Найти друзей</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

@endsection
