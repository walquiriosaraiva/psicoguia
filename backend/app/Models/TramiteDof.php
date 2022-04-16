<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TramiteDof extends Model
{
    use HasFactory;

    const TRAMITEDOF = 'sisco.tramitedof';

    const TDID = 'tdid';
    const PEIID = 'peiid';
    const UNGCOD = 'ungcod';
    const DOCID = 'docid';
    const TDVALCUSTEIO = 'tdvalcusteio';
    const TDVALINVESTIMENTO = 'tdvalinvestimento';
    const TDDAT = 'tddat';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::TRAMITEDOF;

    /**
     * @var string
     */
    protected $primaryKey = self::TDID;

    protected $casts = [self::TDDAT];

    /**
     * @var string[]
     */
    protected $fillable = [
        self::TDID,
        self::PEIID,
        self::UNGCOD,
        self::DOCID,
        self::TDVALCUSTEIO,
        self::TDVALINVESTIMENTO,
        self::TDDAT
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prazoEstimativoTetoItem()
    {
        return $this->belongsTo(PrazoEstimativoTetoItem::class, self::PEIID, self::PEIID);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documento()
    {
        return $this->belongsTo(Documento::class, self::DOCID, self::DOCID);
    }

}
