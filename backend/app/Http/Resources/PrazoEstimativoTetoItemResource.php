<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class PrazoEstimativoTetoItemResource
 * @package App\Http\Resources
 */
class PrazoEstimativoTetoItemResource extends JsonResource
{
    /**
     * Transforma o recurso em array
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'peiid' => $this->peiid,
            'petid' => $this->petid,
            'tptid' => $this->tptid,
            'peiprazo' => $this->peiprazo,
            'peidata' => $this->peidata,
            'peitramitacao' => $this->peitramitacao,
            'peiconclusao' => $this->peiconclusao,
            'prazoEstimativoTeto' => $this->prazoEstimativoTeto,
            'tipoTeto' => $this->tipoTeto,
        ];
    }
}
