<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Entidade
 * @package App\Models
 */
class Entidade extends Model
{
    use HasFactory;

    const ENTIDADE = 'entidade.entidade';

    const ENTID = 'entid';
    const ENTSIG = 'entsig';
    const ENTNOME = 'entnome';
    const NJUID = 'njuid';
    const ENTNUMCPFCNPJ = 'entnumcpfcnpj';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::ENTIDADE;

    /**
     * @var string
     */
    protected $primaryKey = self::ENTID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::ENTID,
        self::ENTSIG,
        self::ENTNOME,
        self::NJUID,
        self::ENTNUMCPFCNPJ,
    ];

}
