<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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
        'email',
        'password',
        'role',
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

    public function candidato()
    {
        return $this->hasOne(Candidato::class);
    }

    public function empresa()
    {
        return $this->hasOne(Empresa::class);
    }

     public function vagas(): HasManyThrough
    {
        return $this->hasManyThrough(
            Vaga::class,      // modelo final
            Empresa::class,   // modelo intermediário
            'user_id',        // FK em empresas -> users.id
            'empresa_id',     // FK em vagas    -> empresas.id
            'id',             // PK em users
            'id'              // PK em empresas
        );
    }
}
