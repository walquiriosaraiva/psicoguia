<?php

namespace App\Http\Controllers;

use App\Models\TipoTeto;
use App\Models\TipoTetoOrcamentario;
use App\Services\TipoTetoService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Class TipoTetoOrcamentarioController
 * @package App\Http\Controllers
 */
class TipoTetoOrcamentarioController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $result = TipoTetoOrcamentario::all();
        return response()->json($result);
    }
}
