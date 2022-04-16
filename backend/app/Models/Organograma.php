<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Organograma
 * @package App\Models
 */
class Organograma extends Model
{
    use HasFactory;

    const ORGANOGRAMA = 'entidade.organograma';

    const ENTID = 'entid';
    const CATID = 'catid';
    const ORGSTATUS = 'orgstatus';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::ORGANOGRAMA;

    /**
     * @var string
     */
    protected $primaryKey = self::ENTID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::ENTID,
        self::CATID,
        self::ORGSTATUS
    ];

}
