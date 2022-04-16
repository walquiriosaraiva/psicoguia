<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PacienteCollection extends ResourceCollection
{
    /**
     * @var string
     */
    public $collects = PacienteResource::class;

    /**
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\Illuminate\Support\Collection|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection;
    }
}
