<?php

namespace App\Services;

use App\Models\Documento;
use App\Models\Entidade;
use App\Models\Organograma;
use App\Models\PrazoEstimativoTeto;
use App\Models\PrazoEstimativoTetoItem;
use App\Models\TipoDocumento;
use App\Models\TipoTeto;
use App\Models\TramiteDof;
use App\Models\TramiteTeto;
use App\Models\UnidadeGestora;
use App\MyApp;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class TetoOrcamentarioService
 * @package App\Services
 */
class TetoOrcamentarioService extends BaseService
{

    use ApiResponser;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUg()
    {
        $entidade = DB::table(Entidade::ENTIDADE)
            ->join(Organograma::ORGANOGRAMA, Organograma::ORGANOGRAMA . '.' . Organograma::ENTID, '=', Entidade::ENTIDADE . '.' . Entidade::ENTID)
            ->join(UnidadeGestora::UNIDADEGESTORA, Entidade::ENTIDADE . '.' . Entidade::ENTNUMCPFCNPJ, '=', UnidadeGestora::UNIDADEGESTORA . '.' . UnidadeGestora::UNGCNPJ)
            ->select(
                Entidade::ENTIDADE . '.' . Entidade::ENTSIG,
                Entidade::ENTIDADE . '.' . Entidade::ENTNOME,
                Entidade::ENTIDADE . '.' . Entidade::ENTID,
                UnidadeGestora::UNIDADEGESTORA . '.' . UnidadeGestora::UNGCOD
            )
            ->where(Organograma::ORGANOGRAMA . '.' . Organograma::ORGSTATUS, '=', 'A')
            ->whereIn(Organograma::ORGANOGRAMA . '.' . Organograma::CATID, [1, 2])
            ->orderBy(Entidade::ENTIDADE . '.' . Entidade::ENTNOME)
            ->get();

        return response()->json(['data' => $entidade]);

    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();


            $prazo = PrazoEstimativoTetoItem::where(PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM . '.' . PrazoEstimativoTetoItem::PETID, '=', $data['petid'])
                ->where(PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM . '.' . PrazoEstimativoTetoItem::TPTID, '=', 2)
                ->first();

            foreach ($data['dados'] as $key => $item):

                if ($item['tdvalcusteio'] > 0 || $item['tdvalinvestimento'] > 0):
                    $arrayTramiteDof['peiid'] = $prazo->peiid;
                    $arrayTramiteDof['ungcod'] = $item['ungcod'];
                    $arrayTramiteDof['tdvalcusteio'] = $item['tdvalcusteio'];
                    $arrayTramiteDof['tdvalinvestimento'] = $item['tdvalinvestimento'];
                    $arrayTramiteDof['tddat'] = Carbon::now();
                    $tramiteDof = TramiteDof::create($arrayTramiteDof);
                endif;

            endforeach;


            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json(['success' => true, 'message' => 'Teto orçamentário incluido com sucesso!', 'data' => $tramiteDof]);

    }

