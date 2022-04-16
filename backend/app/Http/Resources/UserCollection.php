<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class UserCollection
 * @package App\Http\Resources
 */
class UserCollection extends ResourceCollection
{
    /**
     * O recurso que coleta.
     *
     * @var string
     */
    public $collects = UserResource::class;

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
