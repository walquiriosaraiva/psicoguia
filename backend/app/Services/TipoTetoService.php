<?php

namespace App\Services;

use App\Models\TipoTeto;
use Illuminate\Support\Facades\DB;

/**
 * Class TipoTetoService
 * @package App\Services
 */
class TipoTetoService extends BaseService
{

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($request)
    {
        if ($request->input('tptid')):
            return $this->update($request);
        endif;

        try {
            DB::beginTransaction();
            $data = $request->all();
            $arrayTipoTeto['tptdsc'] = $data['tptdsc'];
            TipoTeto::create($arrayTipoTeto);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json(['success' => true, 'message' => 'Tipo de Teto incluido com sucesso']);
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

            $tipoTeto = TipoTeto::find($data['tptid']);
            $tipoTeto->tptdsc = $data['tptdsc'];
            $tipoTeto->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json(['success' => true, 'message' => 'Tipo teto atualizado com sucesso']);
    }

}
