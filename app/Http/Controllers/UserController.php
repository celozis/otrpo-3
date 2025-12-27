<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function toggleFriend(User $user)
    {
        $currentUser = auth()->user();

        if ($currentUser->id === $user->id) {
            return back()->with('error', 'Нельзя дружить с собой.');
        }

        // если уже друзья
        if ($currentUser->friends->contains($user->id)) {
            // Удаляем связь у обоих
            $currentUser->friends()->detach($user->id);
            $user->friends()->detach($currentUser->id);
            $message = 'Дружба разорвана';
        } else {
            // Добавляем связь обоим
            $currentUser->friends()->syncWithoutDetaching([$user->id]);
            $user->friends()->syncWithoutDetaching([$currentUser->id]);
            $message = 'Теперь вы друзья!';
        }

        return back()->with('success', $message);
    }

}
