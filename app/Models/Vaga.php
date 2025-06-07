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
        'escolaridade',
        'status',
        'localizacao',
    ];




    public function empresa()   { return $this->belongsTo(Empresa::class); }
    public function candidaturas() { return $this->hasMany(Candidatura::class); }
}
