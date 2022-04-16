<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UnidadeGestora
 * @package App\Models
 */
class UnidadeGestora extends Model
{
    use HasFactory;

    const UNIDADEGESTORA = 'public.unidadegestora';

    const UNGCNPJ = 'ungcnpj';
    const UNGCOD = 'ungcod';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::UNIDADEGESTORA;

    /**
     * @var string
     */
    protected $primaryKey = self::UNGCNPJ;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::UNGCNPJ,
        self::UNGCOD
    ];

}
