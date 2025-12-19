@extends('layouts.app')

@section('body')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="mb-4">
                    <a href="/cards" class="text-decoration-none text-muted">
                        <i class="bi bi-arrow-left"></i> ← Назад к списку
                    </a>
                </div>

                <div class="card shadow-sm border-0 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="{{asset($card->image)}}"
                                 class="img-fluid h-100 w-100"
                                 style="object-fit: cover; min-height: 400px;"
                                 alt="{{$card->title}}">
                        </div>

                        <div class="col-md-7">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h1 class="h2 fw-bold mb-0">{{$card->title}}</h1>
                                    <span class="badge bg-primary fs-6">{{$card->metacritic_score}} / 100</span>
                                </div>

                                <div class="mb-4">
                                    <p class="text-muted mb-1 small uppercase fw-bold">О релизе:</p>
                                    <div class="d-flex gap-3 small">
                                        <span><strong>Мир:</strong> {{$card->release_date_world}}</span>
                                        <span><strong>РФ:</strong> {{$card->release_date_russia}}</span>
                                    </div>
                                </div>

                                <hr>

                                <div class="description-text mb-4">
                                    <h5 class="fw-bold">Об игре</h5>
                                    <p class="text-secondary" style="line-height: 1.6;">
                                        {{$card->additional_description}}
                                    </p>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-auto">
                                    <a href="/cards/{{$card->id}}/edit" class="btn btn-warning px-4">
                                        Редактировать
                                    </a>
                                    <form action="/cards/{{$card->id}}" method="POST" onsubmit="return confirm('Удалить игру?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
