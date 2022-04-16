<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class PrazoEstimativoTetoItemCollection
 * @package App\Http\Resources
 */
class PrazoEstimativoTetoItemCollection extends ResourceCollection
{
    /**
     * O recurso que coleta.
     *
     * @var string
     */
    public $collects = PrazoEstimativoTetoItemResource::class;

    /**
     * Transforma a coleção em array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
