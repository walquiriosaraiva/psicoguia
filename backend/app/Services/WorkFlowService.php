<?php

namespace App\Services;

use App\Models\Documento;
use App\Models\EstadoDocumento;
use App\Models\TipoDocumento;
use App\Traits\ApiResponser;

/**
 * Class WorkFlowService
 * @package App\Services
 */
class WorkFlowService extends BaseService
{
    use ApiResponser;

    /**
     * Para cadastrar um documento é necessario vir no array $data[tpdid, docdsc, usucpf]
     * @param $data
     * @return bool|null
     */
    public function cadastrarDocumento($data)
    {
        $tpdid = (int)$data[TipoDocumento::TPDID];
        $docdsc = str_replace("'", "\\'", $data[Documento::DOCDSC]);

        $tipo = $this->pegarTipo($tpdid);
        if (!$tipo->tpdid) :
            return null;
        endif;

        $estadoInicial = $this->pegarEstadoInicial($tpdid);
        $esdid = (int)$estadoInicial->esdid;
        if (!$esdid) :
            return null;
        endif;

        $arrayDocumento[Documento::TPDID] = $tpdid;
        $arrayDocumento[Documento::ESDID] = $esdid;
        $arrayDocumento[Documento::DOCDSC] = $docdsc;
        $arrayDocumento[Documento::USUCPF] = $data[Documento::USUCPF];
        $documento = Documento::create($arrayDocumento);

        if (!$documento):
            return false;
        endif;

        return $documento;
    }

    /**
     * @param $tpdid
     * @return mixed
     */
    public function pegarTipo($tpdid)
    {
        $tpdid = (int)$tpdid;
        return TipoDocumento::find($tpdid);
    }

    /**
     * @param $tpdid
     * @return mixed
     */
    function pegarEstadoInicial($tpdid)
    {
        $tpdid = (int)$tpdid;

        return EstadoDocumento::where(EstadoDocumento::TPDID, '=', $tpdid)
            ->where(EstadoDocumento::ESDSTATUS, '=', EstadoDocumento::ESDSTATUS_VALOR_ATIVO)
            ->first();
    }

}
