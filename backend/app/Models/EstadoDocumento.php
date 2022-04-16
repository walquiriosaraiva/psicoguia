<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EstadoDocumento
 * @package App\Models
 */
class EstadoDocumento extends Model
{
    use HasFactory;

    const ESTADODOCUMENTO = 'workflow.estadodocumento';

    const ESDID = 'esdid';
    const TPDID = 'tpdid';
    const ESDSTATUS = 'esdstatus';
    const ESDORDEM = 'esdordem';
    const ESDDSC = 'esddsc';
    const ESDPRAZO = 'esdprazo';
    const ESDATRAZO = 'esdatrazo';
    const ESDATRASO = 'esdatraso';
    const ESDFIM = 'esdfim';
    const CONSTANTEVIRTUAL = 'constantevirtual';

    const ESDSTATUS_VALOR_ATIVO = 'A';
    const ESDSTATUS_VALOR_INATIVO = 'I';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::ESTADODOCUMENTO;

    /**
     * @var string
     */
    protected $primaryKey = self::ESDID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::ESDID,
        self::TPDID,
        self::ESDSTATUS,
        self::ESDORDEM,
        self::ESDDSC,
        self::ESDPRAZO,
        self::ESDATRAZO,
        self::ESDATRASO,
        self::ESDFIM,
        self::CONSTANTEVIRTUAL
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, self::TPDID, self::TPDID);
    }

}
