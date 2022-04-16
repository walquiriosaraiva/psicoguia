<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TetoOrcamentario
 * @package App\Models
 */
class TetoOrcamentario extends Model
{
    use HasFactory;

    const TETOORCAMENTARIO = 'sisco.tetoorcamentario';

    const TOID = 'toid';
    const PEIID = 'peiid';
    const UNGCOD = 'ungcod';
    const TOVALCUSTEIO = 'tovalcusteio';
    const TOVALINVESTIMENTO = 'tovalinvestimento';
    const TTOID = 'ttoid';
    const TODAT = 'todat';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::TETOORCAMENTARIO;

    /**
     * @var string
     */
    protected $primaryKey = self::TOID;

    protected $casts = [self::TODAT];

    /**
     * @var string[]
     */
    protected $fillable = [
        self::TOID,
        self::PEIID,
        self::UNGCOD,
        self::TOVALCUSTEIO,
        self::TOVALINVESTIMENTO,
        self::TTOID,
        self::TODAT
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prazoEstimativoTetoItem()
    {
        return $this->belongsTo(PrazoEstimativoTetoItem::class, self::PEIID, self::PEIID);
    }

}
