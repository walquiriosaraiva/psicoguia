<?php

namespace App\Http\Controllers;

use App\Models\TipoTeto;
use App\Services\TipoTetoService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Class TipoTetoController
 * @package App\Http\Controllers
 */
class TipoTetoController extends Controller
{
    protected $tipoTetoService;

    /**
     * TipoTetoController constructor.
     * @param TipoTetoService $tipoTetoService
     */
    public function __construct(TipoTetoService $tipoTetoService)
    {
        $this->tipoTetoService = $tipoTetoService;
    }

    /**
     * @OA\Get(
     *     path="/api/tipo-teto",
     *     description="Trata retorno de provedor de acesso.",
     *     tags={"Tipo de Teto"},
     *
     *     @OA\Response(
     *         response=200,
     *         description="Operação realizada com sucesso"
     *     ),
     *     @OA\Response(response=401, description="Não autorizado."),
     * )
     */
    public function index()
    {
        $result = TipoTeto::all();
        return response()->json($result);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $this->tipoTetoService->store($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        return response()->json(TipoTeto::find($id));
    }


}
