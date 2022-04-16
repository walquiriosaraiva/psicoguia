<?php

namespace App\Services;

use App\Models\PrazoEstimativoTeto;
use App\MyApp;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class PrazoEstimativoTetoService
 * @package App\Services
 */
class PrazoEstimativoTetoService extends BaseService
{

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($request)
    {
        if ($request->input('petid')):
            return $this->update($request);
        endif;

        try {
            DB::beginTransaction();
            $data = $request->all();
            $arrayPrazoEstimativoTeto['petano'] = $data['petano'];
            $arrayPrazoEstimativoTeto['petdsc'] = $data['petdsc'];
            $arrayPrazoEstimativoTeto['petdata'] = Carbon::now();
            PrazoEstimativoTeto::create($arrayPrazoEstimativoTeto);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json(['success' => true, 'message' => 'Prazo incluido com sucesso']);
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

            $prazoEstimativoTeto = PrazoEstimativoTeto::find($data['petid']);
            $prazoEstimativoTeto->petano = $data['petano'];
            $prazoEstimativoTeto->petdsc = $data['petdsc'];
            $prazoEstimativoTeto->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json(['success' => true, 'message' => 'Prazo atualizado com sucesso']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPrazoAnoDistinto()
    {
        $result = DB::table(PrazoEstimativoTeto::PRAZOESTIMATIVATETO)
            ->select(PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETANO)
            ->groupBy(PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETANO)
            ->orderBy(PrazoEstimativoTeto::PRAZOESTIMATIVATETO . '.' . PrazoEstimativoTeto::PETANO)
            ->get();

        return response()->json(['data' => $result]);
    }

}
