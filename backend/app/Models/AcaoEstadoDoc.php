<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AcaoEstadoDoc
 * @package App\Models
 */
class AcaoEstadoDoc extends Model
{
    use HasFactory;

    const ACAOESTADODOC = 'workflow.acaoestadodoc';

    const AEDID = 'aedid';
    const ESDIDORIGEM = 'esdidorigem';
    const ESDIDDESTINO = 'esdiddestino';
    const AEDDSCREALIZAR = 'aeddscrealizar';
    const AEDSTATUS = 'aedstatus';
    const AEDDSCREALIZADA = 'aeddscrealizada';
    const ESDSNCOMENTARIO = 'esdsncomentario';
    const AEDCONDICAO = 'aedcondicao';
    const AEDOBS = 'aedobs';
    const AEDPOSACAO = 'aedposacao';
    const AEDVISIVEL = 'aedvisivel';
    const AEDICONE = 'aedicone';
    const AEDCODICAONEGATIVA = 'aedcodicaonegativa';
    const AEDDATAINICIO = 'aeddatainicio';
    const AEDDATAFIM = 'aeddatafim';
    const ESDSNLABELCOMENTARIO = 'esdsnlabelcomentario';
    const AEDANEXO = 'aedanexo';
    const AEDANEXOOBRIGATORIO = 'aedanexoobrigatorio';
    const AEDPADRAO = 'aedpadrao';
    const AEDANEXOQTD = 'aedanexoqtd';
    const AEDANEXOADC = 'aedanexoadc';
    const AEDFIM = 'aedfim';
    const AEDDURACAO = 'aedduracao';
    const ESDCOMENTARIOOBRIGATORIO = 'esdcomentarioobrigatorio';
    const CONSTANTEVIRTUAL = 'constantevirtual';
    const AEDINDCPF = 'aedindcpf';
    const AEDINTERESSADOS = 'aedinteressados';

    public $timestamps = false;

    protected $casts = [
        self::AEDDATAINICIO => 'date',
        self::AEDDATAFIM => 'date',
    ];

    /**
     * @var string
     */
    protected $table = self::ACAOESTADODOC;

    /**
     * @var string
     */
    protected $primaryKey = self::AEDID;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::AEDID,
        self::ESDIDORIGEM,
        self::ESDIDDESTINO,
        self::AEDDSCREALIZAR,
        self::AEDSTATUS,
        self::AEDDSCREALIZADA,
        self::ESDSNCOMENTARIO,
        self::AEDCONDICAO,
        self::AEDOBS,
        self::AEDPOSACAO,
        self::AEDVISIVEL,
        self::AEDICONE,
        self::AEDCODICAONEGATIVA,
        self::AEDDATAINICIO,
        self::AEDDATAFIM,
        self::ESDSNLABELCOMENTARIO,
        self::AEDANEXO,
        self::AEDANEXOOBRIGATORIO,
        self::AEDPADRAO,
        self::AEDANEXOQTD,
        self::AEDANEXOADC,
        self::AEDFIM,
        self::AEDDURACAO,
        self::ESDCOMENTARIOOBRIGATORIO,
        self::CONSTANTEVIRTUAL,
        self::AEDINDCPF,
        self::AEDINTERESSADOS
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documentoOrigem()
    {
        return $this->belongsTo(EstadoDocumento::class, self::ESDIDORIGEM, EstadoDocumento::ESDID);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documentoDestino()
    {
        return $this->belongsTo(EstadoDocumento::class, self::ESDIDDESTINO, EstadoDocumento::ESDID);
    }

}
