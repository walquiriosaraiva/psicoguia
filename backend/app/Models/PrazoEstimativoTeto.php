<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrazoEstimativoTeto extends Model
{
    use HasFactory;

    const PRAZOESTIMATIVATETO = 'sisco.prazoestimativateto';

    const PETID = 'petid';
    const PETANO = 'petano';
    const PETDSC = 'petdsc';
    const PETDATA = 'petdata';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::PRAZOESTIMATIVATETO;

    /**
     * @var string
     */
    protected $primaryKey = self::PETID;

    protected $casts = [self::PETDATA];

    /**
     * @var string[]
     */
    protected $fillable = [
        self::PETID,
        self::PETANO,
        self::PETDSC,
        self::PETDATA
    ];

}
