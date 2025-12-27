@extends('layouts.main')

@section('body')
    <div class="container mt-5">
        <h2>Редактировать игру: {{ $card->title }}</h2>

        <form action="/cards/{{ $card->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text" name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       required minlength="2"
                       value="{{ old('title', $card->title) }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Дата выхода в Мире</label>
                    <input type="date"
                           name="release_date_world"
                           id="release_date_world"
                           class="form-control"
                           value="{{ old('release_date_world', $card->release_date_world ? \Illuminate\Support\Carbon::parse($card->release_date_world)->format('Y-m-d') : '') }}">
                    @error('release_date_world')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Дата выхода в России</label>
                    <input type="date"
                           name="release_date_russia"
                           id="release_date_russia"
                           class="form-control"
                           value="{{ old('release_date_russia', $card->release_date_russia ? \Illuminate\Support\Carbon::parse($card->release_date_russia)->format('Y-m-d') : '') }}">
                    @error('release_date_russia')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Короткое описание</label>
                <textarea name="short_description"
                          class="form-control @error('short_description') is-invalid @enderror"
                          rows="2" required>{{ old('short_description', $card->short_description) }}</textarea>
                @error('short_description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Дополнительное описание</label>
                <textarea name="additional_description"
                          class="form-control @error('additional_description') is-invalid @enderror"
                          rows="4"
                          required>{{ old('additional_description', $card->additional_description) }}</textarea>
                @error('additional_description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Оценка Metacritic</label>
                    <input type="number" name="metacritic_score"
                           class="form-control @error('metacritic_score') is-invalid @enderror"
                           min="0" max="100" required
                           value="{{ old('metacritic_score', $card->metacritic_score) }}">
                    @error('metacritic_score')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Изменить картинку (необязательно)</label>
                    <input type="file" name="image"
                           class="form-control @error('image') is-invalid @enderror"
                           accept="image/*">
                    <small class="text-muted">Текущая: {{ basename($card->image) }}</small>
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Обновить данные</button>
                <a href="/cards" class="btn btn-outline-secondary">Отмена</a>
            </div>
        </form>
    </div>
@endsection
