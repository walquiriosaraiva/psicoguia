<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EstadoDocumentoPerfil
 * @package App\Models
 */
class EstadoDocumentoPerfil extends Model
{
    use HasFactory;

    const ESTADODOCUMENTOPERFIL = 'workflow.estadodocumentoperfil';

    const PFLCOD = 'pflcod';
    const AEDID = 'aedid';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::ESTADODOCUMENTOPERFIL;

    /**
     * @var string
     */
    protected $primaryKey = self::PFLCOD;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::AEDID,
        self::PFLCOD
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDocumento()
    {
        return $this->belongsTo(AcaoEstadoDoc::class, self::AEDID, self::AEDID);
    }

}
