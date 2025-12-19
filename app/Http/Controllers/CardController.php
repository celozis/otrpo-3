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

    public function store()
    {
        $data = request();
        $card = Card::create($data);

        return redirect('/cards');
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
        $data = request();
        $card->update($data);

        return redirect('/cards');
    }

    public function destroy(Card $card)
    {
        $card->delete();

        return redirect('/cards');
    }
}
