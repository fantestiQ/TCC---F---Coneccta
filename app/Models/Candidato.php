<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Candidato extends Model
{
    use HasFactory;

    protected $table = 'candidatos';

    protected $fillable = [
        'user_id',
        'cpf',
        'data_nascimento',
        'telefone',
        'endereco',
        'descricao',
        'resume_path',
    ];

  
    public function vagasAplicadas()
    {
        return $this->belongsToMany(Vaga::class, 'candidaturas', 'candidato_id', 'vaga_id')
                    ->withPivot('status')
                    ->withTimestamps();
    }
    
      public function candidaturas()
    {
        return $this->hasMany(Candidatura::class, 'candidato_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
