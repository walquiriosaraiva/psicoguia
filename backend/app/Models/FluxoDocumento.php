<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FluxoDocumento
 * @package App\Models
 */
class FluxoDocumento extends Model
{
    use HasFactory;

    const FLUXODOCUMENTO = 'workflow.fluxodocumento';

    const FXID = 'fxid';
    const ESDID = 'esdid';
    const TPFID = 'tpfid';
    const FXORDEM = 'fxordem';
    const FXSTATUS = 'fxstatus';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::FLUXODOCUMENTO;

    /**
     * @var string
     */
    protected $primaryKey = self::FXID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::FXID,
        self::ESDID,
        self::TPFID,
        self::FXORDEM,
        self::FXSTATUS
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiploFluxo()
    {
        return $this->belongsTo(TipoFluxo::class, self::TPFID, self::TPFID);
    }

}
