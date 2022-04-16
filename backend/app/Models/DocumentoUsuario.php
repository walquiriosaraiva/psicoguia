<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DocumentoUsuario
 * @package App\Models
 */
class DocumentoUsuario extends Model
{
    use HasFactory;

    const DOCUMENTOUSUARIO = 'workflow.documentousuario';

    const DOUID = 'douid';
    const AEDID = 'aedid';
    const USUCPF = 'usucpf';
    const USUCPFINDICADO = 'usucpfindicado';
    const HSTID = 'hstid';
    const DOCID = 'docid';
    const DOUDATA = 'doudata';
    const ESDIDDESTINO = 'esdiddestino';

    public $timestamps = false;

    protected $casts = [
        self::DOUDATA => 'date'
    ];

    /**
     * @var string
     */
    protected $table = self::DOCUMENTOUSUARIO;

    /**
     * @var string
     */
    protected $primaryKey = self::DOUID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::DOUID,
        self::AEDID,
        self::USUCPF,
        self::USUCPFINDICADO,
        self::HSTID,
        self::DOCID,
        self::DOUDATA,
        self::ESDIDDESTINO
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoDocumento()
    {
        return $this->belongsTo(EstadoDocumento::class, self::ESDIDDESTINO, EstadoDocumento::ESDID);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documento()
    {
        return $this->belongsTo(Documento::class, self::DOCID, self::DOCID);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuarioIndicado()
    {
        return $this->belongsTo(Usuario::class, self::USUCPFINDICADO, self::USUCPF);
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function acaoEstadoDocumento()
    {
        return $this->belongsTo(AcaoEstadoDoc::class, self::AEDID, self::AEDID);
    }

}
