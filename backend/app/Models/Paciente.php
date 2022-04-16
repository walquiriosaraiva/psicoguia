<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Paciente extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($objeto) {
            dd('deleting ', $objeto);
        });

        static::updating(function ($objeto) {
            dd('updating ', $objeto);
        });

        static::saving(function ($objeto) {
            dd('saving ', $objeto);
        });
    }

    use HasFactory, Notifiable;

    protected $table = 'paciente';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'telefone_celular',
        'telefone_fixo',
        'email',
        'id_forma_cobranca',
        'valor',
        'id_pacote',
        'id_convenio',
        'numero_cartao',
        'data_expiracao',
        'observacao',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'data_expiracao' => 'datetime'
    ];

}
