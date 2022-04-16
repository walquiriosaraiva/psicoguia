<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auditoria extends Model
{
    use HasFactory;

    const AUDITORIA = 'auditoria';

    const ID = 'id';
    const ACAO = 'acao';
    const IP = 'ip';
    const USER_ID = 'user_id';

    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = self::AUDITORIA;

    /**
     * @var string
     */
    protected $primaryKey = self::ID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::ID,
        self::ACAO,
        self::IP,
        self::USER_ID
    ];

}
