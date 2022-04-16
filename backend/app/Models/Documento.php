<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Documento
 * @package App\Models
 */
class Documento extends Model
{
    use HasFactory;

    const DOCUMENTO = 'workflow.documento';

    const DOCID = 'docid';
    const TPDID = 'tpdid';
    const ESDID = 'esdid';
    const DOCDSC = 'docdsc';
    const UNICOD = 'unicod';
    const DOCDATAINCLUSAO = 'docdatainclusao';
    const HSTID = 'hstid';
    const USUCPF = 'usucpf';

    public $timestamps = false;

    protected $casts = [
        self::DOCDATAINCLUSAO => 'date'
    ];

    /**
     * @var string
     */
    protected $table = self::DOCUMENTO;

    /**
     * @var string
     */
    protected $primaryKey = self::DOCID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::DOCID,
        self::TPDID,
        self::ESDID,
        self::DOCDSC,
        self::UNICOD,
        self::DOCDATAINCLUSAO,
        self::HSTID,
        self::USUCPF
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, self::TPDID, self::TPDID);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoDocumento()
    {
        return $this->belongsTo(EstadoDocumento::class, self::ESDID, self::ESDID);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, self::USUCPF, self::USUCPF);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function historicoDocumento()
    {
        return $this->belongsTo(HistoricoDocumento::class, self::HSTID, self::HSTID);
    }

}
