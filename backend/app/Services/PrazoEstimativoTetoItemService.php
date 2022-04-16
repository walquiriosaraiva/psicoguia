<?php

namespace App\Services;

use App\Models\Documento;
use App\Models\PrazoEstimativoTeto;
use App\Models\PrazoEstimativoTetoItem;
use App\Models\TipoDocumento;
use App\Models\TipoTeto;
use App\Models\TramiteTeto;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class PrazoEstimativoTetoItemService
 * @package App\Services
 */
class PrazoEstimativoTetoItemService extends BaseService
{

    use ApiResponser;

    /**
     * @var WorkFlowService
     */
    protected $workFlowService;

    public function __construct(WorkFlowService $workFlowService)
    {
        $this->workFlowService = $workFlowService;
    }

    /**
     * @param $ano
     * @return \Illuminate\Http\JsonResponse
     */
    public function prazoAno($ano)
    {
        $resultPrazoEstimativoTeto = PrazoEstimativoTeto::where(PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETANO, '=', $ano)->get();
        $newArray = [];

        foreach ($resultPrazoEstimativoTeto as $keyPrazo => $valuePrazo):
            $prazoItem = PrazoEstimativoTetoItem::where(PrazoEstimativoTetoItem::PETID, '=', $valuePrazo->petid)
                ->join(TipoTeto::TIPOTETO, PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM . '.' . PrazoEstimativoTetoItem::TPTID, '=', TipoTeto::TIPOTETO . '.' . TipoTeto::TPTID)
                ->get();

            $valuePrazo->checkedAll = false;
            $newArray[$valuePrazo->petid] = $valuePrazo->toArray();
            if (count($prazoItem) > 0):
                foreach ($prazoItem as $valueItem):
                    $valueItem->diasRestantes = 0;
                    $data = Carbon::parse($valueItem->peidata);
                    $valueItem->data_cadastro_formatada = $data->format('d/m/Y');
                    $valueItem->peiidChecked = false;
                    $valueItem->peiidDevolvidoChecked = false;
                    if ($valueItem->peiprazo):
                        $valueItem->diasRestantes = $valueItem->peiprazo->diffInDays() + 1;
                    endif;
                    $newArray[$valuePrazo->petid]['items'][] = $valueItem->toArray();
                endforeach;
            endif;
        endforeach;

        $prepareData = [];
        foreach ($newArray as $value):
            $prepareData[] = $value;
        endforeach;

        return response()->json(['success' => true, 'data' => $prepareData]);
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();

            $prazoEstimativoTetoItem = PrazoEstimativoTetoItem::find($data[PrazoEstimativoTetoItem::PEIID]);
            $prazoEstimativoTetoItem->peiprazo = $data[PrazoEstimativoTetoItem::PEIPRAZO] ? Carbon::parse($data[PrazoEstimativoTetoItem::PEIPRAZO]) : null;
            $prazoEstimativoTetoItem->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json(['success' => true, 'message' => 'Prazo atualizado com sucesso']);
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function adicionar($request)
    {
        try {
            DB::beginTransaction();

            $count = PrazoEstimativoTetoItem::where(PrazoEstimativoTetoItem::TPTID, '=', $request->input(PrazoEstimativoTetoItem::TPTID))
                ->where(PrazoEstimativoTetoItem::PETID, '=', $request->input(PrazoEstimativoTetoItem::PETID))
                ->count();

            if ($count === 0):
                $arrayPrazoEstimativoTetoItem[PrazoEstimativoTetoItem::TPTID] = $request->input(PrazoEstimativoTetoItem::TPTID);
                $arrayPrazoEstimativoTetoItem[PrazoEstimativoTetoItem::PETID] = $request->input(PrazoEstimativoTetoItem::PETID);
                $arrayPrazoEstimativoTetoItem[PrazoEstimativoTetoItem::PEIDATA] = Carbon::now();
                PrazoEstimativoTetoItem::create($arrayPrazoEstimativoTetoItem);
            else:
                return response()->json(['error' => 'Item já foi informado']);
            endif;

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save($request)
    {
        try {
            DB::beginTransaction();

            $data = $request->all();

            foreach ($data as $key => $value):

                foreach ($value['items'] as $item):
                    if (isset($item[PrazoEstimativoTetoItem::PEIPRAZO]) && $item[PrazoEstimativoTetoItem::PEIPRAZO]):
                        $arrayPrazoEstimativoTetoItem = PrazoEstimativoTetoItem::find(PrazoEstimativoTetoItem::PEIID);
                        $arrayPrazoEstimativoTetoItem->peiprazo = $item[PrazoEstimativoTetoItem::PEIPRAZO];
                        $arrayPrazoEstimativoTetoItem->save();
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

    /**
     * @param $ano
     * @return \Illuminate\Http\JsonResponse
     */
    public function dadosFormalizacao($ano)
    {
        $result = PrazoEstimativoTeto::where(PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETANO, '=', $ano)
            ->join(PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM, PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM . '.' . PrazoEstimativoTetoItem::PETID, '=', PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETID)
            ->join(TipoTeto::TIPOTETO, TipoTeto::TIPOTETO . '.' . TipoTeto::TPTID, '=', PrazoEstimativoTetoItem::PRAZOESTIMATIVATETOITEM . '.' . PrazoEstimativoTetoItem::TPTID)
            ->get();

        foreach ($result as $key => $value):
            if ($value->peiprazo):
                $data = Carbon::parse($value->peiprazo);
                $value->peiprazo = $data;
                $value->peiidChecked = true;
                $value->diasRestantes = $data->diffInDays() + 1;
            else:
                $data = Carbon::now();
                $value->peiprazo = $data;
                $value->peiidChecked = false;
                $value->diasRestantes = $data->diffInDays() + 1;
            endif;

            $value->peiidDevolvidoChecked = false;

        endforeach;

        return response()->json(['success' => true, 'data' => $result]);
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
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

}
