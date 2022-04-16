<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormaCobranca extends Model
{
    use HasFactory;

    protected $table = 'forma_cobranca';

    protected $primaryKey = 'id';

    protected $fillable = ['nome'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

}
