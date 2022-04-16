<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class PrazoEstimativoTetoResource
 * @package App\Http\Resources
 */
class PrazoEstimativoTetoResource extends JsonResource
{
    /**
     * Transforma o recurso em array
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'petid' => $this->petid,
            'petano' => $this->petano,
            'petdsc' => $this->petdsc,
            'petdata' => $this->petdata
        ];
    }
}
