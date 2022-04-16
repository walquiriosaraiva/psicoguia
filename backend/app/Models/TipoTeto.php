<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TipoTeto
 * @package App\Models
 */
class TipoTeto extends Model
{
    use HasFactory;

    const TIPOTETO = 'sisco.tipoteto';

    const TPTID = 'tptid';
    const TPTDSC = 'tptdsc';
    const TPTSTATUS = 'tptstatus';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::TIPOTETO;

    /**
     * @var string
     */
    protected $primaryKey = self::TPTID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::TPTID,
        self::TPTDSC,
        self::TPTSTATUS
    ];

}
