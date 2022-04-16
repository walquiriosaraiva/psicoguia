<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class HistoricoDocumento
 * @package App\Models
 */
class HistoricoDocumento extends Model
{
    use HasFactory;

    const HISTORICODOCUMENTO = 'workflow.historicodocumento';

    const HSTID = 'hstid';
    const AEDID = 'aedid';
    const DOCID = 'docid';
    const USUCPF = 'usucpf';
    const PFLCOD = 'pflcod';
    const HTDDATA = 'htddata';

    public $timestamps = false;

    protected $casts = [
        self::HTDDATA => 'date'
    ];

    /**
     * @var string
     */
    protected $table = self::HISTORICODOCUMENTO;

    /**
     * @var string
     */
    protected $primaryKey = self::DOCID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::HSTID,
        self::AEDID,
        self::DOCID,
        self::USUCPF,
        self::PFLCOD,
        self::HTDDATA
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function acaoEstadoDocumento()
    {
        return $this->belongsTo(AcaoEstadoDoc::class, self::AEDID, self::AEDID);
    }

}
