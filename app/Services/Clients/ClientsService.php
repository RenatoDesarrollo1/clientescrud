<?php

namespace App\Services\Clients;

use App\Interfaces\Clients\ClientsServiceInt;
use App\Http\Requests\Clients\SaveClientsRequest;
use App\Http\Requests\Clients\UpdateClientsRequest;
use App\Http\Responses\DataResponse;
use App\Models\Clients\ClientsModel;
use Illuminate\Http\Request;

class ClientsService implements ClientsServiceInt
{

    public function getClients(Request $request)
    {
        try {
            $compname = trim($request->compname) ?? "";

            $clients = ClientsModel::where('active', '=', true);

            if ($compname != "") {
                $clients = $clients->where('compname', 'LIKE', "{$compname}%");
            }

            $clients = $clients->orderBy("id", 'asc')->get();

            return new DataResponse(200, $clients);
        } catch (\Exception $e) {
            return new DataResponse(500, [], $e->getMessage());
        }
    }
    public function getClient(int $id)
    {
        try {
            $client = ClientsModel::where('active', '=', true)->find($id);

            if (isset($client)) {
                return new DataResponse(200, $client->toArray());
            }

            return new DataResponse(404, [], "No se encontró el cliente");
        } catch (\Exception $e) {
            return new DataResponse(500, [], $e->getMessage());
        }
    }


    public function saveClient(SaveClientsRequest $client)
    {
        try {
            ClientsModel::insert($client->validated());

            return new DataResponse(200, [], "El cliente se ingresó correctamente");
        } catch (\Exception $e) {
            return new DataResponse(500, [], $e->getMessage());
        }
    }
    public function updateClient(UpdateClientsRequest $client)
    {
        try {
            ClientsModel::where('id', $client->id)->update($client->validated());

            return new DataResponse(200, [], "El cliente se actualizó correctamente");
        } catch (\Exception $e) {
            return new DataResponse(500, [], $e->getMessage());
        }
    }
    public function deleteClient(int $id)
    {
        try {
            ClientsModel::where('id', $id)->update(['active' => false]);

            return new DataResponse(200, [], "El cliente se eliminó correctamente");
        } catch (\Exception $e) {
            return new DataResponse(500, [], $e->getMessage());
        }
    }
}
