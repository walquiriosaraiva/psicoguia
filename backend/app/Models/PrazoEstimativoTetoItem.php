<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PrazoEstimativoTetoItem
 * @package App\Models
 */
class PrazoEstimativoTetoItem extends Model
{
    use HasFactory;

    const PRAZOESTIMATIVATETOITEM = 'sisco.prazoestimativatetoitem';

    const PEIID = 'peiid';
    const PETID = 'petid';
    const TPTID = 'tptid';
    const PEIPRAZO = 'peiprazo';
    const PEIDATA = 'peidata';
    const PEITRAMITACAO = 'peitramitacao';
    const PEICONCLUSAO = 'peiconclusao';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::PRAZOESTIMATIVATETOITEM;

    /**
     * @var string
     */
    protected $primaryKey = self::PEIID;

    /**
     * @var string[]
     */
    protected $casts = [
        self::PEIPRAZO => 'date',
        self::PEIDATA => 'date',
        self::PEITRAMITACAO => 'date',
        self::PEICONCLUSAO => 'date',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        self::PEIID,
        self::PETID,
        self::TPTID,
        self::PEIPRAZO,
        self::PEIDATA,
        self::PEITRAMITACAO,
        self::PEICONCLUSAO
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prazoEstimativoTeto()
    {
        return $this->belongsTo(PrazoEstimativoTeto::class, self::PETID, self::PETID);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoTeto()
    {
        return $this->belongsTo(TipoTeto::class, self::TPTID, self::TPTID);
    }

}
