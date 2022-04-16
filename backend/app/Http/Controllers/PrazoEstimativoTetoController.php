<?php

namespace App\Http\Controllers;

use App\Models\PrazoEstimativoTeto;
use App\Services\PrazoEstimativoTetoService;
use App\Services\WorkFlowService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Class PrazoEstimativoTetoController
 * @package App\Http\Controllers
 */
class PrazoEstimativoTetoController extends Controller
{

    /**
     * @var PrazoEstimativoTetoService
     */
    protected $prazoEstimativoTetoService;

    /**
     * @var WorkFlowService
     */
    protected $workflowService;

    /**
     * PrazoEstimativoTetoController constructor.
     * @param PrazoEstimativoTetoService $prazoEstimativoTetoService
     */
    public function __construct(PrazoEstimativoTetoService $prazoEstimativoTetoService, WorkFlowService $workflowService)
    {
        $this->prazoEstimativoTetoService = $prazoEstimativoTetoService;
        $this->workflowService = $workflowService;
    }

    /**
     * @OA\Get(
     *     path="/api/prazo-estimativo-teto",
     *     description="Trata retorno das estimativas de tetos gravadas.",
     *     tags={"Prazo Estimativa de Teto"},
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
        $result = PrazoEstimativoTeto::all();
        return response()->json($result);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return $this->prazoEstimativoTetoService->store($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        return response()->json(PrazoEstimativoTeto::find($id));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPrazoAnoDistinto()
    {
        return $this->prazoEstimativoTetoService->getPrazoAnoDistinto();
    }

}
