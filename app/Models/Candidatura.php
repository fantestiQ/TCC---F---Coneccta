<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Candidato;

class Candidatura extends Model
{
    protected $table = 'candidaturas';

    protected $fillable = ['vaga_id', 'candidato_id', 'status', 'empresa_status'];

    // Status possíveis
    public const STATUS_APLICADO = 'aplicado';
    public const STATUS_EM_ANALISE = 'em_analise';
    public const STATUS_APROVADO = 'aprovado';
    public const STATUS_RECUSADO = 'recusado';

    public static function getStatuses()
    {
        return [
            self::STATUS_APLICADO,
            self::STATUS_EM_ANALISE,
            self::STATUS_APROVADO,
            self::STATUS_RECUSADO,
        ];
    }

    public function vaga()
    {
        return $this->belongsTo(Vaga::class, 'vaga_id');
    }

    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'candidato_id');
    }
}
