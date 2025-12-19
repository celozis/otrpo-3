@extends('layouts.app')

<!-- карточки -->
@section('body')

    <div class="container text-center">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 row-cols-xxxl-5 g-4">
            @foreach($cards as $card)
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

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{$card->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
