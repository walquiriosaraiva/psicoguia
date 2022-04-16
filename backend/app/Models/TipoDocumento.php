<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TipoDocumento
 * @package App\Models
 */
class TipoDocumento extends Model
{
    use HasFactory;

    const TIPODOCUMENTO = 'workflow.tipodocumento';

    const TPDID = 'tpdid';
    const TPDDSC = 'tpddsc';
    const SISID = 'sisid';
    const TPDSTATUS = 'tpdstatus';
    const TPDENDERECO = 'tpdendereco';
    const CONSTANTEVIRTUAL = 'constantevirtual';
    const TPDIAUTIL = 'tpdiautil';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::TIPODOCUMENTO;

    /**
     * @var string
     */
    protected $primaryKey = self::TPDID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::TPDID,
        self::TPDDSC,
        self::SISID,
        self::TPDSTATUS,
        self::TPDENDERECO,
        self::CONSTANTEVIRTUAL,
        self::TPDIAUTIL
    ];

}
