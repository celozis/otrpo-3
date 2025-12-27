@extends('layouts.main')

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
                        <p><strong>Оценка Metacritic:</strong> <span
                                    class="badge bg-info text-dark">{{ $card->metacritic_score }}</span></p>
                        <p><strong>Релиз в мире:</strong> {{ $card->release_date_world }}</p>
                        <p><strong>Релиз в РФ:</strong> {{ $card->release_date_russia }}</p>
                        <hr>
                        <h5>Описание:</h5>
                        <p>{{ $card->additional_description }}</p>
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex gap-2">
                @can('update-delete-card', $card)
                    <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
@endsection
