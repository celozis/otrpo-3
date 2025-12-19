<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();

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
        return view('card.edit', compact('card'));
    }

    public function update(Request $request, Card $card)
    {
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
            // если фото не загружено, убираем поле из массива
            unset($validated['image']);
        }

        $card->update($validated);

        return redirect('/cards');
    }

    public function destroy(Card $card)
    {
        $card->delete();

        return redirect('/cards');
    }
}
