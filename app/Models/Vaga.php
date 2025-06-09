<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
  

    protected $fillable = [
        'empresa_id',
        'titulo',
        'descricao',
        'salario',
        'requisitos',
        'status',
        'localizacao',
    ];

    public function empresa()   { return $this->belongsTo(Empresa::class); }
    public function candidaturas() { return $this->hasMany(Candidatura::class); }

        public function candidatos()
    {
        return $this->belongsToMany(
        Candidato::class,
        'candidaturas',
        'vaga_id',
        'candidato_id'
        )->withPivot('status')->withTimestamps();
    }
}
