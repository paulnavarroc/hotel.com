<?php

namespace App\Http\Controllers;

use App\Filters\ClientFilter;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientCollection;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.   ||      |*
     */
    public function index(Request $request)
    {
        // Verificar autorización
        if (!Auth()->user()->tokenCan('read')) {
            return response()->json(['message' => 'No tienes permisos para listar clientes'], 403);
        }
        $filter = new ClientFilter();
        $queryItems = $filter->transform($request);

        $cliente = Client::where($queryItems);
        return new ClientCollection($cliente->paginate()->appends($request->query()));
        // return $cliente;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        return new ClientResource(Client::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        if (!Auth()->user()->tokenCan('read')) {
            return response()->json(['message' => 'No tienes permisos para visualizar clientes'], 403);
        }
        return new ClientResource($client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());
        return response()->json(['message' => 'Cliente actualizado correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // Verificar autorización
        if (!Auth()->user()->tokenCan('delete')) {
            return response()->json(['message' => 'No tienes permisos para eliminar clientes'], 403);
        }


        $client->delete();

        return response()->json(['message' => 'Cliente eliminado correctamente'], 200);
    }
}