    /**
     * @param $ano
     * @return \Illuminate\Http\JsonResponse
     */
    public function prazoAno($ano)
    {
        $resultPrazoEstimativoTeto = PrazoEstimativoTeto::where(PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETANO, '=', $ano)->get();

        return response()->json(['success' => true, 'data' => $resultPrazoEstimativoTeto]);

    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDadosReceitaPropria($request)
    {
        $data = $request->all();
        $resultPrazoEstimativoTeto = DB::table(PrazoEstimativoTeto::PRAZOESTIMATIVATETO)
            ->join(PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM, PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETID, '=', PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM . '.' . PrazoEstimativoTetoItem::PETID)
            ->where(PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETANO, '=', $data['ano'])
            ->where(PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETID, '=', $data['verificaAccordion'])
            ->get();


        $newArray = [];
        $totalCusteio = 0;
        $totalInvestimento = 0;
        foreach ($resultPrazoEstimativoTeto as $keyPrazo => $valuePrazo):
            $peiid = $valuePrazo->peiid;
            // dd($peiid);
            $query = DB::table(Entidade::ENTIDADE)
                ->join(Organograma::ORGANOGRAMA, Organograma::ORGANOGRAMA . '.' . Organograma::ENTID, '=', Entidade::ENTIDADE . '.' . Entidade::ENTID)
                ->join(UnidadeGestora::UNIDADEGESTORA, Entidade::ENTIDADE . '.' . Entidade::ENTNUMCPFCNPJ, '=', UnidadeGestora::UNIDADEGESTORA . '.' . UnidadeGestora::UNGCNPJ)
                ->leftJoin(TramiteDof::TRAMITEDOF, UnidadeGestora::UNIDADEGESTORA . '.' . UnidadeGestora::UNGCOD, '=', TramiteDof::TRAMITEDOF . '.' . TramiteDof::UNGCOD)
                /*->leftJoin(TramiteDof::TRAMITEDOF, UnidadeGestora::UNIDADEGESTORA, function ($join) use ($peiid) {
                    $join->on(UnidadeGestora::UNIDADEGESTORA . '.' . UnidadeGestora::UNGCOD,
                        '=',
                        TramiteDof::TRAMITEDOF . '.' . TramiteDof::UNGCOD);

                    if ($peiid):
                        $join->on(TramiteDof::TRAMITEDOF . '.' . TramiteDof::PEIID, '=', $peiid);
                    endif;
                })*/
                ->select(
                    Entidade::ENTIDADE . '.' . Entidade::ENTSIG,
                    Entidade::ENTIDADE . '.' . Entidade::ENTNOME,
                    Entidade::ENTIDADE . '.' . Entidade::ENTID,
                    UnidadeGestora::UNIDADEGESTORA . '.' . UnidadeGestora::UNGCOD,
                    TramiteDof::TRAMITEDOF . '.' . TramiteDof::PEIID,
                    TramiteDof::TRAMITEDOF . '.' . TramiteDof::TDID,
                    TramiteDof::TRAMITEDOF . '.' . TramiteDof::TDVALCUSTEIO,
                    TramiteDof::TRAMITEDOF . '.' . TramiteDof::TDVALINVESTIMENTO,
                )
                ->where(Organograma::ORGANOGRAMA . '.' . Organograma::ORGSTATUS, '=', 'A')
                ->whereIn(Organograma::ORGANOGRAMA . '.' . Organograma::CATID, [1, 2])
                ->orderBy(Entidade::ENTIDADE . '.' . Entidade::ENTNOME);

            $entidade = $query->get();
            foreach ($entidade as $keyEntidade => $valueEntidade):

                $totalCusteio += $valueEntidade->tdvalcusteio;
                $totalInvestimento += $valueEntidade->tdvalinvestimento;

                $newArray[$valueEntidade->entid]['tdvalcusteio'] = $valueEntidade->tdvalcusteio ? floatval($valueEntidade->tdvalcusteio) : 0;
                $newArray[$valueEntidade->entid]['tdvalinvestimento'] = $valueEntidade->tdvalinvestimento ? floatval($valueEntidade->tdvalinvestimento) : 0;
                $newArray[$valueEntidade->entid]['ungcod'] = $valueEntidade->ungcod;
                $newArray[$valueEntidade->entid]['entsig'] = $valueEntidade->entsig;

            endforeach;

        endforeach;

        $prepareData = [];
        foreach ($newArray as $value):
            $prepareData[] = $value;
        endforeach;

        $total['totalcusteio'] = $totalCusteio;
        $total['totalinvestimento'] = $totalInvestimento;

        return response()->json(['success' => true, 'data' => $prepareData, 'total' => $total]);
    }

    public function tramitar($request)
    {
        try {
            DB::beginTransaction();

            $data = $request->all();

            foreach ($data as $key => $value):

                foreach ($value['items'] as $item):
                    if (isset($item['peiidChecked']) && $item['peiidChecked'] === true):

                        $array[TipoDocumento::TPDID] = 301;
                        $array[Documento::DOCDSC] = 'Tramitador para área gestora';
                        $array[Documento::USUCPF] = '22678050220';
                        $documento = $this->workFlowService->cadastrarDocumento($array);

                        $arrayTramiteTeto[TramiteTeto::DOCID] = $documento->docid;
                        $arrayTramiteTeto[TramiteTeto::PEIID] = $item[TramiteTeto::PEIID];
                        $arrayTramiteTeto[TramiteTeto::TTDAT] = Carbon::now();
                        TramiteTeto::create($arrayTramiteTeto);

                        $prazoEstimativoTetoItem = PrazoEstimativoTetoItem::find($item[TramiteTeto::PEIID]);
                        $prazoEstimativoTetoItem->peitramitacao = Carbon::now();
                        $prazoEstimativoTetoItem->update();

                    endif;
                endforeach;

            endforeach;

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse("{$e->getMessage()}", 504);
        }

        return $this->successResponse($data, 200);
    }

    public function tabReceitaPropria($ano)
    {
        $result = DB::table(PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM)
            ->join(PrazoEstimativoTeto::PRAZOESTIMATIVATETO,
                PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM . '.' . PrazoEstimativoTetoItem::PETID,
                '=',
                PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETID)
            ->join(TipoTeto::TIPOTETO, PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM . '.' . PrazoEstimativoTetoItem::TPTID, '=', TipoTeto::TIPOTETO . '.' . TipoTeto::TPTID)
            ->where(PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETANO, '=', $ano)
            ->where(PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETDSC, '=', 'Formalização')
            ->where(PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM . '.' . PrazoEstimativoTetoItem::TPTID, '=', 2)
            ->first();

        return $this->successResponse($result, 200);
    }

}
