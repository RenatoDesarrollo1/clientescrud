<?php

namespace App\Interfaces\Clients;

use App\Http\Requests\Clients\SaveClientsRequest;
use App\Http\Requests\Clients\UpdateClientsRequest;
use Illuminate\Http\Request;

interface ClientsServiceInt
{

    public function getClients(Request $request);
    public function getClient(int $id);
    public function saveClient(SaveClientsRequest $client);
    public function updateClient(UpdateClientsRequest $client);
    public function deleteClient(int $id);
}
