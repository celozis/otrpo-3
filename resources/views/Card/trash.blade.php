@extends('layouts.main')

@section('body')

    <div class="container text-center mt-4">
        <h2 class="mb-4 text-danger">Корзина (Удаленные объекты)</h2>

        @if($cards->isEmpty())
            <div class="alert alert-info">Корзина пуста</div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 row-cols-xxxl-5 g-4">
                @foreach($cards as $card)
                    <div class="col">
                        <div class="card h-100 border-danger"> <img src="{{ asset($card->image) }}" class="card-img-top"
                                                                    style="height: 200px; object-fit: cover;"
                                                                    alt="Постер {{$card->title}}">

                            <div class="card-body">
                                <h5 class="card-title">{{$card->title}}</h5>
                                <p class="text-muted small">Удалено: {{ $card->deleted_at->format('d.m.Y H:i') }}</p>

                                <div class="d-flex justify-content-center gap-2 mt-3">
                                    <form action="{{ route('cards.restore', $card->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fas fa-trash-restore"></i> Восстановить
                                        </button>
                                    </form>

                                    <form action="{{ route('cards.forceDelete', $card->id) }}" method="POST"
                                          onsubmit="return confirm('Удалить безвозвратно?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-times"></i> Удалить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-4">
            <a href="{{ route('cards.index') }}" class="btn btn-secondary">Вернуться к списку</a>
        </div>
    </div>

@endsection
