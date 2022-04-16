<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TramiteTeto extends Model
{
    use HasFactory;

    const TRAMITETETO = 'sisco.tramiteteto';

    const TTID = 'ttid';
    const PEIID = 'peiid';
    const DOCID = 'docid';
    const TTDAT = 'ttdat';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::TRAMITETETO;

    /**
     * @var string
     */
    protected $primaryKey = self::TTID;

    protected $casts = [self::TTDAT];

    /**
     * @var string[]
     */
    protected $fillable = [
        self::TTID,
        self::PEIID,
        self::DOCID,
        self::TTDAT
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
