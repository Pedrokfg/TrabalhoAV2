<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\tabResource;
use App\Models\tab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class tabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabs = tab::all();
        return response([ 'data' => tabResource::collection($tabs), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nome'        => 'required|max:255',
            'sobrenome'   => '|max:255',
            'cpf'         => '|integer|min:10',
            'nasc'        => '|date',
            'email'       => '|max:255',
            'telefoneP'   => '|integer|min:10',
            'telefoneS'   => '||min:10',
            'rg'          => '|integer|min:7',
            'orgE'        => '|max:5',
            'valor'       => '||min:7',
            'numeroRes'   => '|integer|min:2',
            'complemento' => 'max:255',
            'logradouro'  => '|max:255',
            'bairro'      => '|max:255',
            'cidade'      => '|max:255',
            'uf'          => '|max:2',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'message' => 'Validation Error']);
        }

        $newTab = tab::create($data);
        return response(['data' => new tabResource($newTab), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function show(tab $tab)
    {
        return response(['data' => new tabResource($tab), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tab $tab)
    {
        $tab->update($request->all());

        return response(['data' => new tabResource($tab), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function destroy(tab $tab)
    {
        $tab->delete();

        return response(['message' => 'Deleted']);
    }
}