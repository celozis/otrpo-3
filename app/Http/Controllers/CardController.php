<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            $cards = Card::all();
        } else {
            $cards = Card::where('user_id', auth()->id())->get();
        }

        return view('card.index', compact('cards'));
    }

    public function create()
    {
        return view('card.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date_world' => 'required|date',
            'release_date_russia' => 'required|date',
            'short_description' => 'required|string|max:500',
            'additional_description' => 'required|string',
            'metacritic_score' => 'required|integer|min:0|max:100',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048', // макс 2МБ
        ]);

        // обработка картинки
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('cards', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        Card::create($validated);

        return redirect('/cards')->with('success', 'Игра успешно добавлена!');
    }

    public function show(Card $card)
    {
        return view('card.show', compact('card'));
    }

    public function edit(Card $card)
    {
        Gate::authorize('update-delete-card', $card); // Проверка прав
        return view('Card.edit', compact('card'));
    }

    public function update(Request $request, Card $card)
    {
        Gate::authorize('update-delete-card', $card);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'release_date_world' => 'required|date',
            'release_date_russia' => 'required|date',
            'short_description' => 'required|string',
            'additional_description' => 'required|string',
            'metacritic_score' => 'required|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('cards', 'public');
            $validated['image'] = 'storage/' . $path;
        } else {
            unset($validated['image']);
        }

        $card->update($validated);

        return redirect('/cards');
    }

    public function destroy(Card $card)
    {
        Gate::authorize('update-delete-card', $card);
        $card->delete(); // Мягкое удаление

        return redirect('/cards');
    }

    public function restore($id)
    {
        Gate::authorize('admin-actions');
        Card::withTrashed()->findOrFail($id)->restore();
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        Gate::authorize('admin-actions');
        // Удаление из базы навсегда
        Card::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back();
    }

    public function trash()
    {
        Gate::authorize('admin-actions');

        // Берем мягко удаленные записи
        $cards = Card::onlyTrashed()->get();

        return view('Card.trash', compact('cards'));
    }

    public function usersList()
    {
        // Получаем всех пользователей и считаем их карточки
        $users = User::withCount('cards')->get();
        return view('card.users', compact('users'));
    }

    public function userCards(User $user)
    {
        // карточки этого пользователя
        $cards = $user->cards()->get();
        // Используем index, но передаем туда имя пользователя для заголовка
        return view('card.index', compact('cards', 'user'));
    }

    public function feed()
    {
        $friendIds = auth()->user()->friends->pluck('id');

        if ($friendIds->isEmpty()) {
            $cards = collect();
        } else {
            $cards = Card::whereIn('user_id', $friendIds)
                ->with(['user', 'comments.user'])
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('Card.feed', compact('cards'));
    }


}
