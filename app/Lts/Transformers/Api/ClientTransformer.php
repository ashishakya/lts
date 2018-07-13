<?php
/**
 * Created by PhpStorm.
 * User: ashish
 * Date: 7/13/18
 * Time: 10:43 AM
 */

namespace App\Lts\Transformers\Api;


use App\Client;
use Illuminate\Support\Collection;

class ClientTransformer
{
    public function transform(Client $client)
    {
        return [
            'id'      => $client->id,
            'name'    => $client->name,
            'address' => $client->address,
            'contact' => $client->contact,
        ];
    }

    public function collection(Collection $clients): array
    {
        return $clients->map(
            function (Client $client) {
                return $this->transform($client);
            }
        )->toArray();
    }

    public function item(Client $client): array
    {
        return $this->transform($client);
    }


}