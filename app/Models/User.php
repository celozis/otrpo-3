<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cards()
    {
        // у пользователя много моделей Card
        return $this->hasMany(Card::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // кого я добавил
    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends_users', 'user_id', 'friend_id')
            ->withTimestamps();
    }

// Те, кто добавил меня
    public function addedMe()
    {
        return $this->belongsToMany(User::class, 'friends_users', 'friend_id', 'user_id')
            ->withTimestamps();
    }
}
