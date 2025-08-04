<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // <-- 1. Importante tener esta línea
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'carrera',
        'grupo',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

    /**
     * Los eventos en los que un usuario está registrado.
     */
    public function eventos(): BelongsToMany // <-- 2. Este es el método que soluciona el error
    {
        return $this->belongsToMany(Evento::class, 'evento_user', 'user_id', 'evento_id')
                    ->withTimestamps();
    }

    /**
     * Genera las iniciales del nombre del usuario.
     */
    public function initials(): string
    {
        return collect(explode(' ', $this->name))->map(fn ($name) => mb_substr($name, 0, 1))->take(2)->implode('');
    }
}