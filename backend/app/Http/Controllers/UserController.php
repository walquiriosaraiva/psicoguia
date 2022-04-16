<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    use ApiResponser;

    public function index()
    {
        //return DB::table('tab_instituicao')->get();
        return $this->successResponse(UserResource::collection(User::all()), 200);
    }

    public function show($id)
    {
        return $this->successResponse(UserResource::collection(User::where('id', '=', $id)->get()), 200);
    }

    public function store(Request $request)
    {
        $user = User::create(
            [
                'name' => 'teste',
                'email' => 'testesss' . Carbon::now()->format('ymdHis') . '@gmail.com',
                'password' => md5('teste')
            ]);

        //event($user);
        //return $this->successResponse(UserResource::collection(User::all()), 200);
        return response()->json(['data' => $request->all()]);
    }

    public function update(Request $request, $id)
    {
        response()->json(['data' => $request->all(), 'id' => $id]);
        $user = User::find($id);
        $user->name = 'teste2 ' . Carbon::now();
        $user->update();
        return $this->successResponse(UserResource::collection(User::all()), 200);
    }

    public function edit(Request $request, $id)
    {
        //return response()->json(['data' => $request->all(), 'id' => $id]);
        return $this->successResponse(UserResource::collection(User::where('id', '=', $id)->get()), 200);
    }

    public function destroy(Request $request, $id)
    {
        User::where('id', $id)->delete();
        return response()->json(['data' => $request->all(), 'id' => $id]);
        //return $this->successResponse(UserResource::collection(User::where('id','=',$id)->get()), 200);
    }
}
