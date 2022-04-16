<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TipoTetoOrcamentario
 * @package App\Models
 */
class TipoTetoOrcamentario extends Model
{
    use HasFactory;

    const TIPOTETOORCAMENTARIO = 'sisco.tipotetoorcamentario';

    const TTOID = 'ttoid';
    const TTODESCRICAO = 'ttodescricao';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::TIPOTETOORCAMENTARIO;

    /**
     * @var string
     */
    protected $primaryKey = self::TTOID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::TTOID,
        self::TTODESCRICAO
    ];

}
