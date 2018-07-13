<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use App\Lts\Transformers\Api\ClientTransformer;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientList()
    {
        $clients = Client::all();

        return response()->json((new ClientTransformer)->collection($clients));
    }

    public function clientDetail($clientId)
    {
        $client = Client::find($clientId);

        return response()->json((new ClientTransformer)->item($client));
    }

    public function create(Request $request)
    {
        $clientData = $request->all();
        $client     = new Client();
        $client->create(
            [
                'name'    => $clientData['name'],
                'address' => $clientData['address'],
                'contact' => $clientData['contact'],
            ]
        );

        return 'successfully stored using api';
    }

    public function delete($clientId)
    {
        Client::find($clientId)->delete();

        return 'Detail of ClientId:'.$clientId.' successfully deleted';
    }

    public function update(Request $request, $clientId)
    {
        $updatedData = $request->all();
        $client      = Client::find($clientId);
        $client->update($updatedData);

        return 'Detail of ClientId:'.$clientId.' successfully updated';
    }


}
