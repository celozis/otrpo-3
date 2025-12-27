@extends('layouts.main')

@section('body')
    <div class="container mt-5">
        <h2 class="mb-4">Управление пользователями</h2>
        <table class="table table-hover border">
            <thead class="table-dark">
            <tr>
                <th>Username</th>
                @if(auth()->user()->is_admin)
                    <th>Email</th>
                @endif
                <th>Кол-во карточек</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
                <tr>
                    <td>{{ $u->username }}</td>
                    @if(auth()->user()->is_admin)
                        <td>{{ $u->email }}</td>
                    @endif
                    <td>{{ $u->cards_count }}</td>
                    <td>
                        <a href="{{ route('user.cards', $u->username) }}" class="btn btn-sm btn-primary">
                            Показать карточки
                        </a>
                    <td>
                        @if(auth()->id() !== $u->id)
                            <form action="{{ route('users.toggle-friend', $u->id) }}" method="POST" class="d-inline">
                                @csrf
                                @if(auth()->user()->friends->contains($u->id))
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-user-minus"></i> Удалить
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-user-plus"></i> В друзья
                                    </button>
                                @endif
                            </form>
                        @else
                            <span class="badge bg-secondary">Это вы</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
