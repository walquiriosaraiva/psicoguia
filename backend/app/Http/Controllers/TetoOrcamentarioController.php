<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrazoEstimativoTetoItemCollection;
use App\Models\PrazoEstimativoTetoItem;
use App\Services\PrazoEstimativoTetoItemService;
use App\Services\TetoOrcamentarioService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Class TetoOrcamentarioController
 * @package App\Http\Controllers
 */
class TetoOrcamentarioController extends Controller
{

    /**
     * @var PrazoEstimativoTetoItemService
     */
    protected $prazoEstimativoTetoItemService;

    /**
     * @var
     */
    protected $tetoOrcamentarioService;

    /**
     * PrazoEstimativoTetoItemController constructor.
     * @param PrazoEstimativoTetoItemService $prazoEstimativoTetoItemService
     */
    public function __construct(PrazoEstimativoTetoItemService $prazoEstimativoTetoItemService, TetoOrcamentarioService $tetoOrcamentarioService)
    {
        $this->prazoEstimativoTetoItemService = $prazoEstimativoTetoItemService;
        $this->tetoOrcamentarioService = $tetoOrcamentarioService;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUg()
    {
        return $this->tetoOrcamentarioService->getUg();
    }

    public function store(Request $request)
    {
        return $this->tetoOrcamentarioService->store($request);
    }

    public function prazoAno($ano)
    {
        return $this->tetoOrcamentarioService->prazoAno($ano);
    }

    public function getDadosReceitaPropria(Request $request)
    {
        return $this->tetoOrcamentarioService->getDadosReceitaPropria($request);
    }

    public function tabReceitaPropria($ano)
    {
        return $this->tetoOrcamentarioService->tabReceitaPropria($ano);
    }

}
