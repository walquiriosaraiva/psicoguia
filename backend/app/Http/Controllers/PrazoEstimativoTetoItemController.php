<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrazoEstimativoTetoItemCollection;
use App\Models\PrazoEstimativoTetoItem;
use App\Services\PrazoEstimativoTetoItemService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Class PrazoEstimativoTetoItemController
 * @package App\Http\Controllers
 */
class PrazoEstimativoTetoItemController extends Controller
{

    protected $prazoEstimativoTetoItemService;

    /**
     * PrazoEstimativoTetoItemController constructor.
     * @param PrazoEstimativoTetoItemService $prazoEstimativoTetoItemService
     */
    public function __construct(PrazoEstimativoTetoItemService $prazoEstimativoTetoItemService)
    {
        $this->prazoEstimativoTetoItemService = $prazoEstimativoTetoItemService;
    }

    /**
     * @OA\Get(
     *     path="/api/prazo-estimativo-teto-item",
     *     description="Trata retorno todos os items das estimativadas gravadas.",
     *     tags={"Prazo Estimativa de Teto Item"},
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
        $prazoEstimativoTetoItem = PrazoEstimativoTetoItem::all();
        return new PrazoEstimativoTetoItemCollection($prazoEstimativoTetoItem);
    }

    /**
     * @param $ano
     * @return \Illuminate\Http\JsonResponse
     */
    public function prazoAno($ano)
    {
        return $this->prazoEstimativoTetoItemService->prazoAno($ano);
    }

    /**
     * @param $ano
     * @return \Illuminate\Http\JsonResponse
     */
    public function dadosFormalizacao($ano)
    {
        return $this->prazoEstimativoTetoItemService->dadosFormalizacao($ano);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function adicionar(Request $request)
    {
        return $this->prazoEstimativoTetoItemService->adicionar($request);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request)
    {
        return $this->prazoEstimativoTetoItemService->save($request);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function tramitar(Request $request)
    {
        return $this->prazoEstimativoTetoItemService->tramitar($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(PrazoEstimativoTetoItem::find($id));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        return response()->json(PrazoEstimativoTetoItem::find($id));
    }

}
