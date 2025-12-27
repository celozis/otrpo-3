@extends('layouts.main')

@section('body')
    <div class="container mt-5">
        <h2>Добавить новую игру</h2>

        <form action="/cards" method="POST" enctype="multipart/form-data" class="needs-validation">
            @csrf

            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text" name="title" class="form-control" required minlength="2" value="{{ old('title') }}">
                @error('title')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Дата выхода в Мире</label>
                    <input type="date" name="release_date_world" class="form-control" required
                           value="{{ old('release_date_world') }}">
                    @error('release_date_world')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Дата выхода в России</label>
                    <input type="date" name="release_date_russia" class="form-control" required
                           value="{{ old('release_date_russia') }}">
                    @error('release_date_russia')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Короткое описание</label>
                <textarea name="short_description" class="form-control" rows="2"
                          required>{{ old('short_description') }}</textarea>
                @error('short_description')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Дополнительное описание</label>
                <textarea name="additional_description" class="form-control" rows="4"
                          required>{{ old('additional_description') }}</textarea>
                @error('additional_description')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Оценка Metacritic</label>
                    <input type="number" name="metacritic_score" class="form-control" min="0" max="100" required
                           value="{{ old('metacritic_score') }}">
                    @error('metacritic_score')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Картинка (постер)</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                    @error('image')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-success">Создать карточку</button>
            <a href="/cards" class="btn btn-outline-secondary">Отмена</a>
        </form>
    </div>
@endsection
