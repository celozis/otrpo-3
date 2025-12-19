@extends('layouts.app')

@section('body')
    <div class="container mt-5">
        <a href="/cards" class="btn btn-link ps-0 mb-3"><- Назад к списку</a>

        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">{{ $card->title }}</h2>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset($card->image) }}" class="img-thumbnail w-100" alt="{{ $card->title }}">
                    </div>

                    <div class="col-md-8">
                        <p><strong>Оценка Metacritic:</strong> <span class="badge bg-info text-dark">{{ $card->metacritic_score }}</span></p>
                        <p><strong>Релиз в мире:</strong> {{ $card->release_date_world }}</p>
                        <p><strong>Релиз в РФ:</strong> {{ $card->release_date_russia }}</p>
                        <hr>
                        <h5>Описание:</h5>
                        <p>{{ $card->additional_description }}</p>
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex gap-2">
                <a href="/cards/{{ $card->id }}/edit" class="btn btn-primary">Редактировать</a>
                <form action="/cards/{{ $card->id }}" method="POST" onsubmit="return confirm('Удалить?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
