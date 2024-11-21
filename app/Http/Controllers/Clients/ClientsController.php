<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\SaveClientsRequest;
use App\Http\Requests\Clients\UpdateClientsRequest;
use App\Services\Clients\ClientsService;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function __construct(public ClientsService $cliservice) {}

    public function index(Request $request)
    {
        return $this->cliservice->getClients($request);
    }

    public function get(int $id)
    {
        return $this->cliservice->getClient($id);
    }

    public function save(SaveClientsRequest $request)
    {

        return $this->cliservice->saveClient($request);
    }

    public function update(UpdateClientsRequest $request)
    {
        return $this->cliservice->updateClient($request);
    }

    public function delete(int $id)
    {
        return $this->cliservice->deleteClient($id);
    }
}
