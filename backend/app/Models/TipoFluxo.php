<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TipoFluxo
 * @package App\Models
 */
class TipoFluxo extends Model
{
    use HasFactory;

    const TIPOFLUXO = 'workflow.tipofluxo';

    const TPFID = 'tpfid';
    const SISID = 'sisid';
    const TPFSTATUS = 'tpfstatus';
    const TPFDSC = 'tpfdsc';
    const CONSTANTEVIRTUAL = 'constantevirtual';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::TIPOFLUXO;

    /**
     * @var string
     */
    protected $primaryKey = self::TPFID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::TPFID,
        self::SISID,
        self::TPFSTATUS,
        self::TPFDSC,
        self::CONSTANTEVIRTUAL
    ];

}
