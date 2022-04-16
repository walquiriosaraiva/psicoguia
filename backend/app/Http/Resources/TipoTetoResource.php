<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TipoTetoResource
 * @package App\Http\Resources
 */
class TipoTetoResource extends JsonResource
{
    /**
     * Transforma o recurso em array
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'tptid' => (int)$this->tptid,
            'tptdsc' => $this->tptdsc,
            'tptstatus' => $this->tptstatus
        ];
    }
}
